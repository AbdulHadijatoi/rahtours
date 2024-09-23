<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller {
   
    public function createInquiry(Request $request) {

        Contact::create([
            'first_name' => $request->first_name,
            'email'      => $request->email,
            'company_name'  => $request->company_name,
            'mobile'     => $request->mobile,
            'inquiry_topic' => $request->inquiry_topic,
            'message'    => $request->message
        ]);

        return redirect()->route('thankyou');
        
    }
}