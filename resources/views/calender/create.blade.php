@extends('layouts.menu')

@section('content')


 <!-- BEGIN: Content -->
 <div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Calendar
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="btn btn-primary shadow-md mr-2">Print Schedule</button>
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
    </div>
</div>
<!-- END: Content -->


@endsection
