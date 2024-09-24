
@extends('layouts.app')



@section('content')

  @include('components.hero-common', ['page_banner_image'=>$data->header_image_url])
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">

    {{-- Main Content --}}
    <div class="px-6 py-10 mx-auto max-w-7xl">
        <h1 class="text-2xl font-bold text-orange-500">About Us</h1>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
            {{-- Text Section --}}
            <div class="text-justify text-gray-600 pr-8">
                <p>
                    We, at RAH Tourism, are very happy to welcome you to this amazing country that will be your home for the next few days. First of all, thank you for choosing us to be your travel partner of choice.
                    For over 15 years now, RAH Tourism has been delivering breathtaking experiences to all guests coming to our destination from all around the globe. We are a full-service premium experience provider with the ability and expertise to deliver wonderful lifelong memories to even the most demanding guests.
                </p>
                <br>
                <p>
                    From the simplest of greetings to the most exquisite cultural and multi-sensory experiences, we are happy to do our best to delight you.
                    From the moment you are greeted by our welcome concierges and are handed your personalized information folder, your holiday becomes our highest priority.
                </p>
                <br>
                <p>
                    Whether you want to relax on the beach, explore local culture, or try a more adventurous type of tour, our specialists will help you design the perfect experience for you and your family.
                    Welcome to the world of RAH Tourism – where premium services have been selected for you.
                </p>
            </div>

            {{-- Image Section --}}
            <div class="flex justify-center">
                <img class="w-full h-96 object-cover rounded-lg" src="{{ $data->image_url }}" alt="About Image">
            </div>
        </div>
    </div>
    
  </div>

@endsection