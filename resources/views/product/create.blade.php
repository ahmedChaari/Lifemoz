@extends('layouts.menu')
@section('content')


    <!-- BEGIN: Create new Product -->
        <div class="modal-dialog mt-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        {{ isset($category) ? 'Edite Product' : 'Add a new Product' }}
                    </h2>
                </div>
                <div id="form-validation" class="p-5">
                    <div class="preview col-md-6">
                        <form class="" action="{{ isset($product) ? route('product.update' , $product->id) : route('product.create') }}"
                            enctype="multipart/form-data"
                            method="POST" >
                                @csrf
                                @if(isset($product))
                                    @method('PUT')
                                @endif
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                                <input id="name" type="text" name="name"
                                    value="{{ isset($product) ? $product->name : old('name') }}"
                                class="form-control" placeholder="Name" minlength="2" required>
                                @error('name')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Category
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">
                                        <a href="javascript:;" class="intro-x w-8 h-8 flex items-center justify-center
                                        rounded-full bg-primary text-white ml-2 tooltip"
                                        data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview"
                                        title="Ajouter un Category">
                                        <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                    </span>
                                </label>
                                <select class="form-select mt-2 sm:mr-2" name="category_id" aria-label="Default select example">
                                    <option value="" selected disabled>--------</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                            @if(isset($product))
                                                @if ($category->id == $product->category_id) selected
                                                @endif
                                            @endif >{{ $category->name }}</option>
                                        @endforeach
                                </select>
                                @error('category')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                             <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Depot
                                     <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">
                                        <a href="javascript:;" class="intro-x w-8 h-8 flex items-center justify-center
                                        rounded-full bg-primary text-white ml-2 tooltip"
                                        data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview-depot"

                                        title="Ajouter un Depot"> <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                    </span> </label>
                                <select class="form-select mt-2 sm:mr-2" name="depot_id" aria-label="Default select example">
                                    <option value="" selected disabled>--------</option>
                                        @foreach($depots as $depot)
                                            <option value="{{ $depot->id }}"
                                            @if(isset($product))
                                                @if ($depot->id == $product->depot_id) selected
                                                @endif
                                            @endif >{{ $depot->name }}</option>
                                        @endforeach
                                </select>
                                @error('depot')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row">
                                    Unity
                                    <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">
                                        <a href="javascript:;" class="intro-x w-8 h-8 flex items-center justify-center
                                        rounded-full bg-primary text-white ml-2 tooltip"
                                        data-tw-toggle="modal" data-tw-target="#header-footer-modal-preview-unity"

                                        title="Ajouter une Unite "> <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                        </span> </label>
                                        <select class="form-select mt-2 sm:mr-2" name="unity_id" aria-label="Default select example">
                                            <option value="" selected disabled>--------</option>
                                            @foreach($unities as $unity)
                                                <option value="{{ $unity->id }}"
                                                @if(isset($product))
                                                    @if ($unity->id == $product->unity_id) selected
                                                    @endif
                                                @endif >{{ $unity->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('unity')
                                        <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                        @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Quantité <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3"
                                value="{{ isset($product) ? $product->quantite : old('quantite') }}"
                                type="number" name="quantite" class="form-control" placeholder="quantite" minlength="6" required>
                                @error('quantite')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Quantité stock minimum
                                     <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3"
                                value="{{ isset($product) ? $product->stock_min : old('stock_min') }}"
                                type="number" name="stock_min" class="form-control" placeholder="Quantité stock minimum" minlength="6" required>
                                @error('stock_min')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Prix d'achat
                                     <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3"
                                value="{{ isset($product) ? $product->achat : old('achat') }}"
                                type="number" name="achat" class="form-control" placeholder="Quantité stock minimum" minlength="6">
                                @error('achat')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Prix de vente
                                     <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3"
                                value="{{ isset($product) ? $product->vente : old('vente') }}"
                                type="number" name="vente" class="form-control" placeholder="Quantité stock minimum" minlength="6">
                                @error('vente')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label>Description</label>
                                <div class="mt-2">
                                    <div class="editor">
                                        <textarea name="description" id="description" type="text"  class="form-control"
                                        value="{{ isset($product) ? $product->description : old('description') }}"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                            class="btn btn-primary mt-5"> {{ isset($category) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- END: New Order Modal -->


    <!-- BEGIN: Modal Content  category-->
        <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Creation un Category</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{route('category.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nom</label>
                                <input name="nameCategory" id="nameCategory"
                                type="text" class="form-control" placeholder="Nom de Category">
                                @error('nameCategory')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Description</label> <textarea name="description" id="modal-form-2" type="text" class="form-control" placeholder="description pour le produit"> </textarea></div>
                        </div> <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>

                            <button type="submit" {{  (isset($nameCategory)) ? '' : 'disabled' }}
                            class="btn btn-outline-primary w-20">Create</button> </div> <!-- END: Modal Footer -->

                    </form>
                </div>
            </div>
        </div>
    <!-- END: Modal Content Category -->

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

    <!-- BEGIN: Modal Content  Unity-->
        <div id="header-footer-modal-preview-unity" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Creation l'unite</h2>
                    </div> <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{route('unity.create')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                            <div class="col-span-12 sm:col-span-12"> <label for="modal-form-1" class="form-label">Nom</label>
                                <input name="name" id="modal-form-1" type="text" class="form-control" placeholder="Nom de unity"> </div>
                                <div class="col-span-12 sm:col-span-12"> <label for="modal-form-2" class="form-label">Description</label> <textarea name="description" id="modal-form-2" type="text" class="form-control" placeholder="description pour le produit"> </textarea></div>
                        </div> <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal" class="btn btn-danger w-20 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-outline-primary w-20">Create</button> </div> <!-- END: Modal Footer -->
                    </form>
                </div>
            </div>
        </div>
    <!-- END: Modal Content Unity -->


@endsection
