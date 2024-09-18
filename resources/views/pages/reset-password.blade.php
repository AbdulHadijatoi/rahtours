
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <!-- Reset Password Form -->
      <div class="mx-auto bg-white p-8 rounded-lg shadow-lg w-96">
        <!-- Title -->
        <h2 class="text-center text-2xl text-gray-700 font-bold mb-4">Reset Your Password</h2>
        <!-- Subtitle -->
        <p class="text-center text-sm text-gray-600 mb-6">
          Enter a new password below to reset your account password.
        </p>

        <!-- Form -->
        <form id="resetPasswordForm" class="space-y-4">
          <!-- New Password -->
          <div>
            <label class="block text-sm font-semibold mb-1">New Password *</label>
            <input type="password" placeholder="Enter new password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          </div>

          <!-- Confirm New Password -->
          <div>
            <label class="block text-sm font-semibold mb-1">Confirm New Password *</label>
            <input type="password" placeholder="Confirm new password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          </div>

          <!-- Reset Password Button -->
          <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
            Reset Password
          </button>
        </form>
      </div>
  </div>

@endsection