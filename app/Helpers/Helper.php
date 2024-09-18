<?php

use App\Models\Activity;
use App\Models\Category;
use App\Models\Menu;
use App\Models\PageSetting;
use App\Models\Setting;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (!function_exists('settings')) {
    function settings() {
        $settings = Setting::first();
        return $settings;
    }
}

if (!function_exists('allCategories')) {
    function allCategories() {
        $categories = Category::get(['id','name']);
        return $categories;
    }
}

if (!function_exists('isInWishlist')) {
    function isInWishlist($id) {
        if(Auth::user()){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->pluck('activity_id')->toArray();
        }else{
            $wishlist = session('wishlist', []);
        }
        return in_array($id, $wishlist);
    }
}

if (!function_exists('getActivitiesByIds')) {
    function getActivitiesByIds($ids) {
        $activities = Activity::whereIn('id',$ids)->get();
        return $activities;
    }
}

if (!function_exists('isRoute')) {
    function isRoute($routeName) {
        return Route::currentRouteName() == $routeName;
    }
}

if (!function_exists('getDiscount')) {
    function getDiscountPrice($activity, $type = "sharing") {

        if($type == 'private'){
            $price = $activity->packages[0]->price - (($activity->packages[0]->price * $activity->discount_offer) / 100);
        }else{
            $price = $activity->packages[0]->adult_price - (($activity->packages[0]->adult_price * $activity->discount_offer) / 100);
        }

        return $price;
    }
}

if (!function_exists('getPrice')) {
    function getPrice($activity) {
        if($activity->discount_offer > 0){
            if($activity->packages[0]->category == 'private'){
                $price = $activity->packages[0]->price - (($activity->packages[0]->price * $activity->discount_offer) / 100);
            }else{
                $price = $activity->packages[0]->adult_price - (($activity->packages[0]->adult_price * $activity->discount_offer) / 100);
            }
        }else{
            if($activity->packages[0]->category == 'private'){
                $price = $activity->packages[0]->price;
            }else{
                $price = $activity->packages[0]->adult_price;
            } 
        }

        return $price;
    }
}

if (!function_exists('getPrice')) {
    function getPrice($activity) {
        if($activity->discount_offer > 0){
            if($activity->packages[0]->category == 'private'){
                $price = $activity->packages[0]->price - (($activity->packages[0]->price * $activity->discount_offer) / 100);
            }else{
                $price = $activity->packages[0]->adult_price - (($activity->packages[0]->adult_price * $activity->discount_offer) / 100);
            }
        }else{
            if($activity->packages[0]->category == 'private'){
                $price = $activity->packages[0]->price;
            }else{
                $price = $activity->packages[0]->adult_price;
            } 
        }

        return $price;
    }
}

if (!function_exists('getRandomActivities')) {
    function getRandomActivities(int $count)
    {
        return Activity::inRandomOrder()->take($count)->get();
    }
}

if (!function_exists('getCategories')) {
    function getCategories() {
        return Category::get();
    }
}

if (!function_exists('getChildPrice')) {
    function getChildPrice($activity) {
        if($activity->discount_offer > 0){
            $price = $activity->packages[0]->child_price - (($activity->packages[0]->child_price * $activity->discount_offer) / 100);
        }else{
            $price = $activity->packages[0]->child_price;
        }

        return $price;
    }
}

if (!function_exists('getPageName')) {
    function getPageName() {
        $pageSlug = request()->segments();

        if (count($pageSlug) >= 1) {
            $pageSlug = request()->segment(count($pageSlug));
        } else {
            $pageSlug = "home";
        }

        $pageSetting = PageSetting::where("slug",$pageSlug)->first();
        
        if($pageSetting){
            return $pageSetting->title;
        }
        
        return ucwords(str_replace('-', ' ', $pageSlug));
    }
}

if (!function_exists('getHeroImage')) {
    function getHeroImage() {
        $pageSlug = request()->segments();

        if (count($pageSlug) > 1) {
            $pageSlug = request()->segment(count($pageSlug));
        } else {
            $pageSlug = "home";
        }

        $pageSetting = PageSetting::where("slug",$pageSlug)->first();
        
        if($pageSetting){
            return $pageSetting->hero_image;
        }
        
        return 'storage/uploads/hero_image.png';
    }
}

if (!function_exists('makeActiveLink')) {
    function isActive($slug) {
        if(in_array($slug, request()->segments())){
            return true;
        }
        return false;
    }
}

if (!function_exists('getHeroText')) {
    function getHeroText() {
        $pageSlug = request()->segments();

        if (count($pageSlug) > 0) {
            $pageSlug = request()->segment(count($pageSlug));
        } else {
            $pageSlug = "home";
        }

        $pageSetting = PageSetting::where("slug",$pageSlug)->first();
        
        if($pageSetting){
            return $pageSetting->description;
        }
        
        return 'With truly integrated logistics there’s always a new way to keep your goods moving and your business growing.';
    }
}

if (!function_exists('getMenu')) {
    function getMenu($menu_type_id = 1) {
        $menus = Menu::where("menu_type_id",$menu_type_id)->get();
        
        return $menus; 
    }
}

if (!function_exists('generateBreadcrumbs')) {
    function generateBreadcrumbs()
    {
        $segments = request()->segments();
        $breadcrumbs = [];
        $url = '';

        foreach ($segments as $key => $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)),
                'url' => url($url)
            ];
        }

        return $breadcrumbs;
    }
}
