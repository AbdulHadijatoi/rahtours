<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <meta property="og:site_name" content="RAH Tours" />
    <!-- Dynamic Open Graph meta tags -->
    <meta property="og:title" content="@yield('og_title', 'RAH Tours')" />
    <meta property="og:description" content="@yield('og_description', 'Find top-rated tours and activities in Dubai with RAH Tourism one of the best leading destination management companies in Dubai that deliver the highest quality standards of service, offering experiences in which every detail has been taken care of for our guests to be able to live in a unique way the soul of our destinations. We invite our guests to breathe the fun and the excitement of a new adventure in the same way that they can enjoy the peace of the calm nature.')" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:type" content="website" />
    
    <meta name="keywords" content="@yield('keywords')">

    <meta name="google-site-verification" content="2qpWNOZ6MPUXBZnmbr1Mh5L7yhvKsHj14YrYOi_m-oc" />

    <link rel="canonical" href="{{ url()->current() }}">

    @if(count(request()->segments()) == 0)
        <title>Book Things To Do, Experiences, and Activities in Dubai</title>
    @else
        @if(getMetaTitle())
            <title>@yield('title', getMetaTitle())</title>
        @else
            <title>@yield('title', getPageName())</title>
        @endif
    @endif

    @if(getMetaDescription())
        <meta name="description" content="@yield('meta_description', getMetaDescription())"/>
    @else
        <meta name="description" content="@yield('meta_description', 'Find top-rated tours and activities in Dubai with RAH Tourism one of the best leading destination management companies in Dubai that deliver the highest quality standards of service, offering experiences in which every detail has been taken care of for our guests to be able to live in a unique way the soul of our destinations. We invite our guests to breathe the fun and the excitement of a new adventure in the same way that they can enjoy the peace of the calm nature.')"/>
    @endif
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YVF7S8YTPJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YVF7S8YTPJ');
    </script>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    <style>

        .card{
            border-radius: 0.5rem !important;
        }
        p{
            font-size: 0.85rem
        }
    </style>
    @yield('styles')

</head>
{{-- <body class="font-sans antialiased dark:bg-black dark:text-white/50"> --}}
<body class="font-sans antialiased">
    <div class="nav light-nav">
        @include('components.navbar')
    </div>
    @if (count(request()->segments()) != 2 && request()->segment(count(request()->segments())) !== 'dubai-activities')
        <div class="nav2 hidden md:block">
            @include('components.navbar2')
        </div>
    @endif
    {{-- WHITE SPACE BELOW SECOND NAV --}}
    <div class="hidden" id="below-nav-space" style="margin-top: 55px"></div>

    <main @if(request()->is('*checkout*')) style="background-color: #f1f1f1" @endif>
        @if(count(request()->segments()) == 0)
            @include('components.hero-section')
        @endif
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100">
        @include('components.footer')
    </footer>


    @include('components.auth.login-dialog')
    @include('components.auth.signup-dialog')
    @include('components.auth.forgot-password-dialog')
    <script src="{{ asset('assets/script.js') }}"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    
    <script>
        function setInnerText(id, message) {
            var element = document.getElementById(id);
            if (element) {
                element.innerHTML = message;
                element.classList.remove('hidden');
            }
        }

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtons = document.querySelectorAll('[role="button"]');
            if(closeButtons){
                closeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        this.closest('[role="alert"]').remove();
                    });
                });
            }
        });
    </script>

    <script>
        // Define your placeholder text array
        const placeholderLines = ["Search your activities or destinations"];
        let currentLineIndex = 0;
        let placeholderText = '';
        let typingSpeed = 100;  // Adjust typing speed
        let delayBetweenLines = 2000;  // Adjust delay between typing loops
        let currentIndex = 0;  // Tracks the index of the character being typed

        // Grab the input field element
        const searchInput = document.getElementById('search');

        function typePlaceholder() {
            if (currentIndex < placeholderLines[currentLineIndex].length) {
                // Append the next character to the placeholder
                placeholderText += placeholderLines[currentLineIndex][currentIndex];
                searchInput.setAttribute('placeholder', placeholderText);
                currentIndex++;
                setTimeout(typePlaceholder, typingSpeed); // Recursively call until full line is typed
            } else {
                // Once the line is fully typed, reset after a delay
                setTimeout(() => {
                    placeholderText = '';
                    currentIndex = 0;
                    searchInput.setAttribute('placeholder', '');
                    typePlaceholder();
                }, delayBetweenLines);
            }
        }

        // Call the function to start typing
        typePlaceholder();
    </script>

    @yield('scripts')
</body>
</html>
