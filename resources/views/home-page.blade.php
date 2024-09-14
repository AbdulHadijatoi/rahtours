@extends('layouts.app')



@section('content')
    
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
        
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
    
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-10">

            <h2 class="w-full text-center text-2xl sm:text-4xl mb-6">
                Travelers' Favorite Choice
            </h2>
          

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(!empty($mostPopularActivities))
            @foreach ($mostPopularActivities as $activity)
                @include('components.card', [
                    'card_link' => 'dubai-activities/' . $activity->slug,
                    'card_image' => $activity->image_url,
                    'card_title' => $activity->name, 
                    'card_rating' => $activity->average_rating,
                    'card_reviews' => $activity->number_of_reviews,
                    'card_price' => $activity,
                ])
            @endforeach
            @endif
            
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