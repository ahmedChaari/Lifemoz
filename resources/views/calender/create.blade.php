@extends('layouts.menu')

@section('content')


 <!-- BEGIN: Content -->
 <div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Calendar
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

            <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#new-order-modal" class="btn btn-primary shadow-md mr-2">Nouvel évènement</a>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="share-2" class="w-4 h-4 mr-2"></i> Share </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-12">
            <div class="box p-5">
                <div class="full-calendar" id="calendar"></div>
            </div>
        </div>
        <!-- END: Calendar Content -->
        <!-- BEGIN: New Order Modal -->
        <div id="new-order-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">
                            Nouvel évènement
                        </h2>
                    </div>
                    <div id="form-validation" class="p-5">
                        <div class="preview">
                            <form class="" action="{{route('calender.store')}}"  method="POST" >
                                @csrf
                                <div class="input-form">
                                    <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                                    <input id="validation-form-1" type="text" name="name"

                                    class="form-control" placeholder="Name" minlength="2" required>
                                    @error('name')
                                    <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Date Debut
                                        <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, date format</span> </label>
                                    <input id="validation-form-2" type="date" name="start"

                                    class="form-control" placeholder="MM/DD/YY" required>
                                    @error('start')
                                    <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Date Fin
                                        <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, date format</span> </label>
                                    <input id="validation-form-3" type="date" name="end"

                                    class="form-control"  placeholder="MM/DD/YY"  minlength="6" required>
                                    @error('end')
                                    <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-form mt-3">
                                    <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row"> Description<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 10 characters</span> </label>
                                    <input id="validation-form-3" type="text" name="description"
                                    class="form-control"
                                    placeholder="Description"  minlength="6">
                                    @error('description')
                                    <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: New Order Modal -->
    </div>
</div>
<!-- END: Content -->


@endsection
