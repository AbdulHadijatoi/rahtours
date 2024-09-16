<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeActivityController extends Controller {
    
    public function activityDetails($category, $slug = null) {
        $activity = Activity::where('slug', $slug)->first();
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
