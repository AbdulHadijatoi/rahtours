<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnums;
use App\Mail\OrderShipped;
use App\Mail\SendCredentials;
use App\Models\CartItem;
use App\Models\GiftCard;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use PDF;
class OrderController extends Controller {

    public function voucherDiscount($voucher_code){
        $voucher = GiftCard::where('code',$voucher_code)->first();

        if (!$voucher) {
            return 0;
        }

        $currentDate = now();

        // Check if the voucher is expired
        if ($currentDate->greaterThan($voucher->valid_date)) {
            return 0;
        }

        return $voucher->discount_price;
    }

    public function placeOrder(Request $request) {
        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'phoneNumber' => 'required|string',
            'country' => 'required|string',
            'reference_id' => 'required|string',
            'cart_items' => 'required|json',
        ]);

        $voucher_discount = $this->voucherDiscount($request->appliedVoucherId);



        $cart_items = json_decode($request->cart_items, true);

        $package_details = [];
        $activity_details = [];
        $total_amount = 0;
        foreach ($cart_items as $key => $item) {
            $package = Package::with('activity')->find($item['package_id']);
            $package_details[$key]['package_id'] = $item['package_id'];
            $package_details[$key]['package_data'] = $package;
            $activity_details[$key] = $package->activity;
            $package_details[$key]['tour_date'] = $item['tour_date'];
            $package_details[$key]['group'] = $item['group'];
            $package_details[$key]['adult'] = $item['adult'];
            $package_details[$key]['child'] = $item['child'];
            $package_details[$key]['infant'] = $item['infant'];

            if($package->category == 'private'){
                $total_amount += $package->price*$item['group'] - (($package->price*$item['group'] * $activity_details[$key]->discount_offer) / 100);
            }else{
                $adult_price = $package->adult_price*$item['adult'];
                $child_price = $package->child_price*$item['child'];
                $total_price = $adult_price + $child_price;
                $total_amount += $total_price - (($total_price * $activity_details[$key]->discount_offer) / 100);
            }
          
        }

        if($voucher_discount > 0){
            $total_amount -= $voucher_discount;
        }
    
        $this->storeOrder($request,$package_details, $activity_details, $total_amount);
        
        if(Auth::user()){
            CartItem::where('user_id', Auth::id())->delete();
        }else{
            FacadesSession::forget('cart_items');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        // Create a checkout session
        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'aed',
                    'product_data' => [
                        'name' => $activity_details[0]->name,
                        // 'images' => [$activity_details[0]->image_url], // Optional
                    ],
                    'unit_amount' => $total_amount*100, // Amount in cents (e.g., $20.00)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success', [encryptData($request->reference_id)]), // Define your success route
            'cancel_url' => route('checkout.cancel'), // Define your cancel route
        ]);

        // Redirect to the checkout page
        return redirect($session->url);
    }

    public function generatePdf($id) {
        $order = Order::with('orderItems')->findOrFail($id);
    
        $html = view('pdf.order', compact('order'))->render(); // Or use compact with $order if needed
    
        $mpdf = new Mpdf();
    
        $mpdf->WriteHTML($html);
    
        return $mpdf->Output('order_details.pdf', 'D'); // 'D' for download
    }

    public function success($reference_id) {
        $reference_id = decryptData($reference_id);
        $order=Order::where('reference_id',$reference_id)->first();
        if($order->status != 'success'){
            $order->update([
                'status'=>'success',
            ]);
    
            $adminEmail = User::where('id', 1)->pluck('email')->first();
    
            Mail::to($order->email)->send(new OrderShipped($order));
            Mail::to($adminEmail)->send(new OrderShipped($order));
        }
        return view('pages.checkout.success', compact('order')); // Create a success view
    }

    public function cancel()
    {
        return view('pages.checkout.cancel'); // Create a cancel view
    }

    public function storeOrder($request,$package_details, $activity_details, $total_amount) {
        
        if(Auth::check()) {
            $user_id=Auth::id();
        } else {
            $user = User::where('email',$request->email)->first();
            $isNewUser = false;

            if(!$user){
                $user = User::create([
                    'first_name'   => $request->firstName,
                    'last_name'    => $request->lastName,
                    'email'        => $request->email,
                    'password'     => Hash::make($request->reference_id),
                    'original_password' => $request->reference_id,
                    'phone'        => $request->phoneNumber,
                ]);
                $isNewUser = true;
            }

            if($user && $isNewUser){
                $user->assignRole(UserRoleEnums::USER);
                $user_id = $user->id;

                //send email to user with login credentials
                Mail::to($user->email)->send(new SendCredentials($user->email,$user->original_password));
            }
        }

        

        // Create the order in the database
        $orderDetail = Order::create([
            'title' => $request->title,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'nationality' => $request->country,
            'phone' => $request->phoneNumber,
            'pickup_location' => $request->pickupLocation,
            'note' => $request->note,
            'reference_id'=>$request->reference_id,
            'total_amount' => $total_amount,
            
            'activity_name' => $activity_details[0]->name,
            'status' => 'failed',
            'user_id'=>$user_id ?? null,
            'date' => now()->format('Y-m-d'),
        ]);

        if ($package_details && is_array($package_details)) {
            foreach ($package_details as $item) {
                $package = $item['package_data'];
               OrderItem::create([
                    'adult'=> $item['adult'] ?? null,
                    'child'=>$item['child'] ?? null,
                    'infant'=>$item['infant'] ?? null,
                    'total_price'=>$item['price'] ?? null,
                    'package_title'=>$package->title,
                    'package_category'=>$package->category,
                    'package_id'=>$package->id,
                    'order_id'=>$orderDetail->id,
                ]);
            }
        }


        return $orderDetail;
    }
}
