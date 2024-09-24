<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Activity;
use App\Models\Order;

class AdminController extends Controller
{
    public function index() {
        if(Auth::check()) {
            return redirect()->route('admin.dashboard')->with('success', 'Already LoggedIn');
        }

        return view('admin.auth.login');
    }

    public function dashboard()
    {
        $data['users']=User::count();
        $data['activities']=Activity::count();
        $data['bookings']=Order::count();
        return view('admin.dashboard',$data);
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = User::where('email', $request->email)->first();

        // Attempt to log the user in
        $credentials = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credentials, true)) {
            $user = Auth::user();

            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginPage')->with('success','Logout successfully');
    }
}