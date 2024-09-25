@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-start px-2 md:px-0 items-end mx-auto md:px-0 sm:max-w-lg md:max-w-full lg:max-w-screen-lg mb-6">
        <div class="container mx-auto p-8">
            <h1 class="text-4xl font-bold text-center text-orange-500 mt-5">RAH Tours Gift Card</h1>
            <h2 class="text-5xl font-bold text-center mt-4">Book unforgettable experiences & Activities</h2>

            <div class="flex flex-col items-center py-10">
                <div class="bg-white p-12 border-4 border-orange-500 rounded-xl text-center">
                    <p class="text-xl font-bold">Redeemable for the Value of:</p>
                    <p class="text-orange-500 text-3xl font-bold">AED {{ $discount }}</p>
                </div>

                <p class="mt-4 text-4xl font-semibold">Lucky You!</p>
                <p class="mt-4 text-xl font-medium text-center">You can book any tour, activity, or attraction you like on RAH Tours</p>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 py-8 w-full px-10">
                    <div>
                        <img src="{{ $activity->image_url }}" alt="Activity Image" class="w-full h-auto">
                    </div>

                    <div>
                        <h3 class="text-2xl font-bold">{{ $activity->name }}</h3>
                            <p>
                                {!! $activity->description !!}
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   
@endsection
