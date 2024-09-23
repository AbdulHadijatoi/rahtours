
@extends('layouts.app')



@section('content')

  <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
  

    <!-- Logo -->
    <div class="mb-6">
        <img src="{{ asset(settings()->logo) }}" alt="Logo" class="mx-auto" style="width: 300px;">
    </div>

    <!-- Error Message -->
    <h4 class="text-2xl font-bold text-orange-500 mb-2">Oops! your payment did not get through</h4>
    <p class="text-lg mb-6">
        We regret to inform you that your payment has been declined. The following might be one of the reasons for the payment decline:
    </p>

    <!-- Accordion -->
    <div class="space-y-2">
        <div class="border border-gray-300 rounded-lg">
            <button class="w-full text-left py-3 px-4 bg-gray-100 hover:bg-gray-200 accordion-button" data-target="#collapse1">
                <div class="flex justify-between items-center">
                    <span>1. Unauthorized Card Country</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>
            <div id="collapse1" class="accordion-content hidden px-4 py-2 bg-white">
                <p>We block IP addresses from this country due to high fraud ratio.</p>
            </div>
        </div>

        <div class="border border-gray-300 rounded-lg">
            <button class="w-full text-left py-3 px-4 bg-gray-100 hover:bg-gray-200 accordion-button" data-target="#collapse2">
                <div class="flex justify-between items-center">
                    <span>2. Unauthorized IP Country</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>
            <div id="collapse2" class="accordion-content hidden px-4 py-2 bg-white">
                <p>We block IP addresses from this country due to high fraud ratio.</p>
            </div>
        </div>

        <div class="border border-gray-300 rounded-lg">
            <button class="w-full text-left py-3 px-4 bg-gray-100 hover:bg-gray-200 accordion-button" data-target="#collapse3">
                <div class="flex justify-between items-center">
                    <span>3. Temporarily Technical Issue</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>
            <div id="collapse3" class="accordion-content hidden px-4 py-2 bg-white">
                <p>We are facing a temporary technical error. Please try again later.</p>
            </div>
        </div>

        <div class="border border-gray-300 rounded-lg">
            <button class="w-full text-left py-3 px-4 bg-gray-100 hover:bg-gray-200 accordion-button" data-target="#collapse4">
                <div class="flex justify-between items-center">
                    <span>4. Authentication Failed</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>
            <div id="collapse4" class="accordion-content hidden px-4 py-2 bg-white">
                <p>It looks like you have entered an invalid card password or CVV number.</p>
            </div>
        </div>

        <div class="border border-gray-300 rounded-lg">
            <button class="w-full text-left py-3 px-4 bg-gray-100 hover:bg-gray-200 accordion-button" data-target="#collapse5">
                <div class="flex justify-between items-center">
                    <span>5. Authorization Declined</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </button>
            <div id="collapse5" class="accordion-content hidden px-4 py-2 bg-white">
                <p>Your card has been blocked by the bank. Please contact your bank for further details.</p>
            </div>
        </div>
    </div>

    <!-- Retry Button -->
    <div class="mt-6">
        <a href="{{ url('/dubai-activities') }}" class="inline-block bg-orange-500 text-white font-bold py-2 px-4 rounded hover:bg-orange-600">
            Try Again
        </a>
    </div>

    <!-- Support Info -->
    <div class="mt-10 text-gray-500">
        <p class="text-sm">For any urgent booking-related issues, please contact us via phone at Dubai +971 52 933 1100 or email us at <a href="mailto:info@rahtours.ae" class="text-orange-500">Rahtours</a>.</p>
        <p class="text-sm mt-4 text-orange-500">Error Code:</p>
    </div>




    
  </div>

@section('scripts')

<script>
    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', function () {
            const content = document.querySelector(this.dataset.target);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        });
    });
</script>

@endsection
@endsection