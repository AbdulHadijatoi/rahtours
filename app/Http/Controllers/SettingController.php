<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnums;
use App\Mail\OrderShipped;
use App\Mail\SendCredentials;
use App\Models\Aboutus;
use App\Models\CartItem;
use App\Models\GiftCard;
use App\Models\Homeimage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Package;
use App\Models\SettingBlog;
use App\Models\SettingContactUs;
use App\Models\SettingFindUs;
use App\Models\SettingGuideline;
use App\Models\SettingPrivacyPolicy;
use App\Models\SettingTermsCondition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use PDF;
class SettingController extends Controller {
    
    public function contactUs() {
            $data=SettingContactUs::all();
            // return $this->sendResponse($data,'Contact-us details');
    }
    
    public function findUs() {
            $data=SettingFindUs::all();
            // return $this->sendResponse($data,'Find-us details');
    }

    
    public function homeImage() {
            $data=Homeimage::all();
            // return $this->sendResponse($data,'Find-us details');
    }

    
    public function aboutImage() {
            $data=Aboutus::all();
            // return $this->sendResponse($data,'Find-us details');
    }
    
    public function guidelinesImage() {
            $data=SettingGuideline::all();
            // return $this->sendResponse($data,'Guideline Image');
    }
    
    public function termsConditionsImage() {
            $data=SettingTermsCondition::all();
            // return $this->sendResponse($data,'Terms & Conditions Image');
    }
    
    public function privacyPolicyImage() {
            $data=SettingPrivacyPolicy::all();
            // return $this->sendResponse($data,'Privacy Policy Image');
    }

    
    public function blogImage() {
            $data=SettingBlog::all();
            // return $this->sendResponse($data,'Blog Page Image');
    }
}
