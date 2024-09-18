
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    
      <div class="mx-auto bg-white p-6 rounded-lg shadow-lg w-[30rem]">
      <h2 class="text-center text-2xl font-bold mb-4">SIGN UP</h2>
      <p class="text-center text-xl font-semibold">Welcome to Rah Tours</p>
      <p class="text-center text-sm font-medium text-gray-600 mb-4">
        Your Gateway to Unforgettable Adventures!
      </p>
      <p class="text-center text-sm text-gray-500 mb-6">
        Create an account to unlock exclusive travel deals, personalized recommendations, and seamless booking experiences.
      </p>

      @include('components.auth.signup-form')

      <p class="mt-4 text-center text-sm">
        Already a member? 
        <a href="{{ url('/login') }}" class="text-secondary font-semibold">Log In</a>
      </p>
    </div>
  </div>

@endsection