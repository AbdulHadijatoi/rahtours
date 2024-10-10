@extends('layouts.app')

@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <div class="mx-auto bg-white p-6 rounded-lg shadow-lg w-[30rem] relative">
      
      <h1 class="text-center text-2xl font-bold mb-4">Sign in to our platform</h1>
      
      <p class="text-center text-sm text-gray-600 mb-6">
        Sign in to unlock a world of rewards – accumulate RAH Tours Loyalty points or snag exclusive discounts on your booked travel experiences!
      </p>

      <!-- Display Error Message -->
      @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
      @endif

      @if (session('success'))
          <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
              {{ session('success') }}
          </div>
      @endif


      @include('components.auth.login-form')

      
      <p class="mt-6 text-center text-sm">
        Already a member? Log in below to access your account and explore the world with ease? 
        <a href="{{ url('/signup') }}" class="text-secondary font-semibold hover:underline">Create account</a>
      </p>
    </div>
  </div>

@endsection
