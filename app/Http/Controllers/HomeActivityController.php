<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeActivityController extends Controller {
    
    public function activityDetails($category, $slug = null) {
        $activity = Activity::with(['activityImages'])->where('slug', $slug)->first();
        if(!$activity){
            abort(404, "Resource not found!");
        }
        // return $activity;
        return view('pages.activity-details',compact('activity'));
    }
    
    public function getActivities($categorySlug = null) {
        if($categorySlug){
            $activities = Activity::whereHas('category', function ($query) use ($categorySlug){
                                $query->where('slug', $categorySlug);
                            })
                            ->get();
        }else{
            $activities = Activity::get();
        }
        return view('pages.all-activities',compact('activities'));
    }

    public function getWishlistActivities(Request $request)
    {
        // Retrieve the 'ids' query parameter and convert it to an array
        $ids = $request->query('ids');

        // Check if 'ids' is not empty and convert it to an array (assuming it's a comma-separated string)
        if ($ids) {
            $idsArray = explode(',', $ids); // Convert comma-separated string to array
            $activities = Activity::with(['category','packages'])->whereIn('id', $idsArray)->get();
            return response()->json($activities);
        }

        return response()->json([]);
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
       

}
