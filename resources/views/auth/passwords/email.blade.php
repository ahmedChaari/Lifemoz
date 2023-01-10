@extends('layouts.app')

@section('content')






            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">

                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                        {{ __('Reset Password') }}
                    </h2>
                    <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account.</div>

                    <div class="intro-x mt-8">
                        <input id="email" type="email"  class="intro-x login__input form-control py-3 px-4 block" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top"
                        style="width: 21rem !important"
                        > {{ __('Send Password Reset Link') }}</button>

                    </div>

                </form>
                </div>

            </div>












@endsection
