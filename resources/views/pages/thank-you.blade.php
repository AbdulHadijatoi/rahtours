
@extends('layouts.app')



@section('content')
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    <!-- Icon -->
    <div class="my-5 flex flex-col items-center">
        <svg class="mx-auto text-orange-400 h-20 w-20 mb-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 8L17.4392 9.97822C15.454 11.0811 14.4614 11.6326 13.4102 11.8488C12.4798 12.0401 11.5202 12.0401 10.5898 11.8488C9.53864 11.6326 8.54603 11.0811 6.5608 9.97822L3 8M6.2 19H17.8C18.9201 19 19.4802 19 19.908 18.782C20.2843 18.5903 20.5903 18.2843 20.782 17.908C21 17.4802 21 16.9201 21 15.8V8.2C21 7.0799 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V15.8C3 16.9201 3 17.4802 3.21799 17.908C3.40973 18.2843 3.71569 18.5903 4.09202 18.782C4.51984 19 5.07989 19 6.2 19Z" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <!-- Title -->
        <h4 class="text-2xl font-semibold text-orange-400 mb-2">Thank you.</h4>
        <!-- Message -->
        <p class="text-base text-gray-600 mb-6">
            A member of the team will get back to you shortly.
        </p>
        <!-- Go Home Button -->
        <div class="mt-5">
            <a href="{{ url('/') }}" class="inline-block bg-secondary2 text-white text-sm font-semibold py-2 px-4 rounded-lg transition-colors">
                Go Home
            </a>
        </div>
    </div>
  </div>

@endsection