@extends('layouts.menu')
@section('content')


<div class="content" style="padding-top: 0rem;">
    <h2 class="intro-y text-lg font-medium mt-10">
        Liste des inventaires
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;"  class="btn btn-primary shadow-md mr-2"
            data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
            title="Ajouter un Depot"
            >AJOUTTER UN INVENTAIRE</a>


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
                        <th class="whitespace-nowrap">REFERENCE</th>
                        <th class="text-center whitespace-nowrap">OBJET</th>
                        <th class="text-center whitespace-nowrap">DEPOT</th>
                        <th class="text-center whitespace-nowrap">CREATION PAR / ROLE</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">DATE CRÉATION</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($inventories->count() > 0 )
                    @foreach($inventories as $inventory)
                    <tr class="intro-x">
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">
                                {{ $inventory->reference }}</a>
                        </td>
                        <td class="text-center">{{ $inventory->objet }}</td>
                        <td class="text-center">{{ $inventory->depot->name }}</td>
                        <td class="text-center">
                            <a href="" class="font-medium whitespace-nowrap">{{ $inventory->user->fullName }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $inventory->user->role->name }}</div>
                        </td>

                        <td class="text-center">
                        @if ($inventory->status == false)
                        <button class="btn btn-warning mr-1 mb-2"> En cours <i data-loading-icon="three-dots" data-color="1a202c" class="w-4 h-4 ml-2"></i>
                        </button>
                        @else

                                <button class="btn btn-success w-24 mr-1 mb-2"><i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Clôturé</button>
                        @endif
                        </td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($inventory->created_at)->format('M j-Y') }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-success mr-3" href="">
                                    <i data-lucide="eye" class="w-4 h-4 mr-1"></i> </a>
                                <a href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#overlapping-modal-preview_{{ $inventory->id }}"
                                        class="flex items-center mr-3">
                                        <i data-lucide="edit" class="w-4 h-4 mr-1"></i>
                                </a>
                               <a class="flex items-center text-danger delete-confirm" href="">
                                <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> </a>

                            </div>
                        </td>


                    </tr>
                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des inventories</h3>
                    @endif
                </tbody>
            </table>
        {{ $inventories->links() }}
        </div>
        <!-- END: Data List -->
    </div>
   </div>




    <!-- BEGIN: Modal Content  category-->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Creation Inventaire</h2>
                </div> <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form method="POST" action="{{ route('inventory.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nouveau inventaire</label>
                            <input name="objet" id="objet"
                            type="text" class="form-control" placeholder="................">
                            @error('objet')
                            <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nom du depot</label>
                            <select class="form-select mt-2 sm:mr-2" name="depot_id" aria-label="Default select example">
                                <option value="" selected disabled>--------</option>
                                    @foreach($depots as $depot)
                                        <option value="{{ $depot->id }}">{{ $depot->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div> <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>
                        <button type="submit"
                        class="btn btn-outline-primary w-20">Create</button> </div> <!-- END: Modal Footer -->

                </form>
            </div>
        </div>
    </div>
<!-- END: Modal Content Category -->

@endsection
