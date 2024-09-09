<div class="relative mx-auto">
    <img src="{{ url(settings()->hero_image) }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" />
    <div class="relative">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-start xl:flex-row sm:min-h-[12rem] md:min-h-[15rem]">
            <div class="w-full mb-12 xl:mb-0 xl:pr-16">
                <h2 class="mb-4 font-sans text-3xl text-center md:text-left font-bold tracking-tight text-white sm:text-5xl sm:leading-none">
                    {{ settings()->hero_title }}
                </h2>
                <p class="w-5/6 mb-4 text-base text-white md:text-xl text-center md:text-left m-auto md:m-0">
                    {{ settings()->hero_text }}
                </p>

                <div class="flex items-center bg-gray-100 rounded-xl shadow-inner pl-4 pr-1 py-1 h-13 w-full md:w-3/4 mt-3">
                    <svg class="w-8 h-8 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17.65 10.3a7.35 7.35 0 11-14.7 0 7.35 7.35 0 0114.7 0z"/>
                    </svg>
                    <input class="ml-2 w-full bg-transparent outline-none border-none focus:outline-none focus:ring-0 text-md md:text-lg" type="text" placeholder="Search your activities or destinations">
                    <button class="btn rounded-lg btn-accent px-10 text-white text-lg" style="background-color: #ee8e3b">Search</button>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>