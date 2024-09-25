
@extends('layouts.app')



@section('content')

  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
    <div class="container mx-auto py-10">
        <div class="text-center mb-8">
            <h1 class="text-orange-500 text-4xl font-bold mt-5">RAH Tours Gift Card</h1>
            <h2 class="text-3xl font-bold mt-2">Book unforgettable experiences & Activities</h2>
        </div>

        <div class="flex flex-col items-center justify-center">
            <div class="bg-white p-10 border-8 border-orange-400 rounded-xl text-center">
                <p class="text-black font-bold">Redeemable for the Value of:</p>
                <h3 class="text-orange-500 text-3xl font-bold">AED {{ $discountPrice }}</h3>
            </div>

            <p class="mt-6 text-4xl font-semibold">Lucky You!</p>
            <p class="mt-2 text-xl font-medium">You can book any tour, activity, or attraction you like on RAH Tours.</p>

            <div class="w-full max-w-2xl mt-10">
                <img src="{{ $acData['image_url'] }}" alt="Activity Image" class="w-full rounded-lg">
            </div>
        </div>
    </div>
  </div>

@endsection