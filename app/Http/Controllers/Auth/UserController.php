<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRoleEnums;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\User\{RegisterRequest, LoginRequest};
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller {

    public function register(Request $request) {
        $user = User::create([
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'original_password' => $request->password,
            'phone'        => $request->phone,
            'visa_status'  => $request->visa_status,
            'instagram'    => $request->instagram,
            'twitter'      => $request->twitter,
            'facebook'     => $request->facebook
        ]);
        $user->assignRole(UserRoleEnums::USER);
        return redirect()->to('/login')->with('success',"Successfully created account!");

    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the user in
        $credentials = ['email' => $request->email, 'password' => $request->password];
        $remember = $request->has('remember'); // Check if "Remember me" is checked

        if (Auth::attempt($credentials, $remember)) {
            // Authentication was successful
            return redirect()->to('/'); // Redirect to the dashboard (or another page)
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Login failed, invalid email or password!')->withInput(); // Redirect back with error and input
        }
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->to('/login');
    }



    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Handle file upload if a new profile image is provided
        if ($request->hasFile('profile_image')) {
            // If user has an old profile image, delete it
            if (!empty($user->profile_image)) {
                $this->deleteImage($user->profile_image);
            }

            // Upload the new profile image
            $imagePath = $this->uploadImage($request->file('profile_image'));
            $user->profile_image = $imagePath; // Save the path to the DB
            // $user->profile_pic_url = Storage::url($imagePath); // Generate the public URL
        }

        // Update other profile details
        $user->first_name = $request->first_name ?? $user->first_name;
        $user->last_name = $request->last_name ?? $user->last_name;
        $user->phone = $request->phone ?? $user->phone;
        // $user->visa_status = $request->visa_status ?? $user->visa_status;
        // $user->instagram = $request->instagram ?? $user->instagram;
        // $user->twitter = $request->twitter ?? $user->twitter;
        // $user->facebook = $request->facebook ?? $user->facebook;
        $user->save(); // Save the updated data

        return redirect()->back()->with('success', "Profile updated successfully!");
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed', // Ensure password confirmation
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password); // Hash the new password
        $user->original_password = $request->password; // Store the plain text password
        $user->save(); // Save the updated password

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    // Helper function to delete the old image
    private function deleteImage($imagePath)
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    // Helper function to upload a new image to storage/app/uploads
    private function uploadImage($file)
    {
        $imageName = uniqid() . '.' . $file->getClientOriginalExtension(); // Generate a unique name
        $filePath = $file->storeAs('uploads', $imageName, 'public'); // Store in storage/app/public/uploads
        return $filePath; // Return the path to be stored in the DB
    }

    
}