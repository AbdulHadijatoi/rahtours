
  <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem]">
      <div class="flex justify-end">
        <button id="closeSignupModalBtn" class="text-gray-500 hover:text-gray-700" onclick="closeSignup()">&times;</button>
      </div>
      <h2 class="text-center text-2xl font-bold mb-4">SIGN UP</h2>
      <p class="text-center text-xl font-semibold">Welcome to Rah Tours</p>
      <p class="text-center text-sm font-medium text-gray-600 mb-4">
        Your Gateway to Unforgettable Adventures!
      </p>
      <p class="text-center text-sm text-gray-500 mb-6">
        Create an account to unlock exclusive travel deals, personalized recommendations, and seamless booking experiences.
      </p>

      <form id="signupForm">
        <input type="text" placeholder="First Name" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <input type="text" placeholder="Last Name" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <input type="tel" placeholder="Phone" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <input type="email" placeholder="Email" class="w-full px-4 py-2 mb-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        <div class="relative mb-3">
          <input type="password" placeholder="Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          <span class="absolute right-3 top-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>
          </span>
        </div>
        <div class="relative mb-3">
          <input type="password" placeholder="Confirm Password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
          <span class="absolute right-3 top-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-gray-500 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.522 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7s-8.268-2.943-9.542-7z"/>
            </svg>
          </span>
        </div>

        <div class="flex items-center mb-3">
          <input type="checkbox" id="terms" class="w-4 h-4 text-secondary border-gray-300 rounded focus:ring-orange-500">
          <label for="terms" class="ml-2 text-sm text-gray-700">I agree with 
            <a href="#" class="text-secondary underline">Terms & Conditions</a>
          </label>
        </div>

        <button id="signupBtn" type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md disabled:opacity-50 disabled:cursor-not-allowed">
          SIGN UP
        </button>
      </form>

      <p class="mt-4 text-center text-sm">
        Already a member? 
        <a href="#" class="text-secondary font-semibold" onclick="openLogin()">Log In</a>
      </p>
    </div>
  </div>

  <script>
    const modal = document.getElementById('modal');
    const termsCheckbox = document.getElementById('terms');
    const signupButton = document.getElementById('signupBtn');

    function openSignup() {
        closeLogin();
        modal.classList.remove('hidden');
    };

    function closeSignup() {
      modal.classList.add('hidden');
    };

    signupButton.disabled = true;

    termsCheckbox.addEventListener('change', function () {
      signupButton.disabled = !termsCheckbox.checked;
    });

    window.addEventListener('click', function(event) {
      if (event.target === modal) {
        modal.classList.add('hidden');
      }
    });
  </script>