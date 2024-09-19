<div>
    <div class="flex justify-end items-center">
        @if($activity->packages[0]->category == "private")
            @if($activity->discount_offer > 0)
                <h2 class="text-lg text-gray-500 mr-2 font-semibold line-through">From <span class="line-through">AED <span id="activityPrice">{{ $activity->packages[0]->price }}</span></span></h2>
                <h2 class="text-lg text-secondary mr-2 font-semibold">AED <span>{{ getDiscountPrice($activity, 'private') }}</span></h2>
            @else
                <h2 class="text-lg text-secondary font-semibold">AED <span>{{ $activity->packages[0]->price }}</span></h2>
            @endif
        @else
            @if($activity->discount_offer > 0)
                <h2 class="text-lg text-gray-500 mr-2 font-semibold">From <span class="line-through">AED <span id="activityPrice">{{ $activity->packages[0]->adult_price }}</span></span></h2>
                <h2 class="text-lg text-secondary mr-2 font-semibold">AED <span>{{ getDiscountPrice($activity) }}</span></h2>
            @else
                <h2 class="text-lg text-secondary font-semibold">AED <span>{{ $activity->packages[0]->adult_price }}</span></h2>
            @endif
        @endif
        <a href="#choosePackage" class="btn btn-sm px-4 py-2 bg-secondary2 text-white font-semibold rounded-full ml-3">Select Options</a>
    </div>
    <p class="text-xs text-gray-500 mb-2 w-full text-right">Price varies by vehicles, group sizes and other selections</p>
</div>
<div id="choosePackage" class="bg-white p-6 text-sm rounded-lg border w-full">
    <h2 class="text-lg font-semibold mb-4">Choose a package</h2>
    @php
        $privatePkgPrice = 0;
        $peoplePerGroup = 0;
        $sharingAdultPrice = 0;
        $sharingChildPrice = 0;
        $sharingChildPrice = 0;
    @endphp
    @foreach ($activity->packages as $key => $package)
        <div class="border border-secondary2 rounded-lg p-4 mb-6" onclick="selectPackage(this)">
            <div class="flex items-start">
                <div class="mr-3 text-secondary">
                    <input class="checked:bg-[#ee8e3b] border-gray-200 checked:border-none focus:border-none" type="radio" name="selectedPackage" data-package-type="{{ $package->category }}" data-key="{{ $key }}" onchange="handlePackageChange(this)">
                </div>
                <div>
                    <h3 class="font-semibold">{{ $package->title }}</h3>
                    <p class="text-sm text-gray-500">{{ $package->category }}</p>
                    <p class="text-sm text-gray-500">{!! $package->highlight !!}</p>
                    @if($package->category == "private")
                    @php
                        $privatePkgPrice = $activity->discount_offer > 0 ? $package->price - (($activity->discount_offer * $package->price) / 100) : $package->price;
                        $peoplePerGroup = $package->group_size;
                    @endphp
                        <p class="text-lg font-semibold text-gray-700 mt-2">AED <span id="totalPrice{{ $key }}">{{ $privatePkgPrice }}</span></p>
                    @else
                    @php
                        $sharingAdultPrice = $activity->discount_offer > 0 ? $package->adult_price - (($activity->discount_offer * $package->adult_price) / 100) : $package->adult_price;
                        $sharingChildPrice = $activity->discount_offer > 0 ? $package->child_price - (($activity->discount_offer * $package->child_price) / 100) : $package->child_price;
                    @endphp
                        <p class="text-lg font-semibold text-gray-700 mt-2">AED <span id="totalPrice{{ $key }}">{{ $sharingAdultPrice }}</span></p>
                    @endif
                    <div class="flex space-x-2 mt-4">
                        <button class="px-4 py-2 bg-secondary2 text-white font-semibold rounded-md">Add To Cart</button>
                        <button class="px-4 py-2 bg-secondary2 text-white font-semibold rounded-md">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

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
    <div id="personSelection" class="space-y-4">
        <div id="groupCountSection" class="hidden">
            <div class="flex justify-between items-center">
                <div class="flex flex-col">
                    <span class="font-semibold">Group (AED <span id="groupPrice">{{ $privatePkgPrice }}</span>)</span>
                    <span class="text-xs">Max {{ $peoplePerGroup }} people per group</span>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="decrement('groupCount', {{ $privatePkgPrice }})" class="text-secondary text-2xl font-bold">−</button>
                    <span id="groupCount" class="font-semibold text-lg">1</span>
                    <button onclick="increment('groupCount', {{ $privatePkgPrice }})" class="text-secondary text-2xl font-bold">+</button>
                </div>
            </div>
        </div>
        <div id="adultChildCountSection" class="hidden">
            <div class="flex justify-between items-center">
                <span class="font-semibold">Adult (AED <span id="adultPrice">{{ $sharingAdultPrice }}</span>)</span>
                <div class="flex items-center space-x-4">
                    <button onclick="decrement('adultCount', {{ $sharingAdultPrice }})" class="text-secondary text-2xl font-bold">−</button>
                    <span id="adultCount" class="font-semibold text-lg">1</span>
                    <button onclick="increment('adultCount', {{ $sharingAdultPrice }})" class="text-secondary text-2xl font-bold">+</button>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <span class="font-semibold">Child (AED {{ $sharingChildPrice }})</span>
                <div class="flex items-center space-x-4">
                    <button onclick="decrement('childCount', {{ $sharingChildPrice }})" class="text-secondary text-2xl font-bold">−</button>
                    <span id="childCount" class="font-semibold text-lg">0</span>
                    <button onclick="increment('childCount', {{ $sharingChildPrice }})" class="text-secondary text-2xl font-bold">+</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Activity data to store (get this data from your PHP variables)
        const activity = {
            id: "{{ $activity->id }}", // Ensure you include a unique ID for each activity
            name: "{{ $activity->name }}", // Activity Name
            description: "{{ $activity->description }}", // Activity Name
            slug: "{{ $activity->slug }}", // Activity Slug (URL-friendly name)
            duration: "{{ $activity->duration }}", // Activity Slug (URL-friendly name)
            category_slug: "{{ $activity->category->slug }}", // Activity Slug (URL-friendly name)
            image: "{{ url($activity->image_url ?? 'storage/uploads/placeholder_image.png') }}", // Activity Image URL
            group_price: "{{ $privatePkgPrice }}", // Private (group) price
            adult_price: "{{ $sharingAdultPrice }}", // Sharing (per person) price
        };

        // Function to manage recently viewed activities
        function storeActivityInLocalStorage(activity) {
            const maxActivities = 15; // Limit the number of activities to 15

            // Get existing activities from localStorage
            let activities = JSON.parse(localStorage.getItem('recentActivities')) || [];

            // Check if the activity already exists using a unique identifier (id or slug)
            activities = activities.filter(a => a.id !== activity.id && a.slug !== activity.slug);

            // Add the new activity at the beginning of the array
            activities.unshift(activity);

            // If we have more than the max allowed, remove the oldest one
            if (activities.length > maxActivities) {
                activities.pop();
            }

            // Save the updated activities back to localStorage
            localStorage.setItem('recentActivities', JSON.stringify(activities));
        }

        // Call the function to store the activity when the page is viewed
        storeActivityInLocalStorage(activity);
    });
</script>


