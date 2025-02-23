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
        <link href="{{ asset('dist/images/logo-white.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Enigma admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Enigma Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Calander') }}</title>

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Latest compiled and minified CSS -->
        <!-- BEGIN: CSS Assets-->


        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <div>

                        <a href="" class="-intro-x flex items-center pt-5">
                            <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.png') }}">
                            <span class="text-white text-lg ml-3"> MindCom </span>
                        </a>
                    </div>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/logo-white.png') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Gérer votre stock.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">
                            Stock en un seul endroit</div>
                    </div>
                </div>


                    <!-- END: Login Info -->
                    <!-- BEGIN: Login Form -->
                    @yield('content')
                    <!-- END: Login Form -->

            </div>
        </div>


        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- END: JS Assets-->
    </body>
</html>
