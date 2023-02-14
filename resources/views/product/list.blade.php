@extends('layouts.menu')
@section('content')

 <!-- BEGIN: Content -->
   <div class="content" style="padding-top: 0rem !important;">
    <h2 class="intro-y text-lg font-medium mt-10">LISTE DES PRODUITS</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('product.createView') }}"  class="btn btn-primary shadow-md mr-2">AJOUTER PRODUIT</a>
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
                        <th class="whitespace-nowrap">PRODUIT</th>
                        <th class="text-center whitespace-nowrap">CATEGORY / UNITY</th>
                        <th class="text-center whitespace-nowrap">CREATION DE / ROLE</th>
                        <th class="text-center whitespace-nowrap">PRIX ACHAT</th>
                        <th class="text-center whitespace-nowrap">PRIX VENTE</th>
                        <th class="text-center whitespace-nowrap">DEPOT</th>
                        <th class="text-center whitespace-nowrap">QUANTITE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->count() > 0 )
                    @foreach($products as $product)
                    <tr class="intro-x">
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">{{ $product->name }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $product->category->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->unity->name }}</div>
                        </td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">{{ $product->user->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->user->role->name }}</div>
                        </td>
                        <td class="text-center">{{ $product->achat }}</td>
                        <td class="text-center">{{ $product->vente }}</td>
                        <td class="text-center">{{ $product->depot->name }}</td>
                        <td class="w-40">
                            @if ( $product->quantite > $product->stock_min)
                            <div class="flex items-center justify-center text-success">
                                {{ $product->quantite }}</div>
                            @else
                            <div class="flex items-center justify-center text-danger">
                              {{ $product->quantite }}</div>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#overlapping-modal-preview_{{ $product->id }}"  >
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details </a>
                                <a class="flex items-center mr-3" href="{{ route('product.edit', $product->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <a class="flex items-center text-danger delete-confirm" href="{{ route('product.delete', $product->id) }}"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>














   <!-- BEGIN: Modal Content -->
   <div id="overlapping-modal-preview_{{ $product->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">La Fiche Du Produit</h2>
            </div> <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Nom Du Produit</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">  {{ $product->name }}</div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">CATEGORY / UNITY</label></div>
                <div class="col-span-12 sm:col-span-6">
                    <div class="font-medium whitespace-nowrap">{{ $product->category->name }}</div>
                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->unity->name }}</div>
                </div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-3" class="form-label">PRIX VENTE / PRIX ACHAT </label></div>
                <div class="col-span-12 sm:col-span-6">
                    <div class="font-medium whitespace-nowrap">{{ $product->vente }}</div>
                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $product->achat }}</div>
                </div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-4" class="form-label">DEPOT</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">{{ $product->depot->name }}</div>

                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-4" class="form-label">QUANTITE</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">{{ $product->quantite }}</div>
            </div> <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-danger w-20 mr-1">Cancel</button></div> <!-- END: Modal Footer -->
        </div>
    </div>
</div> <!-- END: Modal Content -->











                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des users</h3>
                    @endif
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
        <!-- END: Data List -->
    </div>
   </div>
  <!-- END: Content -->
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
