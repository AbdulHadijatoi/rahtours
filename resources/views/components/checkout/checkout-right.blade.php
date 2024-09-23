<div class="w-full lg:w-[40%] container mx-auto">
    @foreach($cartItems as $index => $item)
    <div class="bg-white p-4 rounded-lg border mb-4">
        <div class="flex justify-between items-center">
            <h2 class="text-base font-bold">{{ $item['package_title'] }}</h2>
            <button onclick="toggleSection('section{{ $index }}')" class="text-gray-500">
                <svg id="icon{{ $index }}" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
        </div>
        <div id="section{{ $index }}" class="mt-4 {{ $index === 0 ? '' : 'hidden' }}">
            <p class="flex items-center text-gray-600 text-sm">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                {{ $item['tour_date'] }}
            </p>
            
            <div class="text-sm mt-2">
                @if($item['category'] === 'private')
                    <p>Groups: <span class="float-right">{{ $item['group'] }}</span></p>
                    <p>Persons per group: <span class="float-right">{{ $item['group_size'] }}</span></p>
                @else
                    <p>Adult: <span class="float-right">{{ $item['adult'] }}</span></p>
                    <p>Child: <span class="float-right">{{ $item['child'] }}</span></p>
                    <p>Infant: <span class="float-right">{{ $item['infant'] }}</span></p>
                @endif
                <p class="font-bold mt-2 price">Sub Total: <span class="float-right">AED {{ $item['price'] }}</span></p>
            </div>
            
            <div class="mt-4 flex">
                <input type="text" placeholder="Voucher Code" class="bg-gray-100 border border-gray-200 rounded-md p-2 w-3/4 focus:outline-none focus:ring focus:ring-gray-300">
                <button class="bg-orange-500 text-white py-2 px-4 rounded-md ml-2 apply-voucher-button">APPLY</button>
            </div>
            <div id="errorAlert{{ $index }}" class="hidden w-full bg-red-100 text-red-700 px-4 py-2 rounded-md my-4"></div>
            <div id="successAlert{{ $index }}" class="hidden w-full bg-green-100 text-green-700 px-4 py-2 rounded-md my-4"></div>

        </div>
    </div>

    @if(request()->segment(count(request()->segments())) == 'book-now')
        <!-- Total Amount Section For Book Now (Direct Checkout) -->
        <div class="bg-white p-4 rounded-lg border mb-5">
            <div class="flex justify-between items-center">
                <h2 class="text-base font-bold">Total Amount:</h2>
                <p class="text-orange-500 text-xl font-bold total-amount" id="total_amount"> AED {{ $item['price'] }}</p>
            </div>
        </div>
    @endif

    @endforeach

    @if(request()->segment(count(request()->segments())) != 'book-now')
    <!-- Total Amount Section for cart checkout-->
    <div class="bg-white p-4 rounded-lg border mb-5">
        <div class="flex justify-between items-center">
            <h2 class="text-base font-bold">Total Amount:</h2>
            <p class="text-orange-500 text-xl font-bold total-amount" id="total_amount">AED {{ $totalAmount }}</p>
        </div>
    </div>
    @endif
</div>

<script>
function toggleSection(sectionId) {
    const sections = document.querySelectorAll('[id^=section]');
    sections.forEach(section => {
        if (section.id === sectionId) {
            section.classList.toggle('hidden');
        } else {
            section.classList.add('hidden');
        }
    });

    const icons = document.querySelectorAll('svg[id^=icon]');
    icons.forEach(icon => {
        if (icon.id === 'icon' + sectionId.substring(7)) {
            icon.classList.toggle('rotate-180');
        } else {
            icon.classList.remove('rotate-180');
        }
    });
}

// Expand the first section on page load
document.addEventListener('DOMContentLoaded', () => {
    const firstSection = document.getElementById('section0');
    if (firstSection) {
        firstSection.classList.remove('hidden');
    }
});

var appliedVoucherId = '';

document.querySelectorAll('.apply-voucher-button').forEach((button, index) => {
    button.addEventListener('click', async (event) => {
        const voucherCodeInput = event.target.previousElementSibling;
        const voucherCode = voucherCodeInput.value.trim();

        // Get the alert boxes
        const successAlertBox = document.getElementById('successAlert' + index);
        const errorAlertBox = document.getElementById('errorAlert' + index);

        // Reset alert visibility
        successAlertBox.classList.add('hidden');
        errorAlertBox.classList.add('hidden');

        // Check if the voucher code is empty
        if (!voucherCode) {
            errorAlertBox.textContent = "Voucher code is required.";
            errorAlertBox.classList.remove('hidden', 'flex', 'items-center');
            errorAlertBox.classList.add('flex', 'items-center');
            return;
        }

        // Check if the voucher has already been applied
        if (appliedVoucherId === voucherCode) {
            errorAlertBox.textContent = "This voucher has already been applied.";
            errorAlertBox.classList.remove('hidden', 'flex', 'items-center');
            errorAlertBox.classList.add('flex', 'items-center');
            return;
        }

        const response = await fetch('/gift-card/apply-voucher?voucher_code=' + voucherCode);

        if (response.ok) {
            const data = await response.json();
            appliedVoucherId = voucherCode; // Store the applied voucher ID
            const originalPrice = parseFloat(event.target.closest('.bg-white').querySelector('.price span').textContent.replace('AED ', ''));
            const newPrice = originalPrice - data.price; // Assuming `data.discount` is the voucher amount

            // Update the price in the UI
            event.target.closest('.bg-white').querySelector('.price span').textContent = "AED " + newPrice.toFixed(2);
            
            // Update total amount logic
            const totalAmountElement = document.getElementById('total_amount');
            const currentTotal = parseFloat(totalAmountElement.textContent.replace('AED ', ''));
            const newTotal = currentTotal - data.price; // Assuming data.price is the discount amount

            // Update the total amount displayed in the DOM
            totalAmountElement.textContent = "AED " + newTotal.toFixed(2);

            
            successAlertBox.textContent = "Voucher applied successfully!";
            successAlertBox.classList.remove('hidden', 'flex', 'items-center');
            successAlertBox.classList.add('flex', 'items-center');
        } else {
            const errorData = await response.json();
            errorAlertBox.textContent = errorData.message;
            errorAlertBox.classList.remove('hidden', 'flex', 'items-center');
            errorAlertBox.classList.add('flex', 'items-center');
        }
    });
});

</script>
