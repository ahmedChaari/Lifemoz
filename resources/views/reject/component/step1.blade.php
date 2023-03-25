



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





<!-- BEGIN: Content -->
<div  style="padding-top: 0rem;">

    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn btn-primary">1</button>
                <div class="lg:w-32 font-medium text-base lg:mt-3 ml-3 lg:mx-auto">Créer un Nouveau Compte</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">2</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Configurez Votre Profil</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">3</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Configurez les détails de votre Entreprise</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">4</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Configurer le Compte</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <button class="w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400">5</button>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Finalisez Votre Compte</div>
            </div>
        </div>
        <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
            <div class="font-medium text-base">Créer un Nouveau Compte</div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-1" class="form-label">Nom de société</label>
                    <input id="input-wizard-1" type="text" class="form-control" placeholder="Nom de société">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-2" class="form-label">Secteur d'activité</label>
                    <input id="input-wizard-2" type="text" class="form-control" placeholder="Secteur d'activité">
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="input-wizard-3" class="form-label">Date du Création</label>
                    <input type="text"  id="input-wizard-3" class="datepicker form-control" data-single-mode="true">
                </div>
                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button class="btn btn-primary w-24 ml-2">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Wizard Layout -->
</div>
<!-- END: Content -->




            </div>
        </div>


        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- END: JS Assets-->
    </body>
</html>
