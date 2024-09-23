
@extends('layouts.app')



@section('content')

  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
  
    <div class="container mx-auto p-4 lg:w-2/3">
    <div class="text-center py-5">
        <h4 class="font-bold text-2xl">Thank you, Your Booking is Almost Complete</h4>
    </div>

    <div class="bg-gray-100 p-6">
        <!-- Booking Header -->
        <div class="border-gray-300 p-4">
            <h5 class="text-lg font-semibold">Booking Summary</h5>
            <hr class="my-2 border-t-2 border-gray-300">
            
            <!-- Booking Details -->
            <div class="mt-4 space-y-2">
                <div class="flex justify-between">
                    <span class="font-semibold">First Name:</span>
                    <span>{{ $order->first_name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Last Name:</span>
                    <span>{{ $order->last_name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Email:</span>
                    <span>{{ $order->email }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Nationality:</span>
                    <span>{{ $order->nationality }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Phone:</span>
                    <span>{{ $order->phone }}</span>
                </div>
            </div>

            <!-- Booking Reference -->
            <div class="mt-4">
                <h5 class="font-semibold">Booking Reference ({{ $order->reference_id }})</h5>
            </div>

            <!-- Package Details List (Add the details in your PackageDetailsList component equivalent) -->
            <div class="mt-4 space-y-2">
                <!-- Example Package Details Loop -->
                @foreach($order->orderItems as $item)
                    <div class="flex justify-between">
                        <span class="font-semibold">{{ $item->package->title }}:</span>
                        <span>{{ $item->package->category }}</span>
                    </div>
                @endforeach
            </div>

            <hr class="my-4 border-t-2 border-gray-300">

            <!-- Total Amount -->
            <div class="flex justify-between items-center mt-4">
                <span class="text-xl font-bold">Total</span>
                <span class="text-orange-500 font-bold text-2xl">AED {{ $order->total_amount }}</span>
            </div>
        </div>
    </div>
</div>


  </div>

@endsection