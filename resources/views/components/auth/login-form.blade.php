<form action="{{ route('login') }}" id="loginForm" class="space-y-4" method="post">
    @csrf
    <div>
        <label class="block text-sm font-semibold mb-1">Your email</label>
        <input type="email" name="email" placeholder="company@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>
    
    <div>
        <label class="block text-sm font-semibold mb-1">Your password</label>
        <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>
    </div>
    
    <div class="flex justify-between items-center">
        <div class="flex items-center">
        <input type="checkbox" name="remember" id="rememberMe" class="h-4 w-4 text-secondary border-gray-300 rounded focus:ring-orange-500">
        <label for="rememberMe" class="ml-2 text-sm text-gray-700">Remember me</label>
        </div>
        <a href="#" class="text-secondary text-sm hover:underline" onclick="openForgotPassword()">Lost Password?</a>
    </div>
    
    <button type="submit" class="w-full px-4 py-2 text-white bg-secondary2 rounded-md font-semibold">
        Login to your account
    </button>
</form>