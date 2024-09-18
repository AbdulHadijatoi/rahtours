<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller {
    
    public function helpPage() {
        $data = [];
        return view('pages.help', $data);
    }
    
    public function wishList() {
        $data = [];
        return view('pages.wish-list', $data);
    }
    
    public function aboutUs()
    {
        $data = [];
        return view('pages.about-us', $data);
    }

    public function cart()
    {
        $data = [];
        return view('pages.cart', $data);
    }

    public function contactUs()
    {
        $data = [];
        return view('pages.contact-us', $data);
    }
   

    public function termsConditions()
    {
        $data = [];
        return view('pages.terms-conditions', $data);
    }
    
    public function privacyPolicy()
    {
        $data = [];
        return view('pages.privacy-policy', $data);
    }

    public function blogsList()
    {
        $data = [];
        return view('pages.blogs-news', $data);
    }
    
    public function blogDetail($slug)
    {
        $data = [];
        return view('pages.blog-details', $data);
    }
    
    public function guidelines()
    {
        $data = [];
        return view('pages.guidelines', $data);
    }
    
    public function manageProfile()
    {
        $data = [];
        return view('pages.manage-profile', $data);
    }
    
    public function whereToFindUs()
    {
        $data = [];
        return view('pages.where-to-find-us', $data);
    }
    
    public function otpVerfication()
    {
        $data = [];
        return view('pages.otp-verification', $data);
    }
    
    public function resetPassword()
    {
        $data = [];
        return view('pages.reset-password', $data);
    }
}
