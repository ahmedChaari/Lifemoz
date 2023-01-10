@extends('layouts.app')
@section('content')
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                {{ __('Register') }}
            </h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

            <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
            <div class="intro-x mt-8">
                <input type="text" name="name" id="name" class="intro-x login__input form-control py-3 px-4 block @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input type="email" name="email" id="email" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input id="password" type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                <input id="password-confirm" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Register</button>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top" >Sign in</a>
            </div>
        </form>
        </div>
    </div>
                <!-- END: Register
                    <div class="intro-x flex items-center text-slate-600 dark:text-slate-500 mt-4 text-xs sm:text-sm">
                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                <label class="cursor-pointer select-none" for="remember-me">I agree to the Envato</label>
                <a class="text-primary dark:text-slate-200 ml-1" href="">Privacy Policy</a>.
            </div>
                    Form -->
@endsection
