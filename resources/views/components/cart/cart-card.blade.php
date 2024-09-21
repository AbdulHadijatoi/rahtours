<div class="bg-white rounded-lg border p-6 mb-5">
    <div class="flex flex-col lg:flex-row gap-4">
        <!-- Image -->
        <div class="w-full lg:w-5/12">
            <img src="{{ url($cart_item['activity_image']??'') }}" alt="Desert Tour Image" class="rounded-lg object-cover">
        </div>
        <!-- Content -->
        <div class="w-full lg:w-7/12 flex flex-col justify-between">
            <h2 class="text-2xl font-bold mb-4">{{ $cart_item['package_title'] }}</h2>
            <div class="mb-2 flex items-start">
                <!-- SVG Icon -->
                <svg class="w-12 h-12 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#000000" stroke-width="1.5"></path> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#000000" stroke-width="1.5"></path> <path d="M11 9H8" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                <p class="text-sm text-gray-600">
                    {!! $cart_item['package_highlight'] !!}
                </p>
            </div>
            <div class="mb-2 flex items-start">
            <!-- SVG Icon -->
            <svg class="w-5 h-5 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <p class="text-sm text-gray-600">Tour Date: {{ $cart_item['tour_date'] }}</p>
            </div>
            <div class="mb-2 flex items-start">
                <!-- SVG Icon -->
                <svg class="w-5 h-5 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
                @if(isset($cart_item['category']))
                    @if($cart_item['category'] == 'private')
                        <p class="text-sm text-gray-600">1 private package up to {{ $cart_item['group_size'] }} people max</p>
                    @else
                        <p class="text-sm text-gray-600">1 sharing package up to 1 person max</p>
                    @endif
                @endif
            </div>

            <!-- Cancellation Policy -->
            <p class="text-secondary font-semibold">Cancellation Before: {{ $cart_item['cancellation_duration'] }} hours</p>
            
            <div class="flex justify-between mt-6">
                <!-- Remove from Cart -->
                <form action="{{ route('cart.remove', $cart_item['package_id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-secondary flex items-center">
                        <!-- Trash Icon -->
                        <svg class="w-5 h-5 mr-2" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Remove from Cart
                    </button>
                </form>

                <!-- Price -->
                <p class="text-lg font-bold text-secondary">AED {{ $cart_item['price'] }}</p>            
            </div>
        </div>
    </div>
</div>