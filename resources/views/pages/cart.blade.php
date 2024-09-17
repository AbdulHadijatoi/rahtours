
@extends('layouts.app')



@section('content')
    @include('components.breadcrumb')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
      {{-- <ul tabindex="0" id="recentActivitiesList" class=" p-2 mt-5">
          @include('components.activity.cart-card')
      </ul>   --}}


      <div class="container mx-auto p-4">
  <!-- Shopping Cart Layout -->
  <div class="flex flex-col lg:flex-row gap-6">
    
    <!-- Left Column (70%) -->
    <div class="w-full lg:w-7/12 bg-white rounded-lg shadow-lg p-6">
      <div class="flex flex-col lg:flex-row gap-4">
        <!-- Image -->
        <div class="w-full lg:w-5/12">
          <img src="{{ url('storage/uploads/1_ru-R3HSm6ecJ6O7D0aS8NA-1719957354.jpg') }}" alt="Desert Tour Image" class="rounded-lg object-cover">
        </div>

        <!-- Content -->
        <div class="w-full lg:w-7/12 flex flex-col justify-between">
          <h2 class="text-2xl font-bold mb-4">Private Vehicle</h2>
          <div class="mb-2 flex items-start">
            <!-- SVG Icon -->
            <svg class="w-12 h-12 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#000000" stroke-width="1.5"></path> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#000000" stroke-width="1.5"></path> <path d="M11 9H8" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
            <p class="text-sm text-gray-600">
              Package Type: Hotel pick-up and drop-off in a Private vehicle with 4 Wheel drive (Toyota Land Cruiser or similar)
            </p>
          </div>
          <div class="mb-2 flex items-start">
            <!-- SVG Icon -->
            <svg class="w-5 h-5 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3 9H21M17 13.0014L7 13M10.3333 17.0005L7 17M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            <p class="text-sm text-gray-600">Tour Date: 2024-08-22</p>
          </div>
          <div class="mb-2 flex items-start">
            <!-- SVG Icon -->
            <svg class="w-5 h-5 mr-2 text-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg> 
            <p class="text-sm text-gray-600">1 private package up to 1 pax</p>
          </div>

          <!-- Cancellation Policy -->
          <p class="text-secondary font-semibold">Cancellation Before: 24 hours</p>
          
          <div class="flex justify-between mt-6">
            <!-- Remove from Cart -->
            <button class="text-secondary flex items-center">
              <!-- Trash Icon -->
              <svg class="w-5 h-5 mr-2" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
              Remove from Cart
            </button>

            <!-- Price -->
            <p class="text-lg font-bold text-secondary">AED 600</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column (30%) -->
    <div class="w-full lg:w-5/12 bg-white rounded-lg shadow-lg p-6">
      <div class="flex justify-between items-center mb-4">
        <p class="text-lg font-semibold">Total (1 Activity)</p>
        <p class="text-xl font-bold text-secondary">AED 600.00</p>
      </div>
      <p class="text-sm text-green-700 font-bold mb-6">No Additional Fees</p>

      <button class="w-full bg-secondary2 text-white py-2 rounded-lg font-bold text-lg mb-4">Checkout</button>
      <button class="w-full bg-white border border-secondary text-secondary py-2 rounded-lg font-bold text-lg mb-4">Explore more activities</button>

      <p class="text-center text-sm">Create an account or <a href="#" class="text-secondary">Login</a> for faster checkout</p>

      <!-- Price Guarantee -->
      <div class="mt-4 flex items-center text-green-700 font-bold">
        <svg class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#008000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
        <p>Best Price Guarantee</p>
      </div>
    </div>
  </div>

  <!-- Why Book With Us Section -->
  <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
    <h3 class="text-lg font-bold mb-4">Why Book With Us</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Secure Payment -->
      <div class="flex items-center">
        <svg fill="#000000" class="w-6 h-6 mr-2" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.001 512.001" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M466.395,88.411C395.95,69.109,325.091,39.054,261.478,1.496c-3.379-1.995-7.572-1.995-10.95,0 C185.08,40.133,118.05,68.562,45.605,88.411c-4.68,1.281-7.924,5.535-7.924,10.388v110.046 c0,113.323,52.279,188.335,96.137,231.306c47.216,46.265,102.216,71.85,122.185,71.85c19.967,0,74.967-25.585,122.183-71.85 c43.857-42.97,96.133-117.982,96.133-231.306V98.798C474.319,93.946,471.075,89.692,466.395,88.411z M452.779,208.844 c0,105.843-48.761,175.838-89.669,215.92c-46.431,45.495-96.074,65.695-107.107,65.695c-11.033,0-60.679-20.2-107.111-65.695 c-40.907-40.083-89.67-110.077-89.67-215.92V106.974C128.5,87.304,193.018,59.853,256.005,23.25 c61.414,35.632,129.151,64.448,196.774,83.72V208.844z"></path> <path d="M160.538,105.769c-2.18-5.535-8.433-8.254-13.969-6.073c-19.24,7.581-38.988,14.559-58.695,20.741 c-4.491,1.41-7.547,5.57-7.547,10.276v41.591c0,5.948,4.823,10.77,10.77,10.77s10.77-4.822,10.77-10.77v-33.72 c17.679-5.72,35.339-12.047,52.598-18.848C160,117.557,162.719,111.304,160.538,105.769z"></path> <path d="M180.997,107.812c1.445,0,2.912-0.291,4.319-0.905l0.198-0.086c5.449-2.388,7.903-8.731,5.515-14.178 c-2.39-5.449-8.769-7.914-14.212-5.528l-0.174,0.075c-5.452,2.381-7.914,8.719-5.533,14.169 C172.877,105.405,176.842,107.812,180.997,107.812z"></path> <path d="M384.322,347.283c-4.977-3.253-11.651-1.854-14.908,3.125c-8.875,13.584-19.287,26.592-30.951,38.659 c-9.592,9.922-19.986,19.17-30.893,27.485c-4.729,3.606-5.639,10.364-2.034,15.095c2.121,2.779,5.328,4.241,8.572,4.241 c2.278,0,4.573-0.719,6.523-2.207c11.765-8.971,22.975-18.944,33.317-29.642c12.611-13.044,23.881-27.124,33.499-41.849 C390.702,357.21,389.301,350.536,384.322,347.283z"></path> <path d="M282.558,433.443l-0.618,0.364c-5.147,2.981-6.906,9.569-3.926,14.716c1.997,3.45,5.612,5.376,9.331,5.376 c1.83,0,3.688-0.467,5.385-1.452l0.713-0.419c5.133-3.006,6.857-9.603,3.851-14.736 C294.286,432.161,287.688,430.44,282.558,433.443z"></path> <path d="M182.589,234.019c-6.613-6.614-15.408-10.254-24.762-10.254s-18.15,3.641-24.766,10.254 c-13.653,13.656-13.653,35.876,0,49.531l63.596,63.594c6.614,6.612,15.409,10.253,24.764,10.253s18.15-3.641,24.765-10.255 L378.947,214.38c13.652-13.659,13.652-35.876-0.002-49.527c-6.614-6.614-15.409-10.254-24.765-10.254 c-9.355,0-18.15,3.641-24.765,10.254L221.42,272.848L182.589,234.019z M344.647,180.085c2.545-2.545,5.932-3.946,9.534-3.946 c3.604,0,6.988,1.401,9.535,3.946c5.255,5.255,5.255,13.809-0.002,19.066l-132.759,132.76c-2.545,2.545-5.932,3.946-9.534,3.946 s-6.989-1.401-9.535-3.946l-63.594-63.592c-5.257-5.257-5.257-13.811-0.002-19.066c2.546-2.545,5.933-3.948,9.536-3.948 s6.988,1.401,9.533,3.946l46.445,46.446c2.021,2.019,4.759,3.154,7.616,3.154s5.595-1.134,7.614-3.154L344.647,180.085z"></path> </g> </g> </g> </g></svg>
        <p>Secure Payment</p>
      </div>
      <!-- No Hidden Costs -->
      <div class="flex items-center">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.29417 12.9577L10.5048 16.1681L17.6729 9" stroke="#000000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> <circle cx="12" cy="12" r="10" stroke="#000000" stroke-width="2"></circle> </g></svg>
        <p>No hidden costs</p>
      </div>
      <!-- Customer Support -->
      <div class="flex items-center">
        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M8 10.5H16" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M8 14H13.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> <path d="M17 3.33782C15.5291 2.48697 13.8214 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 10.1786 21.513 8.47087 20.6622 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
        <p>24/7 Customer Support</p>
      </div>
    </div>
  </div>
</div>

    </div>
</div>

<script>
    
</script>

@endsection