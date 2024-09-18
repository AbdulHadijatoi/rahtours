
  <div id="loginModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem] relative">
      
      <div class="absolute top-4 right-4">
        <button id="closeLoginModalBtn" class="text-gray-500 hover:text-gray-700" onclick="closeLogin()">&times;</button>
      </div>
      
      <h2 class="text-center text-2xl font-bold mb-4">Sign in to our platform</h2>
      
      <p class="text-center text-sm text-gray-600 mb-6">
        Sign in to unlock a world of rewards – accumulate RAH Tours Loyalty points or snag exclusive discounts on your booked travel experiences!
      </p>

      
      @include('components.auth.login-form')

      
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