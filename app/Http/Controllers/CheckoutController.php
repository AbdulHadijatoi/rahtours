<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class CheckoutController extends Controller {

    public function index() {
        $user_id = Auth::id();
        $totalAmount = 0;
        $totalActivities = 0;
        
        if ($user_id) {
            $cartItems = CartItem::where('user_id', $user_id)->get()->toArray();
        } else {
            $cartItems = session()->get('cart_items', []);
        }

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'];
            $totalActivities++;
        }

        return view('pages.checkout', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'totalActivities' => $totalActivities
        ]);
    }
    

    public function bookNow(Request $request) {
        return view('pages.checkout', [
            'cartItems' => [$request],
        ]);
    }

}
