@extends('layouts.app')
@section('content')
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->

                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">

                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Identification
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account.</div>

                        <div class="intro-x mt-8">
                            <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 block
                             @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="E-mail" autofocus>
                            @error('email')
                            <span class="invalid-feedback alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input name="remember" id="remember" type="checkbox" class="form-check-input border mr-2" {{ old('remember') ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none" for="remember-me">{{ __('Se souvenir de moi') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                        @endif
                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">

                            <div class="d-grid gap-2 d-md-block">

                                <button type="submit" class="btn btn-primary py-3 px-4 w-full align-top">Se connecter</button> <br>
                                <a href="{{ route('company') }}" class="btn btn-outline-success py-3 px-4 w-full align-top mt-2">Créer votre Entreprise</a>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>

                <!-- END: Login Form -->
@endsection
