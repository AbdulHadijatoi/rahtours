<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', getPageName())</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    @yield('styles')

</head>
{{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> --}}
<body class="font-sans antialiased">
    <div class="nav {{ Route::currentRouteName() !== 'home' ? 'light-nav' : '' }}">
        @include('components.navbar')
    </div>

    <main>
        @if(count(request()->segments()) == 0)
            @include('components.hero-section')
        @else
            @include('components.hero-common')
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200">
        @include('components.footer')
    </footer>

    <script src="{{ asset('assets/script.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    
    @yield('scripts')
</body>
</html>
