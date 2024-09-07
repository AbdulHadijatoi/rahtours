
<div class="navbar mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
    <i class='bx bx-menu'></i>
    <div class="logo"><a href="{{ url('/') }}">
        <img width="140px" src="{{ asset('assets/images/logo.png') }}" alt="logo" />
    </a></div>
    <div class="nav-links">
        <div class="sidebar-logo">
            <span class="logo-name">
            <a href="#"><img width="100px" src="{{ asset('assets/images/logo.png') }}" alt="logo" /></a>
            </span>
            <i class='bx bx-x'></i>
        </div>
        <ul class="links">
            @if(getMenu())
                @foreach (getMenu() as $menu)
                    <li><a href="{{ url($menu->slug) }}" class="text-gray-700 transition hover-text-secondary hover-border-secondary border-transparent border-b-2 {{ isActive($menu->slug) ? 'text-secondary border-secondary' : '' }}">{{ $menu->name }}</a></li>
                @endforeach
            @endif

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
    <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box rounded">
            <input class="focus:border-red focus:outline-none focus:shadow-outline" type="text" placeholder="Search...">

            <p class="mt-4 text-lg font-medium text-gray-900">Our Services</p>

            <ul class="mt-3 space-y-4 text-sm">
                @if(getMenu(2))
                    @foreach (getMenu(2) as $menu)
                        <li>
                            <a class="text-gray-700 transition hover-text-secondary {{ isActive($menu->slug) ? 'text-secondary' : '' }}" href="{{ url($menu->slug) }}">
                                {{ $menu->name }} 
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>