<?php

use App\Models\Menu;
use App\Models\PageSetting;
use App\Models\Setting;

if (!function_exists('settings')) {
    function settings() {
        $settings = Setting::first();
        return $settings;
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
