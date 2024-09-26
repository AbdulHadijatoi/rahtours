<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller {
    
    public function index($slug = null) {
        $mostPopularActivities = Activity::where('most_popular_activity', 1)->orderBy('created_at','DESC')->get();

        return view('home-page', compact('mostPopularActivities'));
    }

}
