@extends('layouts.menu')
@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Form Validation -->
      <form class="" action="{{ route('user.updateUserList' , $user) }}" enctype="multipart/form-data" method="POST" >
                            @csrf
                            @method('PUT')
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    Mettre à jour
                </h2>
                   <!--   checkbox-switch -->
                   <div class="mt-3" style="float: right;"> <label>Activer Compte</label>
                    <div class="mt-2">
                        <div class="form-check form-switch"> <input id="checkbox-switch-7" class="form-check-input"
                            type="checkbox"
                            name="active" value="1" {{ $user->active == true ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>
                <!--   end checkbox-switch -->
            </div>
            <div id="form-validation" class="p-5">
                <div class="preview">
                    <!-- BEGIN: Validation Form -->

                        <div class="input-form">
                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 2 characters</span> </label>
                            <input id="validation-form-1"
                            id="fullName" name="fullName" value="{{ $user->fullName }}"
                            type="text" class="form-control" placeholder="John Legend" minlength="2" required>
                            @error('fullName')
                            <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-form mt-3">
                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span> </label>
                            <input id="validation-form-2"  value="{{ $user->email }}"
                            type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                            @error('email')
                            <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-form mt-3">
                            <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Tel <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email address format</span> </label>
                            <input id="validation-form-2"  value="{{ $user->tel }}"
                                type="text" name="tel" class="form-control" placeholder="0 XX XX XX XX" minlength="2" required>
                            @error('tel')
                            <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-form mt-3">
                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                Fonction <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                            <input id="fonction" type="text" name="fonction"  value="{{ $user->fonction }}"

                            class="form-control" placeholder="Fonction Occupée" minlength="2" required>
                            @error('fonction')
                            <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-form mt-3">
                            <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                Service <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, Service</span> </label>
                            <select class="form-select mt-2 sm:mr-2" name="service_id"
                            aria-label="Default select example" value="">
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
                            <select class="form-select mt-2 sm:mr-2" name="role_id"
                            aria-label="Default select example">
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
                        <button type="submit" class="btn btn-primary mt-5">Register</button>
                    <!-- END: Validation Form -->
                    <!-- BEGIN: Success Notification Content -->
                    <div id="success-notification-content" class="toastify-content hidden flex" >
                        <i class="text-success" data-lucide="check-circle"></i>
                        <div class="ml-4 mr-4">
                            <div class="font-medium">Registration success!</div>
                            <div class="text-slate-500 mt-1"> Please check your e-mail for further info! </div>
                        </div>
                    </div>
                    <!-- END: Success Notification Content -->
                    <!-- BEGIN: Failed Notification Content -->
                    <div id="failed-notification-content" class="toastify-content hidden flex" >
                        <i class="text-danger" data-lucide="x-circle"></i>
                        <div class="ml-4 mr-4">
                            <div class="font-medium">Registration failed!</div>
                            <div class="text-slate-500 mt-1"> Please check the fileld form. </div>
                        </div>
                    </div>
                    <!-- END: Failed Notification Content -->
                </div>
                <div class="source-code hidden">
                    <button data-target="#copy-form-validation" class="copy-code btn py-1 px-2 btn-outline-secondary"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Copy example code </button>
                    <div class="overflow-y-auto mt-3 rounded-md">
                        <pre id="copy-form-validation" class="source-preview"> <code class="html"></code> </pre>
                    </div>
                </div>
            </div>

        </div>
     </form>
        <!-- END: Form Validation -->
    </div>
</div>
@endsection
