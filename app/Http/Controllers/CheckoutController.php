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
        $cartItems = [];
        $cartItems[0]['package_id'] = $request->package_id;
        $cartItems[0]['package_title'] = $request->package_title;
        $cartItems[0]['activity_image'] = $request->activity_image;
        $cartItems[0]['cancellation_duration'] = $request->cancellation_duration;
        $cartItems[0]['activity_slug'] = $request->activity_slug;
        $cartItems[0]['highlight'] = $request->highlight;
        $cartItems[0]['price'] = $request->price;
        $cartItems[0]['group_size'] = $request->group_size;
        $cartItems[0]['category'] = $request->category;
        $cartItems[0]['tour_date'] = $request->tour_date;
        $cartItems[0]['adult'] = $request->adult;
        $cartItems[0]['child'] = $request->child;
        $cartItems[0]['infant'] = $request->infant;
        $cartItems[0]['group'] = $request->group;

        return view('pages.checkout', [
            'cartItems' => $cartItems,
        ]);
    }

}
