<div class="relative">

    @include('components.breadcrumb')
    <div class="relative bg-secondary3 bg-cover bg-center" style="background-image: url('{{ url($page_banner_image??'storage/uploads/common_section_bg.jpg') }}')">
        <div class="px-4 py-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
            <div class="flex flex-col items-center justify-center xl:flex-row">
                <div class="w-full mb-12 xl:mb-0 xl:pr-16 text-center">
                    <h1 class="font-sans text-3xl font-bold tracking-tight text-white sm:text-3xl sm:leading-none" style="text-shadow: 0px 0px 4px rgba(0, 0, 0, 0.6);">
                        {{ getPageName() }}
                    </h1>

                    {{-- <p class="w-5/6 mb-4 text-base text-white text-lg text-center md:text-left m-auto md:m-0">
                        {{ settings()->hero_text }}
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</div>