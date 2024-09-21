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

    
       

}
