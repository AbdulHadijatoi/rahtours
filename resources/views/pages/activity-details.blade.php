@extends('layouts.app')



@section('content')
    <div class="relative">
        {{-- <img src="{{ url('storage/uploads/card1_image.jpeg') }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" /> --}}
        <div class="relative pt-3">
            <div class="flex justify-between items-start px-2 md:px-0 items-end mx-auto md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-5">
                <div class="">
                    <h2 class="text-2xl md:text-4xl">
                        {{ $activity->name }}
                    </h2>
                    <div class="flex items-center text-sm">
                        @include('components.rating', ['card_rating'=> $activity->average_rating, 'card_reviews'=> $activity->number_of_reviews])
                        <span class="ml-1">Reviews</span>
                        <span class="ml-10">Operated By: <span class="underline">RAH Tourism</span></span>
                    </div>
                </div>
                <button class="flex items-center whitespace-nowrap space-x-2 bg-transparent text-gray-800 px-4 py-2 rounded-full hover:bg-white hover:text-black transition-colors duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 md:w-5 md:h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.93l1.318-1.612a4.5 4.5 0 016.364 6.364l-7.5 7.5a.75.75 0 01-1.06 0l-7.5-7.5a4.5 4.5 0 010-6.364z" />
                    </svg>
                    <span class="hidden md:block">Add to Wishlist</span>
                </button>
            </div>
            
            <div class="relative mx-auto md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-[70%_30%] gap-2">
                        <!-- Large Image (70% width) -->
                        <div class="relative w-full h-[400px] md:h-[600px] overflow-hidden rounded-md">
                            <img src="{{ url($activity->activityImages[0]->image_url) }}" alt="Large Image" class="w-full h-full object-cover">
                            <!-- Back Button -->
                            <button class="absolute top-5 left-5 bg-white text-black rounded-full py-2 px-5 shadow" 
                                onclick="window.location.href = '/';">
                                ← Back
                            </button>

                        </div>

                        <!-- Right Column with Two Small Images (30% width) -->
                        <div class="hidden md:flex flex-col gap-2">
                            <!-- Small Image 1 -->
                            <div class="w-full h-[195px] md:h-[295px] overflow-hidden rounded-md">
                                <img src="{{ url($activity->activityImages[1]->image_url) }}" alt="Small Image 1" class="w-full h-full object-cover">
                            </div>
                            <!-- Small Image 2 -->
                            <div class="w-full h-[195px] md:h-[295px] overflow-hidden rounded-md">
                                <img src="{{ url($activity->activityImages[2]->image_url) }}" alt="Small Image 2" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                    <!-- See All Photos Button -->
                    <button class="absolute top-5 right-5 bg-white text-orange-500 rounded-full px-4 py-2 shadow" onclick="photos_dialog.showModal()">
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
        <div class="w-full mt-8">
            <h2 class="text-lg md:text-xl mb-3">
                {{ $activity->name }} Reviews
            </h2>
            <hr>


            <div class="flex justify-between items-center">
                <div>
                    <div class="flex items-center mt-2">
                        <div class="text-secondary text-2xl mr-2">★★★★☆</div>
                        <span class="text-gray-600">Based on 1624 reviews</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row mt-6">
                <div class="w-full md:w-1/3">
                    <div class="flex items-center mb-2">
                        <div class="text-secondary">★★★★★</div>
                        <div class="w-full bg-gray-200 h-2 ml-2">
                            <div class="text-secondary h-2" style="width: 63%;"></div>
                        </div>
                        <span class="ml-2 text-gray-600">63%</span>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="text-secondary">★★★★☆</div>
                        <div class="w-full bg-gray-200 h-2 ml-2">
                            <div class="text-secondary h-2" style="width: 10%;"></div>
                        </div>
                        <span class="ml-2 text-gray-600">10%</span>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="text-secondary">★★★☆☆</div>
                        <div class="w-full bg-gray-200 h-2 ml-2">
                            <div class="text-secondary h-2" style="width: 6%;"></div>
                        </div>
                        <span class="ml-2 text-gray-600">6%</span>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="text-secondary">★★☆☆☆</div>
                        <div class="w-full bg-gray-200 h-2 ml-2">
                            <div class="text-secondary h-2" style="width: 12%;"></div>
                        </div>
                        <span class="ml-2 text-gray-600">12%</span>
                    </div>

                    <div class="flex items-center mb-2">
                        <div class="text-secondary">★☆☆☆☆</div>
                        <div class="w-full bg-gray-200 h-2 ml-2">
                            <div class="text-secondary h-2" style="width: 9%;"></div>
                        </div>
                        <span class="ml-2 text-gray-600">9%</span>
                    </div>
                </div>

                <div class="w-full md:w-2/3 max-h-[25rem] overflow-scroll">
                    <div class="space-y-6 px-4">
                        <!-- Review 1 -->
                        <div class="flex pb-5 border-b">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('storage/uploads/card1_image.jpeg') }}" alt="Emily Selman">
                            <div>
                                <h4 class="font-semibold">Emily Selman</h4>
                                <div class="text-secondary">★★★★★</div>
                                <p class="mt-2 text-gray-600">This is the bag of my dreams. I took it on my last vacation and was able to fit an absurd amount of snacks for the many long and hungry flights.</p>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="flex pb-5 border-b">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('storage/uploads/card1_image.jpeg') }}" alt="Hector Gibbons">
                            <div>
                                <h4 class="font-semibold">Hector Gibbons</h4>
                                <div class="text-secondary">★★★★★</div>
                                <p class="mt-2 text-gray-600">Before getting the Ruck Snack, I struggled my whole life with pulverized snacks, endless crumbs, and other heartbreaking snack catastrophes. Now, I can stow my snacks with confidence and style!</p>
                            </div>
                        </div>

                        <!-- Review 3 -->
                        <div class="flex pb-5 border-b">
                            <img class="w-12 h-12 rounded-full object-cover mr-4" src="{{ url('storage/uploads/card1_image.jpeg') }}" alt="Mark Edwards">
                            <div>
                                <h4 class="font-semibold">Mark Edwards</h4>
                                <div class="text-secondary">★★★★☆</div>
                                <p class="mt-2 text-gray-600">I love how versatile this bag is. It can hold anything ranging from cookies that come in trays to cookies that come in tins.</p>
                            </div>
                        </div>
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
            @include('components.card', [
                'card_link' => 'dubai-activities/activity1',
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
        </div>
        <button class="btn btn-outline btn-sm border-gray-500 text-gray-500 mx-auto mt-5">Show More</button>

    </div>

    @include('components.photos-dialog');
    
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
</script>

@endsection