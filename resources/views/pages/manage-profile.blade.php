@extends('layouts.app')

@section('content')
    <div class="mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl mb-20 mt-10">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Manage My Account</h1>

        <div class="bg-white shadow-lg rounded-lg p-8 w-full">
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
            <!-- Form to update profile -->
            <form class="max-w-md mx-auto" action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 border rounded-full bg-cover bg-center" style="background-image: url('{{ url(auth()->user()->profile_pic_url) }}')"></div>

                    <button id="uploadButton" type="button" class="bg-secondary2 text-white px-4 py-2 rounded-lg hover:bg-orange-600">
                        Upload Photo
                    </button>
                    <!-- Hidden File Input -->
                    <input type="file" id="profile_image" name="profile_image" class="hidden">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">First Name</label>
                    <input type="text" name="first_name" value="{{ auth()->user()->first_name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Last Name</label>
                    <input type="text" name="last_name" value="{{ auth()->user()->last_name }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Phone Number</label>
                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                </div>

                <button type="submit" class="bg-secondary2 text-white px-4 py-2 w-full rounded-lg hover:bg-orange-600 mb-6">Update Profile</button>

            </form>

            <!-- Form to update password -->
            <form class="max-w-md mx-auto" action="{{ route('updatePassword') }}" method="POST">
                @csrf
                <h3 class="text-xl font-semibold mb-4">Change Password</h3>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">New Password</label>
                    <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                </div>

                <button type="submit" class="bg-secondary2 text-white px-4 py-2 w-full rounded-lg hover:bg-orange-600">Update Password</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Trigger file input dialog when 'Upload Photo' button is clicked
        document.getElementById('uploadButton').addEventListener('click', function() {
            document.getElementById('profile_image').click();
        });
    </script>
@endsection
