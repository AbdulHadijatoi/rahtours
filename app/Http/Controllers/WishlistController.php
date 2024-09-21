<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\CartRepository;
use App\Helpers\ExceptionHandlerHelper;
use App\Traits\ResponseTrait;
use illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\User\CartRequest;
use App\Models\Activity;
use App\Models\CartItem;
use App\Models\Wishlist;

class WishlistController extends Controller {
    
    public function index(Request $request) {
        
        if(Auth::user()){
            $activities = Activity::whereHas('wishlists',function($q){
                                $q->where('user_id', Auth::id());
                            })->get();
                
        }else{
            $ids = session('wishlist', []);
            $activities = Activity::whereIn('id',$ids)->get();
        }

        return view('pages.wish-list', compact('activities'));
    }
    
    public function addToWishList($id) {
        if ($id) {
            $user = Auth::user();
            if($user){
                $wishlist = Wishlist::find($id);
                if(!$wishlist){
                    Wishlist::create([
                        'user_id' => $user->id,
                        'activity_id' => $id,
                    ]);
                }
            }else{
                $wishlist = session('wishlist', []);
                if (!in_array($id, $wishlist)) {
                    $wishlist[] = $id;
                    session(['wishlist' => $wishlist]);
                }
            }
        }
    
        return redirect()->back();
    }    

    public function removeFromWishList($id) {

        if ($id) {
            $user = Auth::user();
            
            if ($user) {
                
                $wishlist = Wishlist::where('user_id', $user->id)
                                    ->where('activity_id', $id)
                                    ->first();
                // return $wishlist;
                if ($wishlist) {
                    $wishlist->delete(); 
                }
            } else {
                $wishlist = session('wishlist', []);
                
                if (in_array($id, $wishlist)) {
                    $wishlist = array_filter($wishlist, function ($wishId) use ($id) {
                        return $wishId != $id;
                    });
                      
                    session(['wishlist' => $wishlist]);
                }
            }
        }
    
        return redirect()->back();
    }

    public function clearWishlist() {

        Wishlist::where('user_id', Auth::id())->delete();
        
        return redirect()->back()->with('success', "Cart updated!");
    }
}
