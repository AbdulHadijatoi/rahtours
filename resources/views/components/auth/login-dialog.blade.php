
  <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem] relative">
      
      <div class="absolute top-4 right-4">
        <button id="closeLoginModalBtn" class="text-gray-500 hover:text-gray-700" onclick="closeLogin()">&times;</button>
      </div>
      
      <h2 class="text-center text-2xl font-bold mb-4">Sign in to our platform</h2>
      
      <p class="text-center text-sm text-gray-600 mb-6">
        Sign in to unlock a world of rewards – accumulate RAH Tours Loyalty points or snag exclusive discounts on your booked travel experiences!
      </p>

      
      <form id="loginForm" class="space-y-4">
        
        <div>
          <label class="block text-sm font-semibold mb-1">Your email</label>
          <input type="email" placeholder="company@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        
        <div>
          <label class="block text-sm font-semibold mb-1">Your password</label>
          <input type="password" placeholder="••••••••" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <input type="checkbox" id="rememberMe" class="h-4 w-4 text-secondary border-gray-300 rounded focus:ring-orange-500">
            <label for="rememberMe" class="ml-2 text-sm text-gray-700">Remember me</label>
          </div>
          <a href="#" class="text-secondary text-sm hover:underline" onclick="openForgotPassword()">Lost Password?</a>
        </div>
        
        <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
          Login to your account
        </button>
      </form>

      
      <p class="mt-6 text-center text-sm">
        Already a member? Log in below to access your account and explore the world with ease? 
        <a href="#" class="text-secondary font-semibold hover:underline" onclick="openSignup()">Create account</a>
      </p>
    </div>
  </div>

  <script>
    const loginModal = document.getElementById('loginModal');

    function openLogin() {
        closeSignup();
        loginModal.classList.remove('hidden');
    };

    function closeLogin() {
      loginModal.classList.add('hidden');
    };

    window.addEventListener('click', function(event) {
      if (event.target === loginModal) {
        loginModal.classList.add('hidden');
      }
    });
  </script>