@extends('layouts.menu')
@section('content')
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-8 mt-8">
        <div class="post intro-y overflow-hidden box mt-5">
            <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                <li class="nav-item">
                    <button title="Fill in the article content" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-40 py-4 active" id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Content </button>
                </li>
                <li class="nav-item">
                    <button title="Adjust the meta title" data-tw-toggle="tab" data-tw-target="#meta-title" class="nav-link tooltip w-full sm:w-40 py-4" id="meta-title-tab" role="tab" aria-selected="false"> <i data-lucide="code" class="w-4 h-4 mr-2"></i> Meta Title </button>
                </li>
                <li class="nav-item">
                    <button title="Use search keywords" data-tw-toggle="tab" data-tw-target="#keywords" class="nav-link tooltip w-full sm:w-40 py-4" id="keywords-tab" role="tab" aria-selected="false"> <i data-lucide="align-left" class="w-4 h-4 mr-2"></i> Keywords </button>
                </li>
            </ul>
            <div class="post__content tab-content">
                <!--  first content-->
                <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">







                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="title" class="form-label">Nom de société</label>
                            <input type="text" wire:model="name" class="form-control" id="taskTitle">
                            @error('name') <span class="error btn-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="activite" class="form-label">Secteur d'activité</label>
                            <input type="text" wire:model="activite" class="form-control" id="productAmount"/>
                            @error('activite') <span class="error  btn-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="date_creation" class="form-label">Date du Création</label>
                            <input type="date" wire:model="date_creation" class="form-control" id="productAmount"/>
                            @error('date_creation') <span class="error  btn-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="pays" class="form-label">Votre pays</label>
                            <select name="pays" wire:model="pays"  aria-label="Default select example" id="pays"
                            class="form-control">
                                <option value="" selected disabled>--------</option>

                            </select>
                            @error('pays') <span class="error  btn-danger">{{ $message }}</span> @enderror
                        </div>



                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="ville" class="form-label">Votre Ville</label>
                            <select name="ville" wire:model="ville"  aria-label="Default select example" id="ville"
                            class="form-control">
                                <option value="" selected disabled>--------</option>

                            </select>
                            @error('ville') <span class="error  btn-danger">{{ $message }}</span> @enderror
                        </div>



                        <div class="intro-y col-span-12 sm:col-span-6">
                            <label for="adresse" class="form-label">Adresse Complet</label>
                            <input type="text" wire:model="adresse" class="form-control" id="productAmount"/>
                            @error('adresse') <span class="error  btn-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">

                            <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10 nextBtn" wire:click="firstStepSubmit" type="button">Next</button>

                        </div>
                    </div>








                </div>
                 <!--  second content-->
                <div id="meta-title" class="tab-pane p-5" role="tabpanel" aria-labelledby="meta-title-tab">

                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5"> <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Caption & Images </div>
                        <div class="mt-5">
                            <div>
                                <label for="post-form-7" class="form-label">Caption</label>
                                <input id="post-form-7" type="text" class="form-control" placeholder="Write caption">
                            </div>
                            <div class="mt-3">
                                <label class="form-label">Upload Image</label>
                                <div class="border-2 border-dashed dark:border-darkmode-400 rounded-md pt-4">
                                    <div class="flex flex-wrap px-4">
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-5.jpg">
                                            <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-9.jpg">
                                            <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-15.jpg">
                                            <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                        </div>
                                        <div class="w-24 h-24 relative image-fit mb-5 mr-5 cursor-pointer zoom-in">
                                            <img class="rounded-md" alt="Midone - HTML Admin Template" src="dist/images/preview-6.jpg">
                                            <div title="Remove this image?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div>
                                        </div>
                                    </div>
                                    <div class="px-4 pb-4 flex items-center cursor-pointer relative">
                                        <i data-lucide="image" class="w-4 h-4 mr-2"></i> <span class="text-primary mr-1">Upload a file</span> or drag and drop
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--  3 content-->
            </div>
        </div>
    </div>
    <!-- END: Post Content -->
@endsection


