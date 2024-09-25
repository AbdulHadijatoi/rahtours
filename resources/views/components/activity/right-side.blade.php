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
            <div class="flex items-start cursor-pointer">
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
                        {{-- <button class="px-4 py-2 bg-secondary2 text-white font-semibold rounded-md">Add To Cart</button> --}}
                        <button class="add-to-cart px-4 py-2 bg-secondary2 text-white font-semibold rounded-md" 
                            data-key="{{ $key }}" 
                            data-total-key="totalPrice{{ $key }}" 
                            data-package-id="{{ $package->id }}" 
                            data-activity-image="{{ $activity->image_url }}" 
                            data-package-title="{{ $package->title }}" 
                            data-activity-slug="{{ $activity->slug }}" 
                            data-package-highlight="{{ $package->highlight }}" 
                            data-package-category="{{ $package->category }}" 
                            data-cancellation-duration="{{ $activity->cancellation_duration }}" 
                            data-price="{{ $package->category == 'private' ? $privatePkgPrice : $sharingAdultPrice }}"
                            data-group-size="{{ $package->category == 'private' ? $peoplePerGroup : 0 }}"
                            data-category="{{ $package->category }}"
                            onclick="checkout.call(this, '/cart/add')">Add To Cart</button>
                        <button class="book-now px-4 py-2 bg-secondary2 text-white font-semibold rounded-md"
                            data-key="{{ $key }}" 
                            data-total-key="totalPrice{{ $key }}" 
                            data-package-id="{{ $package->id }}" 
                            data-activity-image="{{ $activity->image_url }}" 
                            data-package-title="{{ $package->title }}" 
                            data-activity-slug="{{ $activity->slug }}" 
                            data-package-highlight="{{ $package->highlight }}" 
                            data-package-category="{{ $package->category }}" 
                            data-cancellation-duration="{{ $activity->cancellation_duration }}" 
                            data-price="{{ $package->category == 'private' ? $privatePkgPrice : $sharingAdultPrice }}"
                            data-group-size="{{ $package->category == 'private' ? $peoplePerGroup : 0 }}"
                            data-category="{{ $package->category }}" 
                            onclick="checkout.call(this, '/checkout/book-now')">Book Now</button>
                    </div>

                </div>
            </div>
            <div id="errorAlert{{ $key }}" class="hidden w-full bg-red-100 text-red-700 px-4 py-2 rounded-md my-4"></div>
            <div id="successAlert{{ $key }}" class="hidden w-full bg-info text-white px-4 py-2 rounded-md my-4"></div>

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
    <div id="personSelection" class="mb-3">
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
            <div class="flex justify-between items-center">
                <span class="font-semibold">Infant</span>
                <div class="flex items-center space-x-4">
                    <button onclick="decrement('infantCount', 0)" class="text-secondary text-2xl font-bold">−</button>
                    <span id="infantCount" class="font-semibold text-lg">0</span>
                    <button onclick="increment('infantCount', 0)" class="text-secondary text-2xl font-bold">+</button>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('sendGift.index') }}" method="GET">
        <input type="hidden" name="activity_id" value="{{ $activity->id }}">
        <button type="submit" class="flex items-center">
            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V20M12 7H8.46429C7.94332 7 7.4437 6.78929 7.07533 6.41421C6.70695 6.03914 6.5 5.53043 6.5 5C6.5 4.46957 6.70695 3.96086 7.07533 3.58579C7.4437 3.21071 7.94332 3 8.46429 3C11.2143 3 12 7 12 7ZM12 7H15.5357C16.0567 7 16.5563 6.78929 16.9247 6.41421C17.293 6.03914 17.5 5.53043 17.5 5C17.5 4.46957 17.293 3.96086 16.9247 3.58579C16.5563 3.21071 16.0567 3 15.5357 3C12.7857 3 12 7 12 7ZM5 12H19V17.8C19 18.9201 19 19.4802 18.782 19.908C18.5903 20.2843 18.2843 20.5903 17.908 20.782C17.4802 21 16.9201 21 15.8 21H8.2C7.07989 21 6.51984 21 6.09202 20.782C5.71569 20.5903 5.40973 20.2843 5.21799 19.908C5 19.4802 5 18.9201 5 17.8V12ZM4.6 12H19.4C19.9601 12 20.2401 12 20.454 11.891C20.6422 11.7951 20.7951 11.6422 20.891 11.454C21 11.2401 21 10.9601 21 10.4V8.6C21 8.03995 21 7.75992 20.891 7.54601C20.7951 7.35785 20.6422 7.20487 20.454 7.10899C20.2401 7 19.9601 7 19.4 7H4.6C4.03995 7 3.75992 7 3.54601 7.10899C3.35785 7.20487 3.20487 7.35785 3.10899 7.54601C3 7.75992 3 8.03995 3 8.6V10.4C3 10.9601 3 11.2401 3.10899 11.454C3.20487 11.6422 3.35785 11.7951 3.54601 11.891C3.75992 12 4.03995 12 4.6 12Z" stroke="#ee8e3b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <p class="text-md font-bold text-secondary">Give this as a Gift</p>
        </button>
    </form>
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


    function checkout(target_url) {
        const activity_image = this.getAttribute('data-activity-image');
        const activity_slug = this.getAttribute('data-activity-slug');
        const highlight = this.getAttribute('data-package-highlight');
        const cancellation_duration = this.getAttribute('data-cancellation-duration');
        const packageId = this.getAttribute('data-package-id');
        const totalId = this.getAttribute('data-total-key');
        const packageIndex = this.getAttribute('data-key');
        const package_title = this.getAttribute('data-package-title');
        const price = this.getAttribute('data-price');
        const groupSize = this.getAttribute('data-group-size');
        const category = this.getAttribute('data-category');
        const date = document.querySelector('#date').value; // Get the selected date
        const adultCount = document.querySelector('#adultCount')?.textContent || 0;
        const childCount = document.querySelector('#childCount')?.textContent || 0;
        const infantCount = document.querySelector('#infantCount')?.textContent || 0; // Capture infant count
        const groupCount = document.querySelector('#groupCount')?.textContent || 0;
        const totalPrice = document.getElementById(totalId);

        const errorAlertBox = document.getElementById('errorAlert' + packageIndex); // Reference the correct error alert
        const successAlertBox = document.getElementById('successAlert' + packageIndex); // Reference the correct success alert
        // Date validation check
        if (!date) {

            errorAlertBox.textContent = "Date is required. Please select date.";
            errorAlertBox.classList.remove('hidden');  // Show errorAlert
            errorAlertBox.classList.add('flex', 'items-center');  // Add Tailwind classes
            return;  // Exit the function if date is not selected
        }

        // Create a form element
        const form = document.createElement('form');
        form.action = target_url;

        // Add CSRF token (you'll need this for Laravel form submissions)

        form.method = 'POST';
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(createHiddenInput('_token', csrfToken));

        // Add form data as hidden inputs
        form.appendChild(createHiddenInput('package_id', packageId));
        form.appendChild(createHiddenInput('package_title', package_title));
        form.appendChild(createHiddenInput('activity_image', activity_image));
        form.appendChild(createHiddenInput('cancellation_duration', cancellation_duration));
        form.appendChild(createHiddenInput('activity_slug', activity_slug));
        form.appendChild(createHiddenInput('highlight', highlight));
        form.appendChild(createHiddenInput('price', totalPrice.innerHTML));
        form.appendChild(createHiddenInput('group_size', groupSize));
        form.appendChild(createHiddenInput('category', category));
        form.appendChild(createHiddenInput('tour_date', date));
        form.appendChild(createHiddenInput('adult', adultCount));
        form.appendChild(createHiddenInput('child', childCount));
        form.appendChild(createHiddenInput('infant', infantCount));
        form.appendChild(createHiddenInput('group', groupCount));

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }

    // Function to create hidden input elements
    function createHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        return input;
    }
</script>


