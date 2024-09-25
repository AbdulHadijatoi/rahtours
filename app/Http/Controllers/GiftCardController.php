<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendVoucherCode;
use App\Models\Activity;
use App\Models\GiftCard;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GiftCardController extends Controller {

    public function index() {
        //
    }
    

    public function sendGift(array $data)
    {
        $code = isset($data['code']) ? isset($data['code']) : Str::random(6);
        $activityId= $data['activity_id'] ?? null;
        $validDate = Carbon::now()->addMonths(3);
        $voucher = GiftCard::create([
            'activity_id'    => $activityId,
            'recipient_email'=> $data['recipient_email'],
            'code'           => $code,
            'discount_price' => $data['discount_price'],
            'valid_date'     => $validDate,
            'description'=>$data['description'] ?? null,
        ]);
        
        if($voucher) {
            $activity=null;
            if($activityId !=null) {
                $activity=Activity::findOrFail($data['activity_id']);
            }
            else{
                $activity=null;
            }
            Mail::to($data['recipient_email'])->send(new SendVoucherCode($voucher,$activity));
        }
        return $voucher;
    }

    public function applyVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher_code');
        $voucher = GiftCard::where('code', $voucherCode)
                            ->whereRaw("STR_TO_DATE(valid_date, '%d-%m-%Y') > ?", [now()->format('Y-m-d')])
                            ->first();

        // Check if the voucher exists
        if (!$voucher) {
            return response()->json(['message' => 'Voucher code is invalid'], 400);
        }

        $currentDate = now();

        // Check if the voucher is expired
        if ($currentDate->greaterThan($voucher->valid_date)) {
            return response()->json(['message' => 'Voucher is expired'], 400);
        }

        // // Check if the voucher has already been applied (you may need to track this in your session or cart)
        // if (session()->has('voucher_applied')) {
        //     return response()->json(['message' => 'Voucher can only be applied once per checkout'], 400);
        // }

        // Apply the voucher
        // session()->put('voucher_applied', true);
        $newData['price'] = $voucher->discount_price;

        return response()->json($newData);
    }


    public function applyVoucher_old(array $data)
    {
        $voucher = GiftCard::where('code', $data['voucher_code'])->first();

        if ($voucher) {
            $currentDate = now();

            if ($currentDate->greaterThan($voucher->valid_date)) {
                return "Voucher is expired";
            } else {
                $newData['price'] = $voucher->discount_price;
                return $newData;
            }
        } else {
            return "Voucher code is invalid";
        }
    }

    public function expireVoucher(array $data)
    {
        $voucher = GiftCard::where('code', $data['voucher_code'])->first();

        if ($voucher) {
            $voucher->delete();
            return "Voucher Deleted Successfully";
        } else {
            return "Voucher code is invalid";
        }
    }
}
