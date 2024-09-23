
@extends('layouts.app')



@section('content')
  @include('components.hero-common')
  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
     <!-- Terms and Conditions Content Section -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-yellow-500 mb-4">{{ $data->title }}</h2>

        <!-- Introductory Text -->
        <p class="text-gray-700 text-sm mb-4">
            Thank you for choosing our tour packages. By booking a trip through our website, you're deemed to have agreed to its terms of use.
        </p>

        <!-- Price Section -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-black mb-2">1. Price, Payment, and Voucher Issue</h3>

            <!-- Prices -->
            <h4 class="text-lg font-semibold text-black mb-1">A. Prices</h4>
            <p class="text-gray-700 text-sm mb-2">
                Price quotations are subject to change without notice.
            </p>

            <!-- Payments -->
            <h4 class="text-lg font-semibold text-black mb-1">B. Payments</h4>
            <p class="text-gray-700 text-sm mb-2">
                All tours/services must be pre-paid unless otherwise stated. We accept Visa, MasterCard, and American Express.
            </p>

            <!-- Voucher Issue -->
            <h4 class="text-lg font-semibold text-black mb-1">C. Voucher Issue</h4>
            <p class="text-gray-700 text-sm mb-2">
                After payment, we will send a confirmation/voucher by email.
            </p>
        </div>

        <!-- Cancellations Section -->
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-black mb-2">2. Cancellations, Refund, and Procedure to Cancel a Booking</h3>

            <!-- Cancellations -->
            <h4 class="text-lg font-semibold text-black mb-1">A. Cancellation Fee/Refund</h4>
            <p class="text-gray-700 text-sm mb-2">
                Every tour activity/attraction has its own cancellation policies.
            </p>

            <!-- No Show -->
            <h4 class="text-lg font-semibold text-black mb-1">B. No Show</h4>
            <p class="text-gray-700 text-sm mb-2">
                If you fail to show up for the tour, no refunds in part or full will be provided.
            </p>

            <!-- Modification of Terms -->
            <h4 class="text-lg font-semibold text-black mb-1">C. Modification of Terms</h4>
            <p class="text-gray-700 text-sm mb-2">
                Services covered in your package are subject to change based on local/weather conditions.
            </p>
        </div>
    </div>
  </div>

@endsection