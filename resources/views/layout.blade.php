<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/font/fontawesome-free-6.2.0-web/css/all.css') }}">
    @yield('css')
    @vite('resources/css/tailwind.css')

    @yield('title')
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader bg-color-main">
            <img src="{{ asset('asset/img/loader.gif') }}" alt="" class="w-96">
        </div>
    </div>
    <header
        class="
        z-50
        h-20
        flex justify-between items-center
        px-4 lg:px-20 py-4 bg-black
        bg-gradient-to-r
        from-black
        bg-opacity-0
        backdrop-blur-sm
        fixed
        top-0
        left-0
        w-full
        max-w-full
        ">
        <div>
            <a href="{{ route('home') }}">
                <img src=" {{ asset('asset/img/logo.png') }}" alt="" class="w-32 md:w-40">
            </a>
        </div>

        <nav class="hidden lg:block">
            <ul id="header-nav"
                class="
            flex
            text-white
            list-none
            text-xl
            items-center
            ">
                <li class=" ml-6 block  parent">
                    <div class="">
                        <a href="{{ route('home') }}"
                            class="parent:hover:text-white transition duration-500 font-bold">Home </a>
                    </div>
                </li>
                <li class=" ml-6 block  parent">
                    <div class="relative nav-tag">
                        <a href="# " class="parent:hover:text-white transition duration-500 font-bold">Type
                        </a><span class="leading-relaxed transform -translate-y-1 inline-block"><i
                                class="fa-sharp fa-solid fa-sort-down"></i></span>

                        <div class="nav-tag-content">
                            <ul id="type-film">

                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" ml-6 block  parent">
                    <div class="relative nav-tag">
                        <a href="{{ route('single') }}"
                            class="parent:hover:text-white transition duration-500 font-bold">Feature Movie</a>

                    </div>
                </li>
                <li class=" ml-6 block  parent">
                    <div class="relative nav-tag">
                        <a href="{{ route('series') }}"
                            class="parent:hover:text-white transition duration-500 font-bold">TV series</a>
                    </div>
                </li>

            </ul>
        </nav>

        <div class="flex justify-center h-20 items-center text-xl text-white relative">
            <div id="header-search" class="parent mr-4 items-center h-20 cursor-pointer relative flex">
                <i class="fas fa-search only-child-hover"></i>
                <form id="header-search-form"
                    class="transition-all flex absolute top-full right-0 transform animate-bottomIn">
                    <input type="text" class="bg-black p-1 inline-block outline-none text-slate-300 text-sm"
                        placeholder="Search...">

                    <button class="bg-red-600 inline-block w-10 h-10"><i class="fas fa-search"></i></button>
                </form>
            </div>
            @if (!Session::get('client_id'))
                <div id="login" class="parent flex rounded-full  bg-black w-10 h-10">
                    <span class="block only-child-hover m-auto cursor-pointer">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <div id="login-direct"
                        class="animate-bottomIn transition-all absolute top-full right-0 w-auto bg-black">
                        <a href="{{ route('register') }}"
                            class="parent flex items-center pl-10 pr-40 justify-start py-4 text-sm under relative">
                            <i class="fa-solid fa-user-plus inline-block"></i> <span
                                class="block px-3 only-child-hover">Register</span>
                        </a>
                        <a href="{{ route('login') }}"
                            class="parent flex items-center pl-10 pr-40 justify-start py-4 text-sm">
                            <i class="fa-solid fa-arrow-right-to-bracket "></i> <span
                                class="block px-3 only-child-hover">Login</span>
                        </a>
                    </div>
                </div>
            @else
                <div id="user-auth" class="parent flex rounded-full w-10 h-10">
                    <div class="cursor-pointer user-select relative">
                        @php
                        @endphp
                        <img src="{{ asset('upload/avatars/' . Session::get('client_avatar')) }}" alt=""
                            class="rounded-full h-10 w-10">
                        <div
                            class="hidden user-action text-lg text-white absolute mt-2 p-2 top-full right-0 bg-black bg-opacity-40">
                            <div class="cursor-default user-info w-40 pt-2 pb-4">
                                <p class="w-full">{{ Session::get('client_username') }}</p>
                                <p class="text-sm"><i>{{ Session::get('client_email') }}</i></p>
                            </div>
                            <ul class="text-base">
                                <li>
                                    <a href="{{ route('userpage') }}">Setting Account</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/logout') }}">Log Out <span><i
                                                class="fa-solid fa-right-from-bracket"></i></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif



            <div id="show-nav-sm"
                class="text-white rounded-full bg-black h-10 w-10 text-center leading-10 mx-2 hover:text-red-600 lg:hidden">
                <span class="">
                    <i class="fa-sharp fa-solid fa-bars"></i>
                </span>
            </div>
        </div>

        <!-- nav on mobile -->
        <div id="nav-sm" class="hidden">
            <div class=" p-4">
                <img src="{{ asset('asset/img/logo.png') }}" alt="" class="w-4/6">
            </div>
            <ul id="header-nav"
                class="
            text-white
            list-none
            text-xl
            w-72
            p-4
            ">
                <li class=" ml-6 block parent">
                    <div class="py-2 under relative">
                        <div class="flex flex-row">
                            <a href="# " class="parent:hover:text-white transition duration-500 font-bold">Home
                            </a>
                        </div>
                        <div id="nav-tag-content-sm-1" class="pl-2 hidden">

                        </div>
                    </div>
                </li>
                <li class=" ml-6 block parent">
                    <div class="py-2 under relative">
                        <div class="flex flex-row">
                            <a href="# " class="parent:hover:text-white transition duration-500 font-bold">The
                                Loai </a>
                            <div class="ml-auto bg-red-600"><i id="nav-tag-sm-2" class="fa-solid fa-plus"></i></div>
                        </div>
                        <div id="nav-tag-content-sm-2" class="pl-2 hidden">
                            <ul id="type-film-mobile">

                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" ml-6 block parent">
                    <div class="py-2 under relative">
                        <div class="flex flex-row">
                            <a href="# " class="parent:hover:text-white transition duration-500 font-bold">Phim
                                Bo </a>
                        </div>

                    </div>
                </li>
                <li class=" ml-6 block parent">
                    <div class="py-2 under relative">
                        <div class="flex flex-row">
                            <a href="# " class="parent:hover:text-white transition duration-500 font-bold">TV
                                series </a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <div id="root" class="relative opacity-0">
        @yield('root')
    </div>

    <footer>
        <div class="p-8 lg:px-20 flex flex-col lg:flex-row text-white text-lg gap-8">
            <div class="w-full lg:w-1/4">
                <div class="flex flex-col pb-4">
                    <h2 class="text-xl font-semibold py-4 text-red-600">About Us</h2>
                    <p>This is movies web to help you relax in free time</p>
                </div>
                <div class="flex flex-col py-4">
                    <h2 class="text-xl font-semibold py-4 text-red-600">Contact Us</h2>
                    <p><i class="fa-solid fa-phone text-red-600 mr-2"></i> +84941.999.999</p>
                    <p><i class="fa-regular fa-envelope text-red-600 mr-2"></i> streamitforyou@gmail.com</p>

                </div>
            </div>
            <div class="w-full lg:w-1/4">
                <h2 class="text-red-600 text-xl font-bold py-2">Information Streamit</h2>
                <ul>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4">
                <h2 class="text-red-600 text-xl font-bold py-2">Information Streamit</h2>
                <ul>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                    <li class="py-2 hover:text-red-600"><a href="">This is anchor</a></li>
                </ul>
            </div>
            <div class="w-full lg:w-1/4">
                <div class="">
                    <a href="">
                        <img src="{{ asset('asset/img/logo.png') }}" alt="">
                    </a>
                </div>
                <hr class="my-2">
                <h2 class="text-red-600 text-xl font-bold py-2">Streamit App</h2>
                <div class="flex flex-row gap-4">
                    <div class="w-1/2">
                        <a href="#">
                            <img src="{{ asset('asset/img/appstore.png') }}" alt="">
                        </a>
                    </div>
                    <div class="w-1/2">
                        <a href="#">
                            <img src="{{ asset('asset/img/ggplay.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-center items-center text-white pb-4">
            <div class="">

                <a href="" class="text-3xl p-2 hover:text-red-600"><i class="fa-brands fa-facebook"></i></a>
                <a href="" class="text-3xl p-2 hover:text-red-600"><i class="fa-brands fa-google"></i></a>
                <a href="" class="text-3xl p-2 hover:text-red-600"><i class="fa-brands fa-github"></i></a>
                <a href="" class="text-3xl p-2 hover:text-red-600"><i class="fa-brands fa-twitter"></i></a>

            </div>
        </div>
    </footer>


    @yield('js')
    <script>
        $(window).load(() => {
            $('.loader').fadeOut(8000);
            setTimeout(() => {
                $('.loader-wrapper').hide();
                $('#root').removeClass('opacity-0')
            }, 8000);
        })
    </script>
   

</body>

</html>
