<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\SettingContactUs;
use App\Models\SettingFindUs;
use App\Models\SettingGuideline;
use App\Models\SettingPrivacyPolicy;
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
        $data=SettingPrivacyPolicy::first();

        $texts = [
            "Processing the booking request.",
            "To verify the final costs of the services provided.",
            "To be able to contact our clients in case of any service related changes.",
            "For billing purposes.",
        ];

        $text_list2 = [
            "Where the personal data is no longer necessary in relation to the purpose for which it was originally collected/processed",
            "When the individual withdraws consent",
            "When the individual objects to the processing and there is no other legal ground for the relevant processing activity",
            "When the personal data was unlawfully processed",
            "Where the personal data has to be erased in order to comply with a legal obligation",
        ];

        $text_list3 = [
            "How can data be deleted?",
            "When the individuals withdraws consent?",
            "When the personal data was unlawfully processed?",
        ];

        return view('pages.privacy-policy', compact('data','texts','text_list2','text_list3'));
    }

   
    public function guidelines() {
        // Data for the first section
        $data1 = [
            [
                'title' => '1. How to Book',
                'descriptions' => [
                    'To book any of our Tours and Safaris, book online, call us at +971 52 933 1100, or visit our Office.',
                    'Purchase of any of our products or services is subject to our Conditions of Contract.'
                ],
            ],
            [
                'title' => 'A Vehicles',
                'descriptions' => [
                    'Our vehicle fleet ensures comfort and safety. By law, all passengers must wear seat belts while the vehicle is in motion.',
                    'Special seating is required for children and must be requested and booked in advance.',
                    'Seating is not pre-allocated. During safaris, seating will be rotated. Read our safety card before the excursion.'
                ],
            ],
        ];

        // Data for the second section
        $data2 = [
            [
                'title' => '2. Good To Know',
                'descriptions' => [
                    'Our sightseeing tours are conducted in multiple languages, but our safari is in English only.',
                    'Our safaris involve off-road driving through the Lahbab Desert Area. Due to the adventurous nature, avoid participation if you have medical conditions.',
                    'Additional guidelines for visitors to the UAE can be found on the following websites:'
                ],
                'link' => [
                    'www.visitabudhabi.ae/ae-en/',
                    'www.visitdubai.com/en',
                    'www.visitrasalkhaimah.com',
                    'www.visitsharjah.com'
                ]
            ],
            [
                'title' => '3. Cultural Awareness',
                'descriptions' => [
                    'Photographing government buildings, military institutions, and oil refineries is prohibited.',
                    'Avoid smoking indoors or in public areas.',
                    'Always ask permission before taking pictures of Emiratis.',
                    'Public displays of affection are discouraged.',
                    'Modest clothing is recommended, especially in shopping malls and mosques. Beachwear is acceptable at beach clubs and pools.'
                ],
            ],
            [
                'title' => '4. Dress Code for Sheikh Zayed Grand Mosque Visit',
                'descriptions' => [
                    'No transparent or tight clothing.',
                    'No shorts, skirts, or sleeveless shirts.',
                    'No clothing with profanity or inappropriate imagery.'
                ],
            ],
            [
                'title' => '5. Alcohol and Entertainment',
                'descriptions' => [
                    'Alcohol and live entertainment are prohibited during religious holidays. The legal drinking age in the UAE is 21.'
                ],
            ],
            [
                'title' => '6. Ramadan',
                'descriptions' => [
                    'During Ramadan, eating, drinking, and smoking in public during daylight hours are prohibited. Food is served at some hotels and cafes.'
                ],
            ],
        ];

        // Seat data table
        $seatData = [
            [
                'seatType' => 'Infant Seat',
                'applicableFor' => 'Infant Seat (0-12 months and/or under 75cm)',
                'vehicles' => 'Exclusive Vehicle'
            ],
            [
                'seatType' => 'Baby Seat',
                'applicableFor' => 'Baby Seat (1-3 years and/or 65cm – 95cm)',
                'vehicles' => 'Exclusive Vehicle'
            ]
        ];
        $imageData = SettingGuideline::first();
        return view('pages.guidelines', compact('imageData', 'data1', 'data2', 'seatData'));
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
