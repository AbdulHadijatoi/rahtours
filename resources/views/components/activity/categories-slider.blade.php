<div class="relative flex items-center justify-between mx-1 my-5 md:m-10">
    <!-- Left arrow -->
    <button id="scrollLeft" class="absolute left-0 z-10 bg-white rounded-full p-2 bg-yellow-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <!-- Slider container -->
    <div id="slider" class="flex flex-row overflow-x-scroll scroll-smooth hide-scrollbar mx-14">
        @foreach (getCategories() as $category)
            @include('components.activity.categories-slider-item')
        @endforeach
    </div>

    <!-- Right arrow -->
    <button id="scrollRight" class="absolute right-0 z-10 bg-white rounded-full p-2 bg-yellow-50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>