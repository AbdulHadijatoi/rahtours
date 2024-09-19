<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendPasswordResetLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendResetLink(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->email;

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->to('/forgot-password')->with('error', "Email not found!");
        }

        // Generate the OTP
        $otp = random_int(100000, 999999);

        // Save the OTP in the password_resets table
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => ($otp), 'created_at' => now()]
        );

        // Send the OTP via email
        Mail::to($request->email)->send(new SendPasswordResetLink($otp));

        return view('pages.otp-verification', compact('email'));
    }

    public function verifyOTP(Request $request) {
        $request->validate([
            'otp_code' => 'required',
            'email' => 'required',
        ]);

        $otp_code = implode('',$request->otp_code);
        $email = $request->email;

        $passwordReset = DB::table('password_resets')
            ->where('token', $otp_code)
            ->first();
        // return $passwordReset;
        if (!$passwordReset) {
            return redirect()->back()->with('error', "Invalid OTP!");
        }
        return view('pages.reset-password', compact('email','otp_code'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
            'otp' => 'required',
        ]);

        $user = DB::table('password_resets')
                    ->where('email', $request->email)
                    ->where('token', $request->otp)
                    ->first();

        if ($user) {
            $userModel = User::where('email', $user->email)->first();

            if (!$userModel) {
                return response()->json(['error' => 'User not found'], 404);
            }

            // Update the user's password
            $userModel->update(['password' => Hash::make($request->password)]);
            $userModel->update(['original_password' => $request->password]);

            // Delete the password reset record
            DB::table('password_resets')->where('email', $request->email)->delete();

            return redirect()->to('/login')->with('success', "Password has been reset successfully");
        } else {
            return redirect()->back()->with('error', "OTP is Expired");
        }
    }


}
