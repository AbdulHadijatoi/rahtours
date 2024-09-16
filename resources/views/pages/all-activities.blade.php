@extends('layouts.app')



@section('content')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-10">
        
        @include('components.activity.categories-slider')
        
        <div class="flex justify-between flex-col md:flex-row mb-5">
            <div class="flex items-center">
                <div class="w-7">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1,.cls-2{fill:none;stroke:#ee8e3b;stroke-linecap:round;stroke-linejoin:round;stroke-width:1.5px;}.cls-2{fill-rule:evenodd;}</style> </defs> <g id="ic-places-mosque"> <path class="cls-1" d="M12,13h0a6,6,0,0,1,6,6v3a0,0,0,0,1,0,0H6a0,0,0,0,1,0,0V19A6,6,0,0,1,12,13Z"></path> <path class="cls-2" d="M7.31,15.26V12.69A4.69,4.69,0,0,1,12,8h0a4.69,4.69,0,0,1,4.69,4.69v2.57"></path> <path class="cls-2" d="M8,10.24C8,7.65,9.79,5,12,5h0c2.21,0,4,2.65,4,5.24"></path> <line class="cls-1" x1="12" y1="2" x2="12" y2="5"></line> <path class="cls-1" d="M10,22V18a2,2,0,0,1,2-2h0a2,2,0,0,1,2,2v4"></path> </g> </g></svg>
                </div>
                <h1>Dubai Activities</h1>
            </div>
            <div class="flex items-center justify-between md:justify-end">
                <span class="mr-3">Sort result by</span>

                <div class="dropdown relative">
                    <!-- Button where the selected value will appear -->
                    <div id="dropdownButton" tabindex="0" role="button" class="btn m-1 rounded border bg-white text-gray-500 w-[15rem]">
                        Recommended
                    </div>

                    <!-- Dropdown menu -->
                    <ul id="dropdownMenu" tabindex="0" class="dropdown-content menu bg-base-100 rounded-sm z-[1] w-52 border absolute hidden">
                        <li><a class="dropdown-item">Recommended</a></li>
                        <li><a class="dropdown-item">A - Z</a></li>
                        <li><a class="dropdown-item">Z - A</a></li>
                        <li><a class="dropdown-item">Low to high price</a></li>
                        <li><a class="dropdown-item">High to Low price</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @if(!empty($activities))
                @foreach ($activities as $activity)
                    @include('components.card', [
                        'card_link' => 'dubai-activities/'. $activity->category->slug . '/' . $activity->slug,
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
    
@endsection

@section('styles')
    <style>
        /* Hide scrollbar for all devices and platforms */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            scrollbar-width: none;     /* Firefox */
        }
    </style>
@endsection
@section('scripts')
    <script>
        const slider = document.getElementById('slider');
        const scrollLeftButton = document.getElementById('scrollLeft');
        const scrollRightButton = document.getElementById('scrollRight');

        // Adjust scroll distance for visibility
        const scrollAmount = 300;

        scrollLeftButton.addEventListener('click', () => {
            slider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });

        scrollRightButton.addEventListener('click', () => {
            slider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });



        // Grab the button, dropdown items, and dropdown menu
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle the dropdown visibility on button click
        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Add a click event listener to each dropdown item
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                // Set the button text to the selected item
                dropdownButton.textContent = this.textContent;

                // Hide the dropdown menu after selection
                dropdownMenu.classList.add('hidden');

                // Optional: You can add additional logic here for sorting or filtering the results
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

    </script>
@endsection