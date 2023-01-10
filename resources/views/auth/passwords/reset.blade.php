@extends('layouts.app')

@section('content')
<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            {{ __('Reset Password') }}
        </h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
        <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
        <div class="intro-x mt-8">
            <input type="text" name="email" value="{{ $email ?? old('email') }}" id="email" class="intro-x login__input form-control py-3 px-4 block @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <input id="password-confirm" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"> {{ __('Reset Password') }}</button>
        </div>
    </form>
    </div>
</div>
@endsection
