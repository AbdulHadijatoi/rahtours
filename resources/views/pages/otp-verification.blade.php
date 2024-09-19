
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <!-- OTP Verification Form -->
      <div class="m-auto bg-white p-8 rounded-lg shadow-lg w-96">
        <!-- Title -->
        <h2 class="text-center text-2xl text-gray-700 font-bold mb-4">Verify Your OTP</h2>
        <!-- Subtitle -->
        <p class="text-center text-sm text-gray-600 mb-6">
          Please enter the 6-digit OTP sent to your registered email address.
        </p>

        <!-- OTP Input Fields -->
        <form id="otpForm" class="space-y-4" action="{{ route('verifyOTP') }}" method="POST">
          @csrf
           @if($email)
              <input type="hidden" name="email" value="{{ $email }}">
          @endif
          <!-- OTP -->
          <div class="flex justify-between mb-4">
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
            <input type="text" name="otp_code[]" maxlength="1" class="w-12 h-12 border border-gray-300 text-center text-lg rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          </div>

          <!-- Verify OTP Button -->
          <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
            Verify OTP
          </button>
        </form>
        <form class="space-y-4" action="{{ route('sendResetLink') }}" method="GET">
          @if($email)
              <input type="hidden" name="email" value="{{ $email }}">
          @endif
          <!-- Resend OTP -->
          <p class="text-center text-sm text-gray-600 mt-4">
            Didn’t receive the OTP? <button type="submit" href="#" class="text-secondary font-medium">Resend OTP</button>
          </p>
        </form>
      </div>
  </div>

@endsection