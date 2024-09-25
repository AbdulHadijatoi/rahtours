<?php

namespace App\Http\Controllers;

use App\Mail\SendVoucherCode;
use App\Models\Activity;
use App\Models\GiftCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class SendGiftController extends Controller
{
    public function index(Request $request){
        $activity = Activity::find($request->activity_id);
        return view('pages.gift', compact('activity'));
    }

    public function previewGift(Request $request){
        $activity_id = $request->activity_id;
        $discount = $request->discount;
        
        $activity = Activity::find($activity_id);
        return view('pages.gift-preview', compact('activity','discount'));
    }

    public function buyNow2(Request $request){
        $request->validate([
            'activity_id' => 'nullable',
            'discount' => 'required|string',
            'email' => 'email|email',
            'message' => 'required|string',
            'suggest_activity' => 'nullable',
        ]);

        $code = generateVoucher();
        
        $activity = $this->sendGift($request);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => $activity->name,
                    ],
                    'unit_amount' => $request->discount*100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => '',
            'cancel_url' => '',
        ]);

        return redirect($session->url);
    }

    // Create payment session
    public function buyNow(Request $request)
    {
        $request->validate([
            'activity_id' => 'nullable|exists:activities,id', // Ensure the activity exists
            'discount' => 'required|numeric|min:1', // Check for a valid discount
            'email' => 'required|email',
            'message' => 'required|string',
            'suggest_activity' => 'nullable|string',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Redirect URLs for payment success and cancellation
        $successUrl = route('voucher.success', ['session_id' => '{CHECKOUT_SESSION_ID}']);
        $cancelUrl = route('voucher.cancel');

        // Create Stripe session for checkout
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => $this->getActivityName($request->activity_id),
                    ],
                    'unit_amount' => $request->discount * 100, // Stripe requires amounts in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
        ]);

        // Redirect to Stripe payment page
        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Validate Stripe session ID
        $sessionId = $request->session_id;
        try {
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                // Create voucher and send email
                $this->createVoucher($session);
                return view('voucher.success', [
                    'discount' => $session->amount_total / 100, // Convert to AED
                ]);
            }

            // Payment not completed
            return redirect()->route('voucher.cancel');
        } catch (\Exception $e) {
            // Handle error, log it and redirect or show error message
            \Log::error("Stripe Session Retrieval Error: " . $e->getMessage());
            return redirect()->route('voucher.cancel')->withErrors('There was an issue with your payment. Please try again.');
        }
    }


    // Handle payment cancellation
    public function paymentCancel()
    {
        return view('pages.voucher.cancel'); // Return cancel view
    }

    // Create the voucher after payment is completed
    protected function createVoucher($session)
    {
        // Assuming you've stored the needed data in session metadata or database
        $metadata = $session->metadata; // Retrieve metadata stored with session
        $activityId = $metadata->activity_id ?? null;
        $validDate = Carbon::now()->addMonths(3);

        // Create voucher
        $voucher = GiftCard::create([
            'activity_id'    => $activityId,
            'recipient_email'=> $metadata->email,
            'code'           => $this->generateVoucherCode(),
            'discount_price' => $session->amount_total / 100, // Convert amount back from cents
            'valid_date'     => $validDate,
            'description'    => $metadata->message,
        ]);

        if ($voucher) {
            // Find associated activity if provided
            $activity = $activityId ? Activity::find($activityId) : null;

            // Send email to recipient
            Mail::to($voucher->recipient_email)->send(new SendVoucherCode($voucher, $activity));
        }
    }

    // Helper function to get activity name
    protected function getActivityName($activityId)
    {
        if ($activityId) {
            return Activity::findOrFail($activityId)->name;
        }
        return 'General Voucher'; // Fallback name for suggested activities or no activity
    }

    // Generate unique voucher code
    protected function generateVoucherCode()
    {
        return strtoupper(uniqid('RAH-'));
    }
    
}
