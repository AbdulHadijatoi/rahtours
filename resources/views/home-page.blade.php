@extends('layouts.app')



@section('content')
    
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 mb-20 mt-10">
        
        <h1 class="w-full text-3xl sm:text-4xl text-gray-800 mb-6 text-center">
            Why choose RAH?
        </h1>
        {{-- <p class="text-md text-gray-600 mb-8">
            {{ settings()->choose_us_text }}
        </p> --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    
            @include('components.home.why-choose-us-card',[
                'card_icon' => 'headphone',
                'card_title' => 'Unmatched Expertise',
                'card_text' => 'Benefit from our 15 years of industry experience, ensuring unparalleled knowledge and insights into the best attractions in Dubai and Abu Dhabi.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'book',
                'card_title' => 'Premium Packages',
                'card_text' => 'Indulge in luxury with our premium tour packages, designed to provide an extraordinary travel experience tailored to your preferences.',
            ])

            @include('components.home.why-choose-us-card',[
                'card_icon' => 'customize',
                'card_title' => 'Personalized Services',
                'card_text' => 'As one of the experienced tourism companies in Dubai we offer personalized services, where attention to detail and customer satisfaction are our top priorities.',
            ])
            
        </div>

    </div>
    
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 mb-10">

            <h2 class="w-full text-center text-2xl sm:text-4xl mb-6">
                Travelers' Favorite Choice
            </h2>
          

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @include('components.card', [
                'card_image' => 'storage/uploads/card1_image.jpeg',
                'card_title' => "Dubai Quad Bike ATV Desert Tour with Sandboarding & Camel Ride 12345", 
                'card_rating' => 5,
                'card_reviews' => 5,
                'card_price' => 500,
            ])
            @include('components.card', [
                'card_image' => 'storage/uploads/card1_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_rating' => 1,
                'card_reviews' => 3,
                'card_price' => 300,
            ])
            @include('components.card', [
                'card_image' => 'storage/uploads/card2_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_rating' => 2,
                'card_reviews' => 4,
                'card_price' => 400,
            ])
            @include('components.card', [
                'card_image' => 'storage/uploads/card3_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_rating' => 3,
                'card_reviews' => 1,
                'card_price' => 100,
            ])
            
            @include('components.card', [
                'card_image' => 'storage/uploads/card3_image.jpeg',
                'card_title' => "Supply Chain and Logistics", 
                'card_rating' => 4,
                'card_reviews' => 2,
                'card_price' => 200,
            ])
        </div>
    </div>

    {{-- <div class="card bg-base-200 w-80">
  <div class="card-body">
    <input placeholder="Email" class="input input-bordered" />
    <label class="label cursor-pointer">
      Accept terms of use
      <input type="checkbox" class="toggle" />
    </label>
    <label class="label cursor-pointer">
      Submit to newsletter
      <input type="checkbox" class="toggle" />
    </label>
    <button class="btn btn-neutral">Save</button>
  </div>
</div> --}}


@endsection

@section('styles')

@endsection

@section('scripts')

@endsection