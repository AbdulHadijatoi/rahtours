<div class="relative">

    <div class="relative bg-secondary3">
        {{-- @include('components.breadcrumb', ['text_color'=>'text-white']) --}}
        <form class="px-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8" action="{{ route('getHelp') }}" method="GET">
            <div class="flex flex-col items-center justify-center xl:flex-row min-h-[15rem]">
                <div class="w-full mb-12 xl:mb-0 xl:pr-16 text-center">
                    <h1 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                        How can we help you?
                    </h1>
                    <div class="flex flex-col items-center md:justify-center md:flex-row mx-auto">
                        <input name="email" class="input border-none rounded-sm w-[20rem] mr-1" placeholder="Email" />
                        <input name="reference_id" class="input border-none rounded-sm w-[20rem] mr-1 mt-2 md:mt-0" placeholder="Booking Reference Number" />
                        <button type="submit" class="btn bg-white rounded-sm mt-2 md:mt-0 w-[20rem]">Get Help</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>