
  <div id="forgotPasswordModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-[30rem] relative">
      <div class="absolute top-4 right-4">
        <button id="closeForgotPasswordModalBtn" class="text-gray-500 hover:text-gray-700" onclick="closeForgotPassword()">&times;</button>
      </div>
      <h2 class="text-center text-2xl font-bold mb-4">Forget Your Password</h2>
      <p class="text-center text-sm text-gray-600 mb-6">
        Don’t worry we can help you out! If you still remember your email address, you can quickly reset your password.
      </p>

      <form id="forgotPasswordForm" class="space-y-4">
        <div>
          <label class="block text-sm font-semibold mb-1">Email *</label>
          <input type="email" placeholder="company@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
          Request Change Password
        </button>
      </form>
    </div>
  </div>

  <script>
    const forgotPasswordModal = document.getElementById('forgotPasswordModal');

    function openForgotPassword() {
      closeLogin();
      forgotPasswordModal.classList.remove('hidden');
    };

    function closeForgotPassword() {
      forgotPasswordModal.classList.add('hidden');
    };

    window.addEventListener('click', function(event) {
      if (event.target === forgotPasswordModal) {
        forgotPasswordModal.classList.add('hidden');
      }
    });
  </script>