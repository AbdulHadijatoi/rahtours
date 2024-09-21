<div class="bg-white rounded-lg border p-6">
  <div class="flex justify-between items-center mb-4">
    <p class="text-lg font-semibold">Total ({{ $totalActivities }} Activity)</p>
    <p class="text-xl font-bold text-secondary">AED {{ $totalAmount }}</p>
  </div>
  <p class="text-sm text-green-700 font-bold mb-6">No Additional Fees</p>

  <button class="w-full bg-secondary2 text-white py-2 rounded-lg font-bold text-lg mb-4">Checkout</button>
  <button class="w-full bg-white border border-secondary text-secondary py-2 rounded-lg font-bold text-lg mb-4">Explore more activities</button>

  <div class="text-center text-sm">
    <button type="button" class="text-secondary" onclick="openSignup();">Create an account</button> 
    <span>or</span>
    <button type="button" onclick="openLogin();" class="text-secondary">Login</button> 
    <span>for faster checkout</span>
  </div>

  <!-- Price Guarantee -->
  <div class="mt-4 flex items-center text-green-700 font-bold">
    <svg class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#008000" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    <p>Best Price Guarantee</p>
  </div>
</div>