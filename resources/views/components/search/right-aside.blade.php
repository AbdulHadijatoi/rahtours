<div class="flex justify-between flex-col md:flex-row mb-5">
    <div class="flex items-center">
        <h1 class="font-semibold">Tours Search Result</h1>
    </div>
    <div class="flex items-center justify-between md:justify-end">
        <div class="dropdown relative">
            <!-- Button where the selected value will appear -->
            <div id="dropdownButton" tabindex="0" role="button" class="btn m-1 rounded border bg-white text-gray-500 w-[12rem]">
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

<div class="grid grid-cols-1 gap-4">
    {{-- Loop through search results --}}
    @if(!empty($activities) && $activities->count() > 0)
        @foreach ($activities as $activity)
            <div class="bg-white shadow-md rounded-md overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <a href="{{ url('dubai-activities/'. $activity->category->slug . '/' . $activity->slug) }}" class="col-span-1">
                        {{-- Activity image --}}
                        <img src="{{ url($activity->image_url) }}" alt="{{ $activity->name }}" class="w-full h-full object-cover">
                    </a>
                    <div class="col-span-2 p-4">
                        {{-- Activity details --}}
                        <a href="{{ url('dubai-activities/'. $activity->category->slug . '/' . $activity->slug) }}" class="text-lg font-semibold">{{ $activity->name }}</a>
                        <div class="flex items-center my-2">
                            @include('components.rating', ['card_rating'=> $activity->average_rating, 'card_reviews'=> $activity->number_of_reviews])
                        </div>
                        <p class="text-sm text-gray-700">{{ Str::limit(strip_tags($activity->description), 70) }}</p>
                        <div class="flex justify-between mt-4">
                            <p class="text-sm text-gray-500">Duration: {{ $activity->duration }} hours</p>
                            
                            @if($activity->packages[0]->category == "private")
                                @if($activity->discount_offer > 0)
                                    {{-- <h2 class="text-lg text-gray-500 font-semibold line-through">From <span class="line-through">AED <span id="activityPrice">{{ $activity->packages[0]->price }}</span></span></h2> --}}
                                    <h2 class="text-lg text-secondary mr-2 font-semibold">AED <span>{{ getDiscountPrice($activity, 'private') }}</span></h2>
                                @else
                                    <h2 class="text-lg text-secondary font-semibold">AED <span>{{ $activity->packages[0]->price }}</span></h2>
                                @endif
                            @else
                                @if($activity->discount_offer > 0)
                                    {{-- <h2 class="text-lg text-gray-500 font-semibold">From <span class="line-through">AED <span id="activityPrice">{{ $activity->packages[0]->adult_price }}</span></span></h2> --}}
                                    <h2 class="text-lg text-secondary mr-2 font-semibold">AED <span>{{ getDiscountPrice($activity) }}</span></h2>
                                @else
                                    <h2 class="text-lg text-secondary font-semibold">AED <span>{{ $activity->packages[0]->adult_price }}</span></h2>
                                @endif
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <p class="text-lg font-semibold text-secondary">Cancellation before: {{ $activity->cancellation_duration }} hours</p>
                            @if(isInWishlist($activity->id))
                                <a href="{{ url('remove-from-wishlist/'. $activity->id) }}" class="flex items-center whitespace-nowrap space-x-2 bg-transparent text-gray-800 px-4 py-2 rounded-full hover:bg-white hover:text-black transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" class="h-7 w-7 md:w-5 md:h-5 wishlist-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.93l1.318-1.612a4.5 4.5 0 016.364 6.364l-7.5 7.5a.75.75 0 01-1.06 0l-7.5-7.5a4.5 4.5 0 010-6.364z" />
                                    </svg> 
                                </a>
                            @else
                                <a href="{{ url('add-to-wishlist/'. $activity->id) }}" class="flex items-center whitespace-nowrap space-x-2 bg-transparent text-gray-800 px-4 py-2 rounded-full hover:bg-white hover:text-black transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 md:w-5 md:h-5 wishlist-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.93l1.318-1.612a4.5 4.5 0 016.364 6.364l-7.5 7.5a.75.75 0 01-1.06 0l-7.5-7.5a4.5 4.5 0 010-6.364z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex justify-center items-center flex-col md:flex-row">
          <div class="flex flex-col items-center">
            <h2 class="text-3xl font-extrabold">No result</h2>
            <a href="{{ url('/dubai-activities') }}" class="btn rounded mt-10">Find things to do</a>
          </div>
        </div>
    @endif

</div>