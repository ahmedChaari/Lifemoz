@extends('layouts.menu')
@section('content')


     <!-- BEGIN: New Order Modal -->

        <div class="modal-dialog mt-3">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        New Product
                    </h2>
                </div>
                <div id="form-validation" class="p-5">
                    <div class="preview">
                        <form class="" action="{{route('product.create')}}" enctype="multipart/form-data"
                        method="POST" >
                            @csrf

                            <div class="input-form mt-3">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least 3 characters</span> </label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"

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
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip" title="Ajouter un Produit"> <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                    </span> </label>
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
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip" title="Ajouter un Depot"> <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                    </span> </label>
                                <select class="form-select mt-2 sm:mr-2" name="depot_id" aria-label="Default select example">
                                        <option value="" selected disabled>--------</option>
                                    @foreach($depots as $depot)
                                        <option value="{{ $depot->id }}"
                                        @if(isset($product))
                                            @if ($depot->id == $depot->depot_id) selected
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
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-primary text-white ml-2 tooltip" title="Ajouter une Unite "> <i data-lucide="plus" class="w-3 h-3"></i> </a>
                                        </span> </label>
                                <select class="form-select mt-2 sm:mr-2" name="unity_id" aria-label="Default select example">
                                        <option value="" selected disabled>--------</option>
                                    @foreach($unities as $unity)

                                    <option value="{{ $unity->id }}"
                                         @if ($unity->unity_id === $unity->id || old('unity_id') === $unity->id) selected
                                         @endif>{{ $unity->name }}</option>

                                    @endforeach
                                </select>
                                @error('unity')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Quantité <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3" value="{{ old('quantite') }}"
                                type="number" name="quantite" class="form-control" placeholder="quantite" minlength="6" required>
                                @error('quantite')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Quantité stock minimum
                                     <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, </span> </label>
                                <input id="validation-form-3" value="{{ old('stock_min') }}"
                                type="number" name="stock_min" class="form-control" placeholder="Quantité stock minimum" minlength="6" required>
                                @error('stock_min')
                                <div class="alert alert-danger-soft show flex items-center mb-2" role="alert">
                                    <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label>Description</label>
                                <div class="mt-2">
                                    <div class="editor">
                                        <p name="description">Content of the editor.</p>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-5">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- END: New Order Modal -->


@endsection
