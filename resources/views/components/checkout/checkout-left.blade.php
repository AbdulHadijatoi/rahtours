<div class="container mx-auto">
    <!-- Lead Passenger Details Card -->
    <div class="bg-white p-6 rounded-lg border mb-6">
        <div class="flex justify-start items-center mb-4">
            <svg class="w-6 h-6 mr-1" fill="#ee8e3b" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>details-line</title> <path d="M32,6H4A2,2,0,0,0,2,8V28a2,2,0,0,0,2,2H32a2,2,0,0,0,2-2V8A2,2,0,0,0,32,6Zm0,22H4V8H32Z" class="clr-i-outline clr-i-outline-path-1"></path><path d="M9,14H27a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z" class="clr-i-outline clr-i-outline-path-2"></path><path d="M9,18H27a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z" class="clr-i-outline clr-i-outline-path-3"></path><path d="M9,22H19a1,1,0,0,0,0-2H9a1,1,0,0,0,0,2Z" class="clr-i-outline clr-i-outline-path-4"></path> <rect x="0" y="0" width="36" height="36" fill-opacity="0"></rect> </g></svg>
            <h2 class="text-lg font-bold">Lead Passenger Details</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Title Dropdown -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <select id="title" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300">
                    <option>Mr.</option>
                    <option>Miss</option>
                    <option>Mrs</option>
                </select>
            </div>
            <!-- First Name -->
            <div>
                <label for="first-name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" id="first-name" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" placeholder="First Name">
            </div>
            <!-- Last Name -->
            <div>
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" id="last-name" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" placeholder="Last Name">
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" placeholder="Email">
            </div>
            <!-- Nationality -->
            <div>
                <label for="country-dropdown" class="block text-sm font-medium text-gray-700">Nationality</label>
                <select id="country-dropdown" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300">
                    <option value="">Select Nationality</option>
                </select>
            </div>


            <!-- Phone Number -->
            <div>
                <label for="phone-number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" id="phone-number" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" placeholder="Phone Number">
            </div>
            <!-- Special Request -->
            <div class="sm:col-span-2">
                <label for="special-request" class="block text-sm font-medium text-gray-700">Special Request</label>
                <textarea id="special-request" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" rows="3" placeholder="Special Request"></textarea>
            </div>
        </div>
    </div>

    <!-- Extra Details Card -->
    <div class="bg-white p-6 rounded-lg border mb-6">
        
        <div class="flex justify-start items-center mb-4">
            <svg class="w-6 h-6 mr-1" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#ee8e3b"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M277.3 469.3m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#ee8e3b"></path><path d="M344.7 978.2c-5.2 0-10.4-0.8-15.5-2.5-13.8-4.5-24.8-14.8-30.4-28.1l-39.3-94.2H128.3C57.5 853.3 0 795.8 0 725.1V213.6C0 142.9 57.5 85.3 128.3 85.3h767.5c70.7 0 128.3 57.5 128.3 128.3v511.5c0 70.7-57.5 128.3-128.3 128.3H566.5L370.2 971.1c-7.7 4.7-16.6 7.1-25.5 7.1z m-18.3-80.3s-0.1 0 0 0zM128.3 170.7c-23.7 0-42.9 19.3-42.9 42.9v511.5c0 23.7 19.3 42.9 42.9 42.9h188.2l45.3 108.7L542.9 768h352.9c23.7 0 42.9-19.3 42.9-42.9V213.6c0-23.7-19.3-42.9-42.9-42.9H128.3z" fill="#ee8e3b"></path><path d="M512 469.3m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#ee8e3b"></path><path d="M746.7 469.3m-64 0a64 64 0 1 0 128 0 64 64 0 1 0-128 0Z" fill="#ee8e3b"></path></g></svg>
            <h2 class="text-lg font-bold">Extra Details</h2>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <!-- Pick-up Location -->
            <div>
                <label for="pickup-location" class="block text-sm font-medium text-gray-700">Pick-up Location</label>
                <input type="text" id="pickup-location" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" placeholder="Enter your Address">
            </div>
            <!-- Note -->
            <div>
                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                <textarea id="note" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300" rows="3" placeholder="Write your special request here"></textarea>
            </div>
        </div>
    </div>

    <!-- Payment Method Card -->
    <div class="bg-white p-6 rounded-lg border mb-6">
        <div class="flex justify-start items-center mb-4">
            <svg class="w-6 h-6 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14 4H10C6.22876 4 4.34315 4 3.17157 5.17157C2.32803 6.01511 2.09185 7.22882 2.02572 9.25H21.9743C21.9082 7.22882 21.672 6.01511 20.8284 5.17157C19.6569 4 17.7712 4 14 4Z" fill="#ee8e3b"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 11.5581 2 11.142 2.00189 10.75H21.9981C22 11.142 22 11.5581 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20ZM16.0447 12.25C16.4776 12.2499 16.8744 12.2499 17.1972 12.2933C17.5527 12.3411 17.9284 12.4535 18.2374 12.7626C18.5465 13.0716 18.6589 13.4473 18.7067 13.8028C18.7501 14.1256 18.7501 14.5224 18.75 14.9553V15.0447C18.7501 15.4776 18.7501 15.8744 18.7067 16.1972C18.6589 16.5527 18.5465 16.9284 18.2374 17.2374C17.9284 17.5465 17.5527 17.6589 17.1972 17.7067C16.8744 17.7501 16.4776 17.7501 16.0447 17.75L16 17.75L15.9553 17.75C15.5224 17.7501 15.1256 17.7501 14.8028 17.7067C14.4473 17.6589 14.0716 17.5465 13.7626 17.2374C13.4535 16.9284 13.3411 16.5527 13.2933 16.1972C13.2499 15.8744 13.2499 15.4776 13.25 15.0447L13.25 15L13.25 14.9553C13.2499 14.5224 13.2499 14.1256 13.2933 13.8028C13.3411 13.4473 13.4535 13.0716 13.7626 12.7626C14.0716 12.4535 14.4473 12.3411 14.8028 12.2933C15.1256 12.2499 15.5224 12.2499 15.9553 12.25H16.0447ZM5.25 13.5C5.25 13.0858 5.58579 12.75 6 12.75H8C8.41421 12.75 8.75 13.0858 8.75 13.5C8.75 13.9142 8.41421 14.25 8 14.25H6C5.58579 14.25 5.25 13.9142 5.25 13.5ZM5.25 16.5C5.25 16.0858 5.58579 15.75 6 15.75H10C10.4142 15.75 10.75 16.0858 10.75 16.5C10.75 16.9142 10.4142 17.25 10 17.25H6C5.58579 17.25 5.25 16.9142 5.25 16.5Z" fill="#ee8e3b"></path> <path d="M14.8233 13.8232L14.8257 13.8219C14.8276 13.8209 14.8309 13.8192 14.836 13.8172C14.8577 13.8082 14.9061 13.7929 15.0027 13.7799C15.2134 13.7516 15.5074 13.75 16 13.75C16.4926 13.75 16.7866 13.7516 16.9973 13.7799C17.0939 13.7929 17.1423 13.8082 17.164 13.8172C17.1691 13.8192 17.1724 13.8209 17.1743 13.8219L17.1768 13.8232L17.1781 13.8257C17.1791 13.8276 17.1808 13.8309 17.1828 13.836C17.1918 13.8577 17.2071 13.9061 17.2201 14.0027C17.2484 14.2134 17.25 14.5074 17.25 15C17.25 15.4926 17.2484 15.7866 17.2201 15.9973C17.2071 16.0939 17.1918 16.1423 17.1828 16.164C17.1808 16.1691 17.1791 16.1724 17.1781 16.1743L17.1768 16.1768L17.1743 16.1781C17.1724 16.1791 17.1691 16.1808 17.164 16.1828C17.1423 16.1918 17.0939 16.2071 16.9973 16.2201C16.7866 16.2484 16.4926 16.25 16 16.25C15.5074 16.25 15.2134 16.2484 15.0027 16.2201C14.9061 16.2071 14.8577 16.1918 14.836 16.1828C14.8309 16.1808 14.8276 16.1791 14.8257 16.1781L14.8232 16.1768L14.8219 16.1743C14.8209 16.1724 14.8192 16.1691 14.8172 16.164C14.8082 16.1423 14.7929 16.0939 14.7799 15.9973C14.7516 15.7866 14.75 15.4926 14.75 15C14.75 14.5074 14.7516 14.2134 14.7799 14.0027C14.7929 13.9061 14.8082 13.8577 14.8172 13.836C14.8192 13.8309 14.8209 13.8276 14.8219 13.8257L14.8233 13.8232Z" fill="#ee8e3b"></path> </g></svg>
            <h2 class="text-lg font-bold">Choose a Payment Method</h2>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <!-- Payment Method Radio Button -->
            <div class="flex items-center">
                <input id="credit-card" name="payment-method" type="radio" class="focus:ring focus:ring-gray-300 text-orange-500 border-gray-200" checked>
                <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700">
                    Credit Card / Debit Card
                </label>
            </div>
            <p class="text-xs text-orange-500">Note: In the next step you will be redirected to your bank's website to verify yourself.</p>
        </div>
    </div>

    <!-- Terms and Conditions + Pay Now Button -->
    <div class="bg-white p-6 flex-col md:flex-row rounded-lg border flex items-center justify-between my-6">
        <div class="flex items-center">
            <input id="terms" type="checkbox" class="focus:ring focus:ring-gray-300 text-orange-500 border-gray-200">
            <label for="terms" class="ml-2 block text-sm text-gray-700">By Clicking Pay Now you agree that you have read and understood our <a href="#" class="text-orange-500">Terms and Conditions</a></label>
        </div>
        <a href="{{ route('placeOrder') }}" id="pay-now" class="mt-2 md:mt-0 bg-gray-300 text-white py-2 px-4 rounded-md opacity-50 cursor-not-allowed" disabled>Pay Now</a>
    </div>
</div>

<!-- Tailwind Scripts -->
<script>
    const checkoutTermsCheckbox = document.getElementById('terms');
    const payNowButton = document.getElementById('pay-now');

    checkoutTermsCheckbox.addEventListener('change', function() {
        if (checkoutTermsCheckbox.checked) {
            payNowButton.disabled = false;
            payNowButton.classList.remove('bg-gray-300', 'cursor-not-allowed', 'opacity-50');
            payNowButton.classList.add('bg-orange-500', 'hover:bg-orange-600');
        } else {
            payNowButton.disabled = true;
            payNowButton.classList.remove('bg-orange-500', 'hover:bg-orange-600');
            payNowButton.classList.add('bg-gray-300', 'cursor-not-allowed', 'opacity-50');
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fetch the list of countries with flags from the API
        fetch('https://valid.layercode.workers.dev/list/countries?format=select&flags=true&value=code')
            .then(response => response.json())
            .then(data => {
                const countries = data.countries;
                const countryDropdown = document.getElementById('country-dropdown');

                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.value;
                    option.text = country.label;
                    countryDropdown.appendChild(option);
                });

            })
            .catch(error => console.error('Error fetching country data:', error));
    });
</script>
