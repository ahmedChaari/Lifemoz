@extends('layouts.menu')
@section('content')

 <!-- BEGIN: Content -->
 <div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        LISTE DES UTILISATEURS
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('user.createViewUser')}}"  class="btn btn-primary shadow-md mr-2">AJOUTTER UN UTILISATEUR</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NOM PRENOM</th>
                        <th class="text-center whitespace-nowrap">SERVICE / FONCTION</th>
                        <th class="text-center whitespace-nowrap">TEL</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0 )
                    @foreach($users as $user)
                    <tr class="intro-x">
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">{{ $user->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $user->email }}</div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $user->service->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $user->fonction }}</div>
                        </td>
                        <td class="text-center">{{ $user->tel }}</td>
                        <td class="w-40">
                            @if ($user->active == false)

                                <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                            @else
                                <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('user.edit', $user->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des utilisateur</h3>
                    @endif
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
        <!-- END: Data List -->
    </div>
   </div>
  <!-- END: Content -->




 <!-- BEGIN: Modal Toggle -->
 <!-- BEGIN: Modal Content -->
 <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <div class="dropdown sm:hidden"> <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                     <div class="dropdown-menu w-40">
                         <ul class="dropdown-content">
                             <li> <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Docs </a> </li>
                         </ul>
                     </div>
                 </div>
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->

                <div class="modal-body mt-3"> <label>Activer</label>
                    <div class="mt-2">
                        <div class="form-check form-switch">
                            <input id="checkbox-switch-7" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="checkbox-switch-7">Activer le compte d'un utilisateur</label>
                        </div>
                    </div>
                </div>
              <!-- END: Modal Body -->
             <!-- BEGIN: Modal Footer -->
             <div class="modal-footer">
                <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>
                <button type="button" class="btn btn-primary w-20">Send</button> </div> <!-- END: Modal Footer -->
         </div>
     </div>
 </div> <!-- END: Modal Content -->













@endsection
