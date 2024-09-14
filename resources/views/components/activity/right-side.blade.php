

<div>
    <div class="flex justify-end items-center">
        <h2 class="text-lg text-secondary font-semibold">AED 500</h2>
        <a href="#choosePackage" class="btn btn-sm px-4 py-2 bg-secondary2 text-white font-semibold rounded-full ml-3">Select Options</a>
    </div>
    <p class="text-xs text-gray-500 mb-2 w-full text-right">Price varies by vehicles, group sizes and other selections</p>
</div>
<div id="choosePackage" class="bg-white p-6 text-sm rounded-lg border w-full">
    <h2 class="text-lg font-semibold mb-4">Choose a package</h2>
    <div class="border border-secondary2 rounded-lg p-4 mb-6">
        <div class="flex items-start">
            <div class="mr-3 text-orange-500">
                <input type="radio" checked>
            </div>
            <div>
                <h3 class="font-semibold">Private Chauffeur for 10 Hours</h3>
                <p class="text-sm text-gray-500">private</p>
                <p class="text-sm text-gray-500">Private Chauffeur for 10 Hours in Dubai or Abu Dhabi</p>
                <p class="text-lg font-semibold text-gray-700 mt-2">AED 500</p>
                <div class="flex space-x-2 mt-4">
                    <button class="px-4 py-2 bg-secondary2 text-white font-semibold rounded-md">Add To Cart</button>
                    <button class="px-4 py-2 bg-secondary2 text-white font-semibold rounded-md">Book Now</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Date & Activity Option -->
    <h2 class="text-lg font-semibold mb-4">Select Date & Activity Option</h2>
    <div class="mb-6">
        <label for="date" class="block text-sm mb-2">Please select date</label>
        <div class="relative">
            <input type="date" id="date" class="w-full border rounded-md py-2 px-3 date-picker">
        </div>
    </div>

    <button id="selectPersonBtn" class="w-full py-2 bg-gray-200 text-secondary font-semibold rounded-md mb-6">Select Person</button>

    <!-- Person Selection -->
    <div id="personSelection" class="space-y-4 hidden">
        <!-- Group selection for private package -->
        <div class="flex justify-between items-center">
            <span class="font-semibold">Group (AED 500)</span>
            <div class="flex items-center space-x-4">
                <button onclick="decrement('groupCount')" class="text-orange-500 text-2xl font-bold">−</button>
                <span id="groupCount" class="font-semibold text-lg">0</span>
                <button onclick="increment('groupCount')" class="text-orange-500 text-2xl font-bold">+</button>
            </div>
        </div>

        <!-- Uncomment this section if you want to include adult, child, and infant options -->
        <!--
        <div class="flex justify-between items-center">
            <span class="font-semibold">Adult (AED 500)</span>
            <div class="flex items-center space-x-4">
                <button onclick="decrement('adultCount')" class="text-orange-500 text-2xl font-bold">−</button>
                <span id="adultCount" class="font-semibold text-lg">0</span>
                <button onclick="increment('adultCount')" class="text-orange-500 text-2xl font-bold">+</button>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-semibold">Child (AED 400)</span>
            <div class="flex items-center space-x-4">
                <button onclick="decrement('childCount')" class="text-orange-500 text-2xl font-bold">−</button>
                <span id="childCount" class="font-semibold text-lg">0</span>
                <button onclick="increment('childCount')" class="text-orange-500 text-2xl font-bold">+</button>
            </div>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-semibold">Infant</span>
            <div class="flex items-center space-x-4">
                <button onclick="decrement('infantCount')" class="text-orange-500 text-2xl font-bold">−</button>
                <span id="infantCount" class="font-semibold text-lg">0</span>
                <button onclick="increment('infantCount')" class="text-orange-500 text-2xl font-bold">+</button>
            </div>
        </div>
        -->
    </div>

    <div class="flex items-center mt-6 text-secondary text-center font-semibold cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-secondary" style="transform: ;msFilter:;"><path d="M20 7h-1.209A4.92 4.92 0 0 0 19 5.5C19 3.57 17.43 2 15.5 2c-1.622 0-2.705 1.482-3.404 3.085C11.407 3.57 10.269 2 8.5 2 6.57 2 5 3.57 5 5.5c0 .596.079 1.089.209 1.5H4c-1.103 0-2 .897-2 2v2c0 1.103.897 2 2 2v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zm-4.5-3c.827 0 1.5.673 1.5 1.5C17 7 16.374 7 16 7h-2.478c.511-1.576 1.253-3 1.978-3zM7 5.5C7 4.673 7.673 4 8.5 4c.888 0 1.714 1.525 2.198 3H8c-.374 0-1 0-1-1.5zM4 9h7v2H4V9zm2 11v-7h5v7H6zm12 0h-5v-7h5v7zm-5-9V9.085L13.017 9H20l.001 2H13z"></path></svg>
        <span class="ml-2">Give this as a Gift</span>
    </div>
</div>