<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\SettingContactUs;
use App\Models\SettingFindUs;
use App\Models\SettingTermsCondition;
use Illuminate\Http\Request;

class PageController extends Controller {
    
    public function helpPage() {
        $data = [];
        return view('pages.help', compact('data'));
    }
    
    public function aboutUs()
    {
        $data=Aboutus::first();
        return view('pages.about-us', compact('data'));
    }

    public function contactUs() {
        $data=SettingContactUs::first();
        return view('pages.contact-us', compact('data'));
    }
   

    public function termsConditions()
    {
        $data=SettingTermsCondition::first();
        return view('pages.terms-and-conditions', compact('data'));
    }
    
    public function privacyPolicy()
    {
        $data = [];
        return view('pages.privacy-policy', compact('data'));
    }

   
    public function guidelines()
    {
        $data = [];
        return view('pages.guidelines', compact('data'));
    }
    
    public function manageProfile()
    {
        $data = [];
        return view('pages.manage-profile', compact('data'));
    }
    
    public function whereToFindUs()
    {
        $data = SettingFindUs::first();

        return view('pages.where-to-find-us', compact('data'));
    }
    
    public function otpVerfication(Request $request)
    {
        $email = $request->email;
        return view('pages.otp-verification', $email);
    }
    
    public function resetPassword()
    {
        $data = [];
        return view('pages.reset-password', compact('data'));
    }
    
    public function login()
    {
        $data = [];
        return view('pages.login', compact('data'));
    }
    
    public function signup()
    {
        $data = [];
        return view('pages.signup', compact('data'));
    }
    
    public function forgotPassword(Request $request)
    {
        
        return view('pages.forgot-password');
    }
    
    public function history()
    {
        $data = [];
        return view('pages.history', compact('data'));
    }
    
    public function thankYou() {
        return view('pages.thank-you');
    }
}
