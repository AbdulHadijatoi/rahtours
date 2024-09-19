
  <div id="forgotPasswordModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    @include('components.auth.forgot-password-form')
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