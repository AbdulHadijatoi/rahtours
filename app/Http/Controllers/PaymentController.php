<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller {
    
    public function placeOrder(Request $request) {
        // Set your secret key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Your Product Name',
                        'images' => ['https://example.com/image.png'], // Optional
                    ],
                    'unit_amount' => 2000, // Amount in cents (e.g., $20.00)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success'), // Define your success route
            'cancel_url' => route('checkout.cancel'), // Define your cancel route
        ]);

        // Redirect to the checkout page
        return redirect($session->url);
    }

    public function success()
    {
        return view('pages.checkout.success'); // Create a success view
    }

    public function cancel()
    {
        return view('pages.checkout.cancel'); // Create a cancel view
    }
}
