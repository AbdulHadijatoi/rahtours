
<div class="navbar mx-auto px-5 md:px-0 sm:max-w-xl md:max-w-full lg:max-w-screen-xl">
    <i class='bx bx-menu'></i>
    <div class="w-auto md:w-2/6">
        <div class="logo mr-0 md:mr-6">
            <a href="{{ url('/') }}">
                <img width="90px" src="{{ asset(settings()->logo) }}" alt="logo" />
            </a>
        </div>
        <form class="md:flex items-center bg-gray-100 rounded-full shadow-inner px-4 h-9 hidden w-full" action="{{ route('search.index') }}">
            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17.65 10.3a7.35 7.35 0 11-14.7 0 7.35 7.35 0 0114.7 0z"/>
            </svg>
           <input id="search" 
                onkeydown="if (event.key === 'Enter') { this.form.submit(); event.preventDefault(); }"
                class="ml-2 w-full bg-transparent outline-none border-none focus:outline-none focus:ring-0 text-xs" 
                type="text" 
                placeholder="Search your activities or experiences" />

        </form>
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
                        <a href="https://wa.me/+971503773786" target="_blank" class="cursor-pointer transition hover-text-secondary border-transparent flex items-center hover-fill-secondary">
                            <svg class="w-5 mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M3.50002 12C3.50002 7.30558 7.3056 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C10.3278 20.5 8.77127 20.0182 7.45798 19.1861C7.21357 19.0313 6.91408 18.9899 6.63684 19.0726L3.75769 19.9319L4.84173 17.3953C4.96986 17.0955 4.94379 16.7521 4.77187 16.4751C3.9657 15.176 3.50002 13.6439 3.50002 12ZM12 1.5C6.20103 1.5 1.50002 6.20101 1.50002 12C1.50002 13.8381 1.97316 15.5683 2.80465 17.0727L1.08047 21.107C0.928048 21.4637 0.99561 21.8763 1.25382 22.1657C1.51203 22.4552 1.91432 22.5692 2.28599 22.4582L6.78541 21.1155C8.32245 21.9965 10.1037 22.5 12 22.5C17.799 22.5 22.5 17.799 22.5 12C22.5 6.20101 17.799 1.5 12 1.5ZM14.2925 14.1824L12.9783 15.1081C12.3628 14.7575 11.6823 14.2681 10.9997 13.5855C10.2901 12.8759 9.76402 12.1433 9.37612 11.4713L10.2113 10.7624C10.5697 10.4582 10.6678 9.94533 10.447 9.53028L9.38284 7.53028C9.23954 7.26097 8.98116 7.0718 8.68115 7.01654C8.38113 6.96129 8.07231 7.046 7.84247 7.24659L7.52696 7.52195C6.76823 8.18414 6.3195 9.2723 6.69141 10.3741C7.07698 11.5163 7.89983 13.314 9.58552 14.9997C11.3991 16.8133 13.2413 17.5275 14.3186 17.8049C15.1866 18.0283 16.008 17.7288 16.5868 17.2572L17.1783 16.7752C17.4313 16.5691 17.5678 16.2524 17.544 15.9269C17.5201 15.6014 17.3389 15.308 17.0585 15.1409L15.3802 14.1409C15.0412 13.939 14.6152 13.9552 14.2925 14.1824Z" fill="#000"></path> </g></svg>
                            <span>Chat with an expert</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('help') }}" class="transition hover-text-secondary border-transparent {{ isActive('help') ? 'text-secondary' : '' }}">
                            Help
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('wish-list') }}" class="relative inline-block transition hover:text-secondary border-transparent {{ isActive('wish-list') ? 'text-secondary' : '' }}">
                            Wish List
                            @if(getWishlistCount()>0)
                                <div class="absolute top-0 right-0 mt-[-5px] md:mt-[-10px] mr-[-10px] bg-secondary2 text-white text-xs font-semibold px-2 rounded-full">
                                    {{ getWishlistCount() }}
                                </div>
                            @endif
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('cart') }}" class="relative transition hover-text-secondary border-transparent {{ isActive('cart') ? 'text-secondary' : '' }}">
                            Cart
                            @if(getCartItemsCount()>0)
                                <div class="absolute top-0 right-0 mt-[-5px] md:mt-[-10px] mr-[-10px] bg-secondary2 text-white text-xs font-semibold px-2 rounded-full">
                                    {{ getCartItemsCount() }}
                                </div>
                            @endif
                        </a>
                    </li>

                    <li class="hidden md:block">
                        @include('components.recently-viewed')
                    </li>

                    
                    @auth
                    <li>
                        <div class="flex items-center justify-center">

                                @if(auth()->user()->profile_image)
                                    <div class="w-8 h-8 border p-1 rounded-full mr-2 bg-cover bg-center" style="background-image: url('{{ url(auth()->user()->profile_pic_url) }}')"></div
                                @else
                                    <svg class="w-8 h-8 border border-gray-500 p-1 rounded-full mr-2" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>profile_round [#1342]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -2159.000000)" fill="#000000"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M100.562548,2016.99998 L87.4381713,2016.99998 C86.7317804,2016.99998 86.2101535,2016.30298 86.4765813,2015.66198 C87.7127655,2012.69798 90.6169306,2010.99998 93.9998492,2010.99998 C97.3837885,2010.99998 100.287954,2012.69798 101.524138,2015.66198 C101.790566,2016.30298 101.268939,2016.99998 100.562548,2016.99998 M89.9166645,2004.99998 C89.9166645,2002.79398 91.7489936,2000.99998 93.9998492,2000.99998 C96.2517256,2000.99998 98.0830339,2002.79398 98.0830339,2004.99998 C98.0830339,2007.20598 96.2517256,2008.99998 93.9998492,2008.99998 C91.7489936,2008.99998 89.9166645,2007.20598 89.9166645,2004.99998 M103.955674,2016.63598 C103.213556,2013.27698 100.892265,2010.79798 97.837022,2009.67298 C99.4560048,2008.39598 100.400241,2006.33098 100.053171,2004.06998 C99.6509769,2001.44698 97.4235996,1999.34798 94.7348224,1999.04198 C91.0232075,1998.61898 87.8750721,2001.44898 87.8750721,2004.99998 C87.8750721,2006.88998 88.7692896,2008.57398 90.1636971,2009.67298 C87.1074334,2010.79798 84.7871636,2013.27698 84.044024,2016.63598 C83.7745338,2017.85698 84.7789973,2018.99998 86.0539717,2018.99998 L101.945727,2018.99998 C103.221722,2018.99998 104.226185,2017.85698 103.955674,2016.63598" id="profile_round-[#1342]"> </path> </g> </g> </g> </g></svg>
                                @endif
                            <a>{{ auth()->user()->first_name }}</a>
                        </div>
                        <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                        <ul class="htmlCss-sub-menu sub-menu bg-white" style="z-index: 20;">
                            <li>
                                <a class="transition hover-text-secondary border-transparent" href="{{ url('manage-profile') }}">Manage Profile</a>
                            </li>
                            <li>
                                <a class="transition hover-text-secondary border-transparent" href="{{ url('/bookings') }}">Booking</a>
                            </li>
                            <li>
                                <a class="transition hover-text-secondary border-transparent" href="{{ url('/history') }}">History</a>
                            </li>
                            <li>
                                <a class="transition hover-text-secondary border-transparent" href="{{ route('logout') }}">logout</a>
                            </li>
                        </ul>
                    </li>    
                    
                    @else 
                        <li>
                            <button class="btn rounded-full btn-accent px-5 text-white text-xs btn-sm" type="button" style="background-color: #ee8e3b" onclick="openLogin();">Login</button>
                        </li>
                    @endauth
                {{-- @endforeach
            @endif --}}

            
        </ul>
    </div>
</div>