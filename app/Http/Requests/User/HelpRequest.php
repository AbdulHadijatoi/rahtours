<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class HelpRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
            'email'=>'required',
            'booking_ref_no'=>'required',
            
        ];
    }
}
