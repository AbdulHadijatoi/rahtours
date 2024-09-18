<form id="signupForm" action="{{ route('signup') }}" method="POST">
    @csrf
    
    <input type="text" name="first_name" placeholder="First Name" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    
    <input type="text" name="last_name" placeholder="Last Name" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    
    <input type="tel" name="phone" placeholder="Phone" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    
    <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    
    <div class="relative mb-3">
        <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <span class="absolute right-3 top-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>
        </span>
    </div>
    
    <div class="relative mb-3">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <span class="absolute right-3 top-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>
        </span>
    </div>

    <div class="flex items-center mb-3">
        <input type="checkbox" id="terms" name="terms" class="w-4 h-4 text-secondary border-gray-300 rounded focus:ring-orange-500" required>
        <label for="terms" class="ml-2 text-sm text-gray-700">I agree with 
            <a href="#" class="text-secondary underline">Terms & Conditions</a>
        </label>
    </div>

    <button id="signupBtn" type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md disabled:opacity-50 disabled:cursor-not-allowed">
        SIGN UP
    </button>
</form>
