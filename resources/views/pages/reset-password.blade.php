
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <div class="mx-auto bg-white p-8 rounded-lg shadow-lg w-96">

        <h2 class="text-center text-2xl text-gray-700 font-bold mb-4">Reset Your Password</h2>

        <p class="text-center text-sm text-gray-600 mb-6">
          Enter a new password below to reset your account password.
        </p>

        <form class="space-y-4" action="{{ route('resetPassword') }}" method="POST">
          @csrf
          <div>
            <label class="block text-sm font-semibold mb-1">New Password *</label>
            <input type="password" name="password" placeholder="Enter new password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          </div>

          @if($email)
              <input type="hidden" name="email" value="{{ $email }}">
          @endif
          
          @if($otp_code)
              <input type="hidden" name="otp" value="{{ $otp_code }}">
          @endif


          <div>
            <label class="block text-sm font-semibold mb-1">Confirm New Password *</label>
            <input type="password" name="password_confirmation" placeholder="Confirm new password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          </div>

          <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
            Reset Password
          </button>
        </form>
      </div>
  </div>

@endsection