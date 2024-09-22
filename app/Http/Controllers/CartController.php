<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\CartRepository;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\User\CartRequest;
use App\Models\CartItem;

class CartController extends Controller {

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

        return view('pages.cart', [
            'cartItems' => $cartItems,
            'totalAmount' => $totalAmount,
            'totalActivities' => $totalActivities
        ]);
    }
    

    public function addToCart(Request $request) {
        
        $user_id = Auth::id();
        
        $cartItemData = [
            'activity_image' => $request->activity_image,
            'activity_slug' => $request->activity_slug,
            'package_id' => $request->package_id,
            'package_title' => $request->package_title,
            'cancellation_duration' => $request->cancellation_duration,
            'quantity' => $request->group ?? $request->adult ?? 1,
            'tour_date' => $request->tour_date,
            'package_highlight' => $request->highlight,
            'category' => $request->category,
            'group' => $request->group,
            'group_size' => $request->group_size,
            'adult' => $request->adult,
            'child' => $request->child,
            'infant' => $request->infant,
            'price' => $request->price,
        ];
        
        // $totalCartItems = 0;
        
        if ($user_id) {
            // Authenticated user, save to database
            CartItem::create(array_merge($cartItemData, ['user_id' => $user_id]));
            // $totalCartItems = CartItem::where('user_id', $user_id)->count();

        } else {
            // Unauthenticated user, store in session
            $cart_items = session()->get('cart_items', []);
            $cart_items[] = $cartItemData;
            session()->put('cart_items', $cart_items);
            // $totalCartItems = count($cart_items);
        }
        
        return redirect()->route('cart.index');
    }

    // public function showCart(Request $request) {
    //     $user_id = Auth::id();
    //     $cart = CartItem::where('user_id', $user_id)->with('package.activity')->get();

    //     return view('pages.cart', compact('cart'));
    // }

    public function updateCart($item_id, array $data) {
        $user_id = Auth::id();

        $cartItem = CartItem::where('user_id', $user_id)->where('id', $item_id)->first();

        if ($cartItem) {
            $fieldsToUpdate = [
                'quantity' => $data['quantity'] ?? $cartItem->quantity,
                'tour_date' => $data['tour_date'] ?? $cartItem->tour_date,
                'adult' => $data['adult'] ?? $cartItem->adult,
                'child' => $data['child'] ?? $cartItem->child,
                'infant' => $data['infant'] ?? $cartItem->infant,
                'price' => $data['price'] ?? $cartItem->price,
            ];
            $cartItem->update($fieldsToUpdate);
        }

        return redirect()->back()->with('success', "Cart updated!");
    }

    public function removeFromCart($id) {
        $user_id = Auth::id();
    
        if ($user_id) {
            // Authenticated user: remove item from the database
            $cartItem = CartItem::where('user_id', $user_id)->where('package_id', $id)->first();

            if ($cartItem) {
                $cartItem->delete();
            }
        } else {
            // Guest user: remove item from session
            $cart_items = session()->get('cart_items', []);
            // Remove the item from the session based on the ID
            foreach ($cart_items as $key => $item) {
                if ($item['package_id'] == $id) {
                    unset($cart_items[$key]);
                    break;
                }
            }

            // Save the updated cart items back to the session
            session()->put('cart_items', $cart_items);
        }
    
        return redirect()->back()->with('success', 'Item removed from cart.');
    }
    

    public function clearCart(Request $request) {

        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->back()->with('success', "Cart updated!");
    }


}
