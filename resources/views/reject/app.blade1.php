<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>














<div class="intro-y col-span-12 lg:col-span-6">
    <!-- BEGIN: Input -->
    <div class="intro-y box">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">
            Mis à Jour Votre Profile
            </h2>
        </div>
        <div id="input" class="p-5">
            <div class="preview">
                <div>
                    <label for="regular-form-1" class="form-label">name </label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Nom">
                </div>
                 <!-- BEGIN: Daterange Picker -->
                 <div class="intro-y box mt-3">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Date Range Picker
                                </h2>
                            </div>
                            <div id="daterangepicker" class="p-5">
                                <div class="preview">
                                    <input type="text" data-daterange="true" class="datepicker form-control w-56 block mx-auto">
                                </div>
                                <div class="source-code hidden">
                                    <button data-target="#copy-daterangepicker" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                                    <div class="overflow-y-auto mt-3 rounded-md">
                                        <pre id="copy-daterangepicker" class="source-preview"> <code class="html"> HTMLOpenTaginput type=&quot;text&quot; data-daterange=&quot;true&quot; class=&quot;datepicker form-control w-56 block mx-auto&quot;HTMLCloseTag </code> </pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Daterange Picker -->
                <div class="mt-3">
                    <label for="regular-form-4" class="form-label">description</label>
                    <input id="regular-form-4" name="confirm_password" type="password" class="form-control" placeholder="confirm password">
                </div>
            </div>
            <div class="source-code hidden">
                <button data-target="#copy-input" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                <div class="overflow-y-auto mt-3 rounded-md">
                    <pre id="copy-input" class="source-preview"> <code class="html"> HTMLOpenTagdivHTMLCloseTag HTMLOpenTaglabel for=&quot;regular-form-1&quot; class=&quot;form-label&quot;HTMLCloseTagInput TextHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;regular-form-1&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Input text&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;regular-form-2&quot; class=&quot;form-label&quot;HTMLCloseTagRoundedHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;regular-form-2&quot; type=&quot;text&quot; class=&quot;form-control form-control-rounded&quot; placeholder=&quot;Rounded&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;regular-form-3&quot; class=&quot;form-label&quot;HTMLCloseTagWith HelpHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;regular-form-3&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;With help&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;form-help&quot;HTMLCloseTagLorem Ipsum is simply dummy text of the printing and typesetting industry.HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;regular-form-4&quot; class=&quot;form-label&quot;HTMLCloseTagPasswordHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;regular-form-4&quot; type=&quot;password&quot; class=&quot;form-control&quot; placeholder=&quot;Password&quot;HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;mt-3&quot;HTMLCloseTag HTMLOpenTaglabel for=&quot;regular-form-5&quot; class=&quot;form-label&quot;HTMLCloseTagDisabledHTMLOpenTag/labelHTMLCloseTag HTMLOpenTaginput id=&quot;regular-form-5&quot; type=&quot;text&quot; class=&quot;form-control&quot; placeholder=&quot;Disabled&quot; disabledHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Input -->
</div>