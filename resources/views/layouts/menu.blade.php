<!DOCTYPE html>
<!--
Template Name: Enigma - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="fr" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
         <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <title>{{ config('app.name', 'Calander') }}</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <div class="scrollable">
                <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
                <ul class="scrollable__content py-2">
                    <li>
                        <a href="javascript:;" class="menu">
                            <div class="menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                        </a>
                    </li>



                    <li>
                        <a href="side-menu-light-post.html" class="menu">
                            <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="menu__title"> List Evénement </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-light-calendar.html" href="{{ route('register') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="menu__title"> Calendar </div>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
        <!-- END: Mobile Menu -->
        <!-- BEGIN: Top Bar -->
        <div class="top-bar-boxed h-[70px] md:h-[65px] z-[51] border-b border-white/[0.08] mt-12 md:mt-0 -mx-3 sm:-mx-8 md:-mx-0 px-3 md:border-b-0 relative md:fixed md:inset-x-0 md:top-0 sm:px-8 md:px-10 md:pt-10 md:bg-gradient-to-b md:from-slate-100 md:to-transparent dark:md:from-darkmode-700">
            <div class="h-full flex items-center">
                <!-- BEGIN: Logo -->
                <a href="" class="logo -intro-x hidden md:flex xl:w-[180px] block">
                    <img alt="Midone - HTML Admin Template" class="logo__image w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="logo__text text-white text-lg ml-3"> Enigma </span>
                </a>
                <!-- END: Logo -->
                <!-- BEGIN: Breadcrumb -->
                <nav aria-label="breadcrumb" class="-intro-x h-[45px] mr-auto">
                    <ol class="breadcrumb breadcrumb-light">
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Search -->
                <div class="intro-x relative mr-3 sm:mr-6">
                    <div class="search hidden sm:block">
                        <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                        <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
                    </div>
                    <a class="notification notification--light sm:hidden" href=""> <i data-lucide="search" class="notification__icon dark:text-slate-500"></i> </a>
                    <div class="search-result">

                    </div>
                </div>
                <!-- END: Search -->

                <!-- BEGIN: Account Menu -->
                <div class="intro-x dropdown w-8 h-8">
                    <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <img alt="Midone - HTML Admin Template" src="{{ asset('dist/images/profile-10.jpg') }}">
                    </div>
                    <div class="dropdown-menu w-56">
                        <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                            <li class="p-2">
                                <div class="font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">Frontend Engineer</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a class="dropdown-item hover:bg-white/5" href="{{ route('user.editTest', Auth::user()->id) }}">
                                <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="help-circle" class="w-4 h-4 mr-2"></i> Help </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider border-white/[0.08]">
                            </li>
                            <li>
                                <a class="dropdown-item hover:bg-white/5" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i>
                                    {{ __('Logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Account Menu -->
            </div>
        </div>
        <!-- END: Top Bar -->
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <ul>
                    <li>
                        <a href="javascript:;" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Dashboard
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>

                    </li>
                    <li>
                        <a href="{{ route('calender.list') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                            <div class="side-menu__title"> List Evénement </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('calender.create') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                            <div class="side-menu__title"> Calendar </div>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">

                @yield('content')
            </div>
            <!-- END: Content -->
        </div>


        @yield('scripts')
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
