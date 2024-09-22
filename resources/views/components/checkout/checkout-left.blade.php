<div class="container mx-auto">
    <!-- Lead Passenger Details Card -->
    <div class="bg-white p-6 rounded-lg border mb-6">
        <h2 class="text-lg font-bold mb-4">Lead Passenger Details</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Title Dropdown -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <select id="title" class="mt-1 block w-full bg-gray-100 border border-gray-200 rounded-md p-2 focus:outline-none focus:ring focus:ring-gray-300">
                    <option>Mr.</option>
                    <option>Ms.</option>
                    <option>Mrs.</option>
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
        <h2 class="text-lg font-bold mb-4">Extra Details</h2>
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
        <h2 class="text-lg font-bold mb-4">Choose a Payment Method</h2>
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
        <button id="pay-now" class="mt-2 md:mt-0 bg-gray-300 text-white py-2 px-4 rounded-md opacity-50 cursor-not-allowed" disabled>Pay Now</button>
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
