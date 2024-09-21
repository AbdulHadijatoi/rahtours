
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      @include('components.checkout.stepper')

      <div class="flex flex-col lg:flex-row gap-x-4 mt-5">
    <!-- Left Section (70% width) -->
    <div class="w-full lg:w-[70%] bg-white p-4 border border-gray-200 rounded-lg">
        <!-- Lead Passenger Details -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Lead Passenger Details</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Title</label>
                    <select class="w-full border-gray-300 rounded-lg">
                        <option>Mr.</option>
                        <option>Ms.</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">First Name</label>
                    <input type="text" placeholder="First Name" class="w-full border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Last Name</label>
                    <input type="text" placeholder="Last Name" class="w-full border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Email Address</label>
                    <input type="email" placeholder="Email" class="w-full border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Nationality</label>
                    <input type="text" placeholder="Nationality" class="w-full border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Phone Number</label>
                    <input type="tel" placeholder="Phone Number" class="w-full border-gray-300 rounded-lg" />
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium">Special Request</label>
                <textarea placeholder="Special Request" class="w-full border-gray-300 rounded-lg h-20"></textarea>
            </div>
        </div>

        <!-- Extra Details -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Extra Details</h2>
            <p class="text-sm text-gray-500 mb-4">Please Enter your Extra Details</p>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block text-sm font-medium">Pick up Location</label>
                    <input type="text" placeholder="Enter your Address" class="w-full border-gray-300 rounded-lg" />
                </div>
                <div>
                    <label class="block text-sm font-medium">Note</label>
                    <textarea placeholder="Write your special request here" class="w-full border-gray-300 rounded-lg h-20"></textarea>
                </div>
            </div>
        </div>

        <!-- Payment Method -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Choose a Payment Method</h2>
            <div class="p-4 border border-gray-300 rounded-lg">
                <label class="block text-sm font-medium mb-2">Credit Card / Debit Card</label>
                <p class="text-sm text-gray-500 mb-2">Note: In the next step you will be redirected to your bank's website to verify yourself.</p>
            </div>
        </div>
    </div>

    <!-- Right Section (30% width) -->
    <div class="w-full lg:w-[30%] bg-white p-4 border border-gray-200 rounded-lg">
        <!-- Cart Summary -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-4">Abu Dhabi City Tour with Louvre Museum Ticket</h2>
            <div class="text-sm text-gray-500 mb-4">
                <p><i class="far fa-calendar-alt"></i> 2024-09-21</p>
                <p>Adult : 1</p>
                <p>Infant : 0</p>
                <p>Child : 0</p>
                <p>Sub Total: AED 200</p>
            </div>
            <div class="flex items-center space-x-2">
                <input type="text" placeholder="Voucher Code" class="w-full border-gray-300 rounded-lg" />
                <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">Apply</button>
            </div>
        </div>

        <!-- Total Amount -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Total Amount:</h2>
            <p class="text-2xl font-bold text-orange-500">AED 200.00</p>
        </div>
    </div>
</div>

    </div>
@endsection