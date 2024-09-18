
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

      @include('components.auth.signup-form')

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