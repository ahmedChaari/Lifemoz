@extends('layouts.menu')
@section('content')
    <!-- BEGIN: Post Content -->
    <div class="intro-y col-span-12 lg:col-span-8 mt-8 row">
        <div class="post intro-y overflow-hidden box mt-5">
            <ul class="post__tabs nav nav-tabs flex-col sm:flex-row bg-slate-200 dark:bg-darkmode-800" role="tablist">
                <li class="nav-item">
                    <button title="Fill in the article content" data-tw-toggle="tab" data-tw-target="#content" class="nav-link tooltip w-full sm:w-40 py-4 active"
                    id="content-tab" role="tab" aria-controls="content" aria-selected="true"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Content </button>
                </li>
                <li class="nav-item">
                    <button title="Adjust the meta title" data-tw-toggle="tab" data-tw-target="#meta-title" class="nav-link tooltip w-full sm:w-40 py-4"
                    id="meta-title-tab" role="tab" aria-selected="false"> <i data-lucide="code" class="w-4 h-4 mr-2"></i> Meta Title </button>
                </li>
                <li class="nav-item">
                    <button title="Use search keywords" data-tw-toggle="tab" data-tw-target="#keywords" class="nav-link tooltip w-full sm:w-40 py-4"
                    id="keywords-tab" role="tab" aria-selected="false"> <i data-lucide="code" class="w-4 h-4 mr-2"></i> Keywords </button>
                </li>
                <li class="nav-item">
                    <button title="Site web & Images" data-tw-toggle="tab" data-tw-target="#logo" class="nav-link tooltip w-full sm:w-40 py-4"
                    id="logo-tab" role="tab" aria-selected="false"> <i data-lucide="align-left" class="w-4 h-4 mr-2"></i> Site & Images </button>
                </li>
            </ul>
            <div class="post__content tab-content">
                <!--  first content-->
                <form method="POST" action="{{ route('company.update' , $company->id) }}"  >
                        @csrf
                        @method('PUT')
                    <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                        <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="name" class="form-label">Nom de société</label>
                                <input type="text" class="form-control" id="taskTitle" name="name" value="{{ $company->name }}">
                                @error('name') <span class="error btn-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="activite" class="form-label">Secteur d'activité</label>
                                <input type="text"  class="form-control" id="productAmount" name="activite" value="{{ $company->activite }}"/>
                                @error('activite') <span class="error  btn-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="date_creation" class="form-label">Date du Création</label>
                                <input type="date"  class="form-control" id="productAmount" name="date_creation" value="{{ $company->date_creation }}"/>
                                @error('date_creation') <span class="error  btn-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="pays" class="form-label">Votre pays</label>
                                <select name="pays"  aria-label="Default select example" id="pays" value="{{ $company->pays }}"
                                class="form-control">


                                    @foreach($countries as $country)
                                    <option value="{{ $country->name }}"
                                    @if(isset($company))
                                        @if ($country->name == $company->pays) selected
                                        @endif
                                    @endif >{{ $country->name }}</option>
                                @endforeach

                                </select>
                                @error('pays') <span class="error  btn-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="ville" class="form-label">Votre Ville</label>
                                <select name="ville"  value="{{ $company->ville }}" aria-label="Default select example" id="ville"
                                class="form-control">
                                @foreach($cities as $ville)
                                    <option value="{{ $ville->ville }}"
                                    @if(isset($company))
                                        @if ($ville->ville == $company->ville) selected
                                        @endif
                                    @endif >{{ $ville->ville }}</option>
                                @endforeach
                                </select>
                                @error('ville') <span class="error  btn-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="adresse" class="form-label">Adresse Complet</label>
                                <input type="text" name="adresse" value="{{ $company->adresse }}" class="form-control" id="productAmount"/>
                                @error('adresse') <span class="error  btn-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">
                                <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10" type="submit"
                                type="button">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
                 <!-- end first content-->
                 <!--  second content-->
                <div id="meta-title" class="tab-pane p-5" role="tabpanel" aria-labelledby="meta-title-tab">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                        <div class="mt-5">
                            <div class="mt-3">
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" value="{{ $company->email }}" name="mail" />
                                    @error('email') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="title" class="form-label">Téléphone Fix</label>
                                    <input type="text"  class="form-control" value="{{ $company->tel }}" name="tel" >
                                    @error('tel') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="tel" class="form-label">Téléphone Mobile</label>
                                    <input type="text" class="form-control" value="{{ $company->tel_mobile }}" name="tel_mobile" />
                                    @error('tel_mobile') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text"  class="form-control" value="{{ $company->fax }}" name="fax"/>
                                    @error('fax') <span class="error btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">
                                    <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10"
                                    type="button">Modifier </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end second content-->
                <!--  3 content-->
                <div id="keywords" class="tab-pane p-5" role="tabpanel" aria-labelledby="meta-title-tab">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5 mt-5">
                        <div class="mt-5">
                            <div class="mt-3">
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="ICE" class="form-label">ICE</label>
                                    <input type="text" class="form-control" value="{{ $company->ICE }}" name="ICE" />
                                    @error('ICE') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="fiscale" class="form-label">Fiscale</label>
                                    <input type="text"  class="form-control" value="{{ $company->fiscale }}" name="fiscale" >
                                    @error('fiscale') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="registre_commerce" class="form-label">Registre Commerce</label>
                                    <input type="text" class="form-control" value="{{ $company->registre_commerce }}" name="registre_commerce" />
                                    @error('registre_commerce') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-6 mt-4">
                                    <label for="patent" class="form-label">Patent</label>
                                    <input type="text" class="form-control" value="{{ $company->patent }}" name="patent" />
                                    @error('patent') <span class="error  btn-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">
                                    <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10"
                                    type="button">Modifier </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end 3 content-->
                <!--  4 content-->
                <div id="logo" class="tab-pane p-5" role="tabpanel" aria-labelledby="meta-title-tab">
                    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5  mt-5">
                        <div class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                            <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i>Site web & Images </div>
                        <div class="grid grid-cols-12 mt-4">
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <label for="post-form-7" class="form-label">Site Web</label>
                                <input id="post-form-7" type="text" class="form-control" name="web" value="{{ $company->web }}" placeholder="www.yourwebsite.com">
                            </div>
                            <div class="w-52 mx-auto xl:mr-0 col-span-12 sm:col-span-6 mt-4">
                                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    @if(isset($company->logo))
                                        <img class="rounded-md" alt="..." src="/storage/{{ $company->logo }}">
                                    @else
                                    <img class="rounded-md" alt="..." src="{{ asset('dist/images/profile-10.jpg')}}">
                                    @endif

                                        <img class="rounded-md" alt="Midone - HTML Admin Template" src="{{ asset('dist/images/profile-10.jpg')}}">
                                        <div title="Remove this profile photo?"
                                         class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2">
                                         <i data-lucide="x" class="w-4 h-4"></i> </div>
                                    </div>
                                    <div class="mx-auto cursor-pointer relative mt-5">
                                        <button type="button" class="btn btn-success w-full">Changer Logo</button>
                                        <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">
                                <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10"
                                type="button">Modifier </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end 4 content-->
            </div>
        </div>
    </div>
    <!-- END: Post Content -->
@endsection


