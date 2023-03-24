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



        @livewireStyles
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <link href="{{ asset('css/company.css') }}" rel="stylesheet" id="bootstrap-css">



        <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon">
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

                <!-- BEGIN: Login Info -->

                <div>
                    <a href="{{ route('login') }}" class="-intro-x flex items-center pt-5">
                        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.png') }}">
                        <span class="text-white text-lg ml-3"> MindCom </span>
                    </a>
                </div>

                    <!-- END: Login Info -->
                    <!-- BEGIN: Login Form -->
                    <livewire:company />
                    <!-- END: Login Form -->


        </div>

        @livewireScripts
        <!-- BEGIN: JS Assets-->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

        <!-- END: JS Assets-->
    </body>
</html>
