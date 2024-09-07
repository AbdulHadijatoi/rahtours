{{-- <div class="bg-white rounded shadow-2xl p-7 sm:p-10">
    <h3 class="mb-4 text-xl font-semibold sm:text-center sm:mb-6 sm:text-2xl">
    Sign up for updates
    </h3>
    <form>
    <div class="mb-1 sm:mb-2">
        <label for="firstName" class="inline-block mb-1 font-medium">First name</label>
        <input
        placeholder="John"
        required=""
        type="text"
        class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
        id="firstName"
        name="firstName"
        />
    </div>
    <div class="mb-1 sm:mb-2">
        <label for="lastName" class="inline-block mb-1 font-medium">Last name</label>
        <input
        placeholder="Doe"
        required=""
        type="text"
        class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
        id="lastName"
        name="lastName"
        />
    </div>
    <div class="mb-1 sm:mb-2">
        <label for="email" class="inline-block mb-1 font-medium">E-mail</label>
        <input
        placeholder="john.doe@example.org"
        required=""
        type="text"
        class="flex-grow w-full h-12 px-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded shadow-sm appearance-none focus:border-deep-purple-accent-400 focus:outline-none focus:shadow-outline"
        id="email"
        name="email"
        />
    </div>
    <div class="mt-4 mb-2 sm:mb-4">
        <button
        type="submit"
        class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
        >
        Subscribe
        </button>
    </div>
    <p class="text-xs text-gray-600 sm:text-sm">
        We respect your privacy. Unsubscribe at any time.
    </p>
    </form>
</div> --}}

<div class="max-w-2xl mx-auto bg-white rounded-md px-4 py-2">
    
    <div class="border-b mb-2">
        <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
            {{-- <li class="mr-2" role="presentation">
                <button class="inline-block text-sm text-gray-700 hover:text-gray-800 hover:border-blue-950 active:border-blue-950 active:text-blue-950 rounded-t-lg p-4 text-center border-transparent border-b-2 active" id="tracking-tab" data-tabs-target="#tracking" type="button" role="tab" aria-controls="tracking" aria-selected="true">
                    Tracking
                </button>
            </li> --}}
            <li class="mr-2" role="presentation">
                <button class="inline-block text-sm text-gray-700 hover:text-gray-800 hover:border-blue-950 active:border-blue-950 active:text-blue-950 rounded-t-lg p-4 text-center border-transparent border-b-2 active"
                    id="schedule-tab" data-tabs-target="#schedule" type="button" role="tab" aria-controls="schedule" aria-selected="true">
                    Schedule
                </button>
            </li>
            {{-- <li role="presentation">
                <button class="inline-block text-sm text-gray-700 hover:text-gray-800 hover:border-blue-950 active:border-blue-950 active:text-blue-950 rounded-t-lg p-4 text-center border-transparent border-b-2"
                    id="locations-tab" data-tabs-target="#locations" type="button" role="tab" aria-controls="locations" aria-selected="false">
                    Contacts
                </button>
            </li> --}}
        </ul>
    </div>

    <div id="myTabContent">
        {{-- <div class="px-4 py-2 rounded-lg" id="tracking" role="tabpanel" aria-labelledby="tracking-tab">
            <label for="tracking_code" class="inline-block mb-2">B/L or container number</label>
            <div class="relative w-full d-flex align-items-center">
                <i class='bx bx-map absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                <input id="tracking_code" name="tracking_code" placeholder="B/L or container number" required type="text" 
                    class="w-full h-12 pl-10 pr-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"/>
            </div>

            <button type="button" class="inline-flex items-center justify-center h-10 px-6 font-medium tracking-wide transition duration-200 rounded bg-blue-950 hover:bg-blue-900 text-white">
                Track
            </button>
        </div> --}}
        <div class="px-4 py-2 rounded-lg" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
            
            <label for="origin" class="inline-block mb-2">From</label>
            <div class="relative w-full d-flex align-items-center">
                <i class='bx bx-map-alt absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                <input id="origin" name="origin" placeholder="Origin" required type="text" 
                    class="w-full h-12 pl-10 pr-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"/>
            </div>
            
            <label for="destination" class="inline-block mb-2">To</label>
            <div class="relative w-full d-flex align-items-center">
                <i class='bx bx-map absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                <input id="destination" name="destination" placeholder="destination" required type="text" 
                    class="w-full h-12 pl-10 pr-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"/>
            </div>

            <button type="button" class="inline-flex items-center justify-center h-10 px-6 font-medium tracking-wide transition duration-200 rounded bg-blue-950 hover:bg-blue-900 text-white">
                Track
            </button>
        </div>
        {{-- <div class="p-4 rounded-lg hidden" id="locations" role="tabpanel" aria-labelledby="locations-tab">
            <label for="search_location" class="inline-block mb-2">Search a location</label>
            <div class="relative w-full d-flex align-items-center">
                <i class='bx bx-search absolute inset-y-0 left-0 mt-4 pl-3 text-gray-400 text-md'></i>
                <input id="search_location" name="search_location" placeholder="Search a location" required type="text" 
                    class="w-full h-12 pl-10 pr-4 mb-2 transition duration-200 bg-white border border-gray-300 rounded appearance-none focus:border-red-950 focus:outline-none focus:shadow-outline"/>
            </div>
        </div> --}}
    </div>
</div>