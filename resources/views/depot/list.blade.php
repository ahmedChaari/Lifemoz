@extends('layouts.menu')
@section('content')


<div class="content" style="padding-top: 0rem;">
    <h2 class="intro-y text-lg font-medium mt-10">
        LIST DES DEPOT
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;"  class="btn btn-primary shadow-md mr-2"
            data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview-depot"
            title="Ajouter un Depot"
            >AJOUTTER DEPOT</a>
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
                        <th class="whitespace-nowrap">DEPOT</th>
                        <th class="text-center whitespace-nowrap">DATE DE CREATION</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($depots->count() > 0 )
                    @foreach($depots as $depot)
                    <tr class="intro-x">
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap"> {{ $depot->name }}</a>
                        </td>
                        <td class="text-center">{{ $depot->created_at }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                
                                    <div class="text-center"> 
                                        <a href="javascript:;" data-tw-toggle="modal" 
                                        data-tw-target="#overlapping-modal-preview_{{ $depot->id }}" 
                                        class="flex items-center mr-3">
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>Edit</a> </div> <!-- END: Modal Toggle -->

                                
                                <a class="flex items-center text-danger delete-confirm" href="{{ route('depot.delete', $depot->id) }}"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>




 <!-- BEGIN: Modal Content -->
 <div id="overlapping-modal-preview_{{ $depot->id }}"  class="modal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- BEGIN: Modal Header -->
             <div class="modal-header">
                 <h2 class="font-medium text-base mr-auto"> Message</h2> 
             </div> <!-- END: Modal Header -->
             <!-- BEGIN: Modal Body -->
            <form method="POST" action="{{ route('depot.update' , $depot->id) }}"  >
                    @csrf
                    @if(isset($depot))
                        @method('PUT')
                    @endif
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nom du depot</label> </div>
                    <div class="col-span-12 sm:col-span-12"> 
                        <input id="name" name="name" type="text" value="{{ $depot->name }}" class="form-control" ></div>
                    @error('name')
                        <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                    @enderror
                </div> 
                <!-- END: Modal Body -->
                <!-- BEGIN: Modal Footer -->
                <div class="modal-footer"> 
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button> 
                    <button type="submit" class="btn btn-primary w-20">Update</button> 
                </div> <!-- END: Modal Footer -->
            </form>

            @if (count($errors) > 0)
                $('#register').modal('show');
            @endif
           
         </div>
     </div>
 </div> <!-- END: Modal Content -->



                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des users</h3>
                    @endif
                </tbody>
            </table>
        {{ $depots->links() }}
        </div>
        <!-- END: Data List -->
    </div>
   </div>




    <!-- BEGIN: Modal Content  depot-->
    <div id="header-footer-modal-preview-depot" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Creation un Depot</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form method="POST" action="{{route('depot.create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nom</label>
                            <input name="name" id="modal-form-1" type="text" class="form-control" placeholder="Nom de depot"> </div>
                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-outline-primary w-20">Create</button> </div> <!-- END: Modal Footer -->
                </form>
            </div>
        </div>
    </div>
<!-- END: Modal Content depot -->


<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">
                        Do you really want to delete these records?
                        <br>
                        This process cannot be undone.
                    </div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->

@endsection