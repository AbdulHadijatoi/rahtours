
<div class="navbar mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
    <i class='bx bx-menu'></i>
    <div class="w-auto md:w-2/6">
        <div class="logo mr-0 md:mr-6">
            <a href="{{ url('/') }}">
                <img width="90px" src="{{ asset(settings()->logo) }}" alt="logo" />
            </a>
        </div>
        <div class="md:flex items-center bg-gray-100 rounded-full shadow-inner px-4 h-9 hidden w-full">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17.65 10.3a7.35 7.35 0 11-14.7 0 7.35 7.35 0 0114.7 0z"/>
            </svg>
            <input class="ml-2 w-full bg-transparent outline-none border-none focus:outline-none focus:ring-0 text-xs" type="text" placeholder="Search your activities or destinations">
        </div>
    </div>
    <div class="nav-links relative">
        <div class="sidebar-logo absolute top-5 right-5">
            {{-- <span class="logo-name">
            <a href="{{ url('/') }}"><img width="70px" src="{{ url(settings()->logo) }}" alt="logo" /></a>
            </span> --}}
            <i class='bx bx-x'></i>
        </div>
        <ul class="links">
            {{-- @if(getMenu())
                @foreach (getMenu() as $menu) --}}
               

                    <li>
                        <a class="cursor-pointer transition hover-text-secondary border-transparent">
                            Chat with an expert
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('help') }}" class="transition hover-text-secondary border-transparent {{ isActive('help') ? 'text-secondary' : '' }}">
                            Help
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('wish-list') }}" class="transition hover-text-secondary border-transparent {{ isActive('wish-list') ? 'text-secondary' : '' }}">
                            Wish List
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('cart') }}" class="transition hover-text-secondary border-transparent {{ isActive('cart') ? 'text-secondary' : '' }}">
                            Cart
                        </a>
                    </li>

                    <li>
                        {{-- <a class="cursor-pointer transition hover-text-secondary border-transparent">
                            Recently Viewed
                        </a> --}}
                        <div class="dropdown">
                            <a tabindex="0" role="button" class="transition hover-text-secondary border-transparent">Recently Viewed</a>
                            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                                <li><a>Item 1</a></li>
                                <li><a>Item 2</a></li>
                            </ul>
                        </div>
                    </li>

                    
                    @auth    
                    <li>
                        <a href="{{ url('manage-profile') }}" class="cursor-pointer transition hover-text-secondary border-transparent {{ isActive('cart') ? 'text-secondary' : '' }}">
                            Manage Profile
                        </a>
                    </li>
                    @else 
                        <li>
                            <button class="btn rounded-full btn-accent px-5 text-white text-xs btn-sm" style="background-color: #ee8e3b">Login</button>
                        </li>
                    @endauth
                {{-- @endforeach
            @endif --}}

            {{-- <li>
                <a href="#">HTML & CSS</a>
                <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                <ul class="htmlCss-sub-menu sub-menu">
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Login Forms</a></li>
                    <li><a href="#">Card Design</a></li>
                    <li class="more">
                        <span><a href="#">More</a>
                            <i class='bx bxs-chevron-right arrow more-arrow'></i>
                        </span>
                        <ul class="more-sub-menu sub-menu">
                            <li><a href="#">Neumorphism</a></li>
                            <li><a href="#">Pre-loader</a></li>
                            <li><a href="#">Glassmorphism</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>