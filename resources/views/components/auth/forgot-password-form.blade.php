<div class="mx-auto bg-white p-6 rounded-lg shadow-lg w-[30rem] relative">
    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <h1 class="text-center text-2xl font-bold mb-4">Forget Your Password</h1>
    <p class="text-center text-sm text-gray-600 mb-6">
        Don’t worry we can help you out! If you still remember your email address, you can quickly reset your password.
    </p>

    <form id="forgotPasswordForm" class="space-y-4" action="{{ route('sendResetLink') }}" method="GET">
        @csrf
        <div>
            <label class="block text-sm font-semibold mb-1">Email *</label>
            <input type="email" name="email" placeholder="Email address.." class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
        </div>
        <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
            Request Change Password
        </button>
    </form>
</div>