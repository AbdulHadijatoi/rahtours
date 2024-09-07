<div class="relative mx-auto">
    <img src="{{ url(getHeroImage()) }}" class="absolute inset-0 object-cover w-full h-full" alt="hero_image" />
    <div class="relative bg-gray-900 bg-opacity-75">
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-between xl:flex-row sm:min-h-[25rem] md:min-h-[35rem]">
            <div class="w-full max-w-xl mb-12 xl:mb-0 xl:pr-16 xl:w-7/12">
                <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                    {{ settings()->hero_title }}
                </h2>
                <p class="max-w-xl mb-4 text-base text-gray-400 md:text-lg">
                    {{ settings()->hero_text }}
                </p>
                <a href="#" aria-label="" class="bg-white text-gray-800 rounded-md px-5 h-11 inline-flex items-center tracking-wider transition-colors duration-200 hover-text-secondary">
                    {{ settings()->hero_btn_text }}
                </a>
            </div>
            <div class="w-full max-w-xl xl:px-8 xl:w-5/12">
                @include('components.hero-form')
            </div>
        </div>
        </div>
    </div>
</div>