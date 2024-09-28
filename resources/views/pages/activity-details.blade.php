
@extends('layouts.app')

@section('title')
    {{ $activity->page_title }}
@endsection

@section('content')
    @include('components.breadcrumb')
    <div class="relative">
        {{-- <img src="{{ url('storage/uploads/card1_image.jpeg') }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" /> --}}
        <div class="relative">
            <div class="flex justify-between items-start px-2 md:px-0 items-end mx-auto md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-6">
                <div class="">
                    <h2 class="text-gray-700 text-2xl md:text-3xl font-bold mb-2">
                        {{ $activity->name }}
                    </h2>
                    <div class="flex items-center text-sm">
                        @include('components.rating', ['card_rating'=> $activity->average_rating, 'card_reviews'=> $activity->number_of_reviews])
                        <span class="ml-1">Reviews</span>
                        <span class="ml-10">Operated By: <span class="underline">RAH Tourism</span></span>
                    </div>
                </div>
                @if(isInWishlist($activity->id))
                    <a href="{{ url('remove-from-wishlist/'. $activity->id) }}" class="flex items-center whitespace-nowrap space-x-2 bg-transparent text-gray-800 px-4 py-2 rounded-full hover:bg-white hover:text-black transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" class="h-7 w-7 md:w-5 md:h-5 wishlist-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.93l1.318-1.612a4.5 4.5 0 016.364 6.364l-7.5 7.5a.75.75 0 01-1.06 0l-7.5-7.5a4.5 4.5 0 010-6.364z" />
                        </svg> 
                        <span class="hidden md:block">Added to Wishlist</span>
                    </a>
                @else
                    <a href="{{ url('add-to-wishlist/'. $activity->id) }}" class="flex items-center whitespace-nowrap space-x-2 bg-transparent text-gray-800 px-4 py-2 rounded-full hover:bg-white hover:text-black transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 md:w-5 md:h-5 wishlist-icon">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.93l1.318-1.612a4.5 4.5 0 016.364 6.364l-7.5 7.5a.75.75 0 01-1.06 0l-7.5-7.5a4.5 4.5 0 010-6.364z" />
                        </svg>
                        <span class="hidden md:block">Add to Wishlist</span>
                    </a>
                @endif


            </div>
            
            <div class="relative mx-auto md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[70%_30%] gap-2">
                        <!-- Large Image (70% width) -->
                        <div class="relative w-full h-[400px] md:h-[500px] overflow-hidden rounded-md">
                            <img src="{{ url($activity->activityImages[0]->image_url ?? 'storage/uploads/placeholder_image.png') }}" alt="Large Image" class="w-full h-full object-cover">
                            <!-- Back Button -->
                            <a href="/dubai-activities" class="absolute top-5 left-5 bg-white text-black rounded-full py-2 px-5 shadow">
                                ← Back
                            </a>
                        </div>

                        <!-- Right Column with Two Small Images (30% width) -->
                        <div class="hidden md:flex flex-col gap-2">
                            <!-- Small Image 1 -->
                            <div class="w-full h-[195px] md:h-[245px] overflow-hidden rounded-md">
                                <img src="{{ url($activity->activityImages[1]->image_url ?? 'storage/uploads/placeholder_image.png') }}" alt="Small Image 1" class="w-full h-full object-cover">
                            </div>
                            <!-- Small Image 2 -->
                            <div class="w-full h-[195px] md:h-[245px] overflow-hidden rounded-md">
                                <img src="{{ url($activity->activityImages[2]->image_url ?? 'storage/uploads/placeholder_image.png') }}" alt="Small Image 2" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <!-- See All Photos Button -->
                    <button class="absolute top-5 right-5 bg-white text-secondary rounded-full px-4 py-2 shadow" onclick="photos_dialog.showModal()">
                        See All Photos
                    </button>
                </div>
            </div>
        </div>
    </div>
    

    <div class="container mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl flex items-center justify-start py-3 mx-auto capitalize px-4 md:px-0 flex-wrap">
        <div class="grid grid-cols-1 md:grid-cols-[70%_30%] gap-2">
            <div class="pr-0 md:pr-8 mt-4">
                @include('components.activity.left-side')
            </div>
            <div class="flex flex-col mt-5 md:mt-0">
                @include('components.activity.right-side')
            </div>
        </div>
        @php
            // Initialize variables for rating count
            $totalReviews = $activity->reviews->count();
            $ratingSum = $activity->reviews->sum('rating');
            $averageRating = $totalReviews > 0 ? round($ratingSum / $totalReviews, 1) : 0;

            // Initialize rating distribution
            $starRatings = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];

            // Calculate the count of each rating (1 to 5 stars)
            foreach ($activity->reviews as $review) {
                $starRatings[$review->rating]++;
            }

            // Calculate percentage for each rating
            foreach ($starRatings as $stars => $count) {
                $starRatings[$stars] = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0;
            }
        @endphp

        <div class="w-full mt-8">
            <h2 class="text-lg md:text-xl mb-3">
                {{ $activity->name }} Reviews
            </h2>
            <hr>

            <div class="flex justify-between items-center">
                <div>
                    <div class="flex items-center mt-2">
                        <div class="text-secondary text-2xl mr-2">
                            <!-- Average Rating Display -->
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($averageRating))
                                    ★
                                @elseif ($i == ceil($averageRating) && $averageRating % 1 != 0)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600">
                            Based on {{ $totalReviews }} reviews ({{ $averageRating }} / 5)
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row mt-6">
                <!-- Ratings Distribution Section -->
                <div class="w-full md:w-1/3">
                    @foreach ($starRatings as $stars => $percentage)
                        <div class="flex items-center mb-2">
                            <div class="text-secondary whitespace-nowrap">
                                <!-- Display Star Text based on star count -->
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $stars)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <div class="w-full bg-gray-200 h-2 ml-2">
                                <div class="text-secondary h-2" style="width: {{ $percentage }}%;"></div>
                            </div>
                            <span class="ml-2 text-gray-600">{{ $percentage }}%</span>
                        </div>
                    @endforeach
                </div>

                <div class="w-full md:w-2/3 max-h-[25rem] overflow-scroll">
                    <div class="space-y-6 px-4">
                        <!-- Loop through the reviews -->
                        @foreach ($activity->reviews as $review)
                            <div class="flex pb-5 @if (!$loop->last) border-b @endif">

                                <!-- Profile Image with fallback -->
                               @if($review->user->profile_image_url && \Storage::disk('public')->exists($review->user->profile_image_url))
                                    <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url($review->user->profile_image_url) }}" alt="{{ $review->user->first_name }} {{ $review->user->last_name }}">
                                @else
                                    <div class="w-8 h-8 rounded-full object-cover mr-4">
                                        <svg class="min-w-full min-h-full" viewBox="0 0 1024 1024" class="icon mr-3" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M691.573 338.89c-1.282 109.275-89.055 197.047-198.33 198.331-109.292 1.282-197.065-90.984-198.325-198.331-0.809-68.918-107.758-68.998-106.948 0 1.968 167.591 137.681 303.31 305.272 305.278C660.85 646.136 796.587 503.52 798.521 338.89c0.811-68.998-106.136-68.918-106.948 0z" fill="#4A5699" />
                                            <path d="M294.918 325.158c1.283-109.272 89.051-197.047 198.325-198.33 109.292-1.283 197.068 90.983 198.33 198.33 0.812 68.919 107.759 68.998 106.948 0C796.555 157.567 660.839 21.842 493.243 19.88c-167.604-1.963-303.341 140.65-305.272 305.278-0.811 68.998 106.139 68.919 106.947 0z" fill="#C45FA0" />
                                            <path d="M222.324 959.994c0.65-74.688 29.145-144.534 80.868-197.979 53.219-54.995 126.117-84.134 201.904-84.794 74.199-0.646 145.202 29.791 197.979 80.867 54.995 53.219 84.13 126.119 84.79 201.905 0.603 68.932 107.549 68.99 106.947 0-1.857-213.527-176.184-387.865-389.716-389.721-213.551-1.854-387.885 178.986-389.721 389.721-0.601 68.991 106.349 68.933 106.949 0.001z" fill="#E5594F" />
                                        </svg>
                                    </div>
                                @endif

                                <div>
                                    <h4 class="font-semibold">{{ $review->user->first_name }} {{ $review->user->last_name }}</h4>
                                    <!-- Display Star Rating -->
                                    <div class="text-secondary">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="mt-2 text-gray-600">{{ $review->comment }}</p>
                                    <p class="text-xs text-gray-500">{{ $review->created_at->format('F j, Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="container flex-col mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl flex items-center justify-start py-3 mx-auto capitalize px-4 md:px-0 mt-3">
        <h2 class="mx-auto text-xl md:text-3xl mb-5 mt-14">
            Experience & Activities for you
        </h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @if(!empty(getRandomActivities(4)))
                @foreach (getRandomActivities(4) as $randomActivity)
                    @include('components.card', [
                        'card_link' => 'dubai-activities/'. $randomActivity->category->slug . '/' . $randomActivity->slug,
                        'card_image' => $randomActivity->image_url,
                        'card_title' => $randomActivity->name, 
                        'card_rating' => $randomActivity->average_rating,
                        'card_reviews' => $randomActivity->number_of_reviews,
                        'card_price' => $randomActivity,
                    ])
                @endforeach
            @endif
        </div>
        <a href="/dubai-activities" class="btn btn-outline btn-sm border-gray-500 text-gray-500 mx-auto mt-5">Show More</a>

    </div>

    @include('components.photos-dialog',['photos'=>$activity->activityImages]);
@endsection

@section('scripts')
<script>
    // Function to toggle between private and sharing package count sections
    function handlePackageChange(radio) {
        const packageType = radio.getAttribute('data-package-type');
        const groupCountSection = document.getElementById('groupCountSection');
        const adultChildCountSection = document.getElementById('adultChildCountSection');

        if (packageType === 'private') {
            groupCountSection.classList.remove('hidden');
            adultChildCountSection.classList.add('hidden');
        } else {
            groupCountSection.classList.add('hidden');
            adultChildCountSection.classList.remove('hidden');
        }
    }
    
    // Function to toggle between private and sharing package count sections
    function showOptions() {
        const packageType = radio.getAttribute('data-package-type');
        const groupCountSection = document.getElementById('groupCountSection');
        const adultChildCountSection = document.getElementById('adultChildCountSection');

        if (packageType === 'private') {
            groupCountSection.classList.remove('hidden');
            adultChildCountSection.classList.add('hidden');
        } else {
            groupCountSection.classList.add('hidden');
            adultChildCountSection.classList.remove('hidden');
        }
    }

    // Function to increment the count
    function increment(id, price) {
        let countElement = document.getElementById(id);
        let count = parseInt(countElement.innerText);
        count += 1;
        countElement.innerText = count;
        updatePrice(price);
    }

    // Function to decrement the count with a minimum value of 0
    function decrement(id, price) {
        let countElement = document.getElementById(id);
        let count = parseInt(countElement.innerText);
        if (count > 0) {
            count -= 1;
            countElement.innerText = count;
            updatePrice(-price);
        }
    }

    // Update the total price based on selected package
    function updatePrice(change) {
        const selectedPackage = document.querySelector('[name="selectedPackage"]:checked');
        
        // Check if a package is selected
        if (selectedPackage) {
            const packageKey = selectedPackage.getAttribute('data-key');
            const totalPriceElement = document.getElementById(`totalPrice${packageKey}`);
            
            // Check if the price element exists
            if (totalPriceElement) {
                let totalPrice = parseFloat(totalPriceElement.innerText);
                totalPrice += change;
                totalPriceElement.innerText = totalPrice.toFixed(2);
            } else {
                console.error('Price element not found.');
            }
        } else {
            console.error('No package selected.');
        }
    }


    // Set today's date in date picker
    const today = new Date().toISOString().split('T')[0];
    document.getElementById("date").setAttribute("min", today);

    function selectPackage(element) {
        const radioInput = element.querySelector('input[type="radio"]');
        
        if (radioInput) {
            radioInput.checked = true;
            // Trigger the change event in case there is additional logic tied to it
            radioInput.dispatchEvent(new Event('change'));
        }
    }

    // here write the logic for storing the activities in local storage
</script>



@endsection