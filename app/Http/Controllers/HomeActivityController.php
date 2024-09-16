<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeActivityController extends Controller {
    
    public function activityDetails($slug = null) {
        $activity = Activity::where('slug', $slug)->first();
        if(!$activity){
            abort(404, "Resource not found!");
        }
        // return $activity;
        return view('pages.activity-details',compact('activity'));
    }
    
    public function allActivities() {
        $activities = Activity::get();
        return view('pages.all-activities',compact('activities'));
    }
}
