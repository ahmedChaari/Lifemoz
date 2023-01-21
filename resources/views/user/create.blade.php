@extends('layouts.menu')
@section('content')


     <!-- BEGIN: New Order Modal -->

        <div class="modal-dialog mt-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        New user
                    </h2>
                </div>
                <div id="form-validation" class="p-5">
                    <div class="preview">
                        <form class="" action="{{route('user.create')}}"   method="POST" >
                            @csrf
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                                <input id="name" type="text" name="name"

                                class="form-control" placeholder="Name" minlength="2" required>
                                @error('name')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span> </label>
                                <input id="email" type="email" name="email"

                                class="form-control" placeholder="email" minlength="2" required>
                                @error('email')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Tel <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, Tel format</span> </label>
                                <input id="tel" type="text" name="tel"

                                class="form-control" placeholder="0 XX XX XX XX" minlength="2" required>
                                @error('tel')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Fonction <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                                <input id="fonction" type="text" name="fonction"

                                class="form-control" placeholder="Fonction Occupée" minlength="2" required>
                                @error('fonction')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Service <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, Service</span> </label>
                                <select class="form-select mt-2 sm:mr-2" name="service" aria-label="Default select example">
                                        <option value="" selected disabled>--------</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}"
                                        @if(isset($user))
                                            @if ($service->id == $user->service_id) selected
                                            @endif
                                        @endif >{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Role <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, Role</span> </label>
                                <select class="form-select mt-2 sm:mr-2" name="role" aria-label="Default select example">
                                        <option value="" selected disabled>--------</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                        @if(isset($user))
                                            @if ($role->id == $user->role_id) selected
                                            @endif
                                        @endif >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('service')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span> </label>
                                <input id="validation-form-3"
                                type="password" name="password" class="form-control" placeholder="secret" minlength="6" required>
                                @error('password')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <!--   conferm password -->
                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Confirm Password
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 6 characters</span> </label>
                                <input id="password-confirm" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                                placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- END: New Order Modal -->


@endsection
