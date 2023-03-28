<div class="intro-y box py-10 sm:py-20 mt-5">

    @if(!empty($successMessage))
    <div class="alert alert-success">
       {{ $successMessage }}
    </div>
    @endif
        <!-- progressbar -->
        <div class="relative before:hidden before:lg:block before:absolute before:w-[69%] before:h-[3px] before:top-0 before:bottom-0 before:mt-4 before:bg-slate-100 before:dark:bg-darkmode-400 flex flex-col lg:flex-row justify-center px-5 sm:px-20">
            <div class="intro-x lg:text-center flex items-center lg:block flex-1 z-10 {{ $currentStep != 1 ? '' : 'active' }}">
                <a type="button" href="#step-1" class="step w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" >1</a>
                <div class="text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Configurez les détails de votre Entreprise</div>
            </div>
            <div class="intro-x lg:text-center flex items-center lg:mt-0 lg:block flex-1 z-10 {{ $currentStep != 2 ? '' : 'active' }}">
                <a type="button" href="#step-2"
                class="step w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" >2</a>
                <div class="text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Créer un Nouveau Compte</div>
            </div>
            <div class="intro-x lg:text-center flex items-center lg:mt-0 lg:block flex-1 z-10 {{ $currentStep != 3 ? '' : 'active' }}">
                <a type="button" href="#step-3" class="step w-10 h-10 rounded-full btn text-slate-500 bg-slate-100 dark:bg-darkmode-400 dark:border-darkmode-400" disabled>3</a>
                <div class="text-base lg:mt-3 ml-3 lg:mx-auto text-slate-600 dark:text-slate-400">Finalisez Votre Compte</div>
            </div>
        </div>
    <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-slate-200/60 dark:border-darkmode-400">
        <div class=" {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
            <div class="font-medium text-base">Créer un Nouveau Compte</div>
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
                            @foreach($countries  as $country)
                            <option value="{{ $country->nicename }}">{{ $country->nicename }}</option>
                            @endforeach
                        </select>
                        @error('pays') <span class="error  btn-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="ville" class="form-label">Votre Ville</label>
                        <select name="ville" wire:model="ville"  aria-label="Default select example" id="ville"
                        class="form-control">
                            <option value="" selected disabled>--------</option>
                            @foreach($cities ?? '' as $city)
                            <option value="{{ $city->ville }}">{{ $city->ville }}</option>
                            @endforeach
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
        <div class="setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
            <div class="font-medium text-base">Créer un Nouveau Compte</div>
            <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                <div class="intro-y col-span-12 sm:col-span-6">
                        <label for="title" class="form-label">nom complet</label>
                        <input type="text" wire:model="fullName" class="form-control" id="taskemail">
                        @error('fullName') <span class="error  btn-danger">{{ $message }}</span> @enderror
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="email" class="form-label">email</label>
                    <input type="text" wire:model="email" class="form-control" id="productAmount"/>
                    @error('email') <span class="error  btn-danger">{{ $message }}</span> @enderror
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="tel" class="form-label">Votre telephone</label>
                    <input type="text" wire:model="tel" class="form-control" id="tel"/>
                    @error('tel') <span class="error  btn-danger">{{ $message }}</span> @enderror
                </div>
                <div class="intro-y col-span-12 sm:col-span-6">
                    <label for="password" class="form-label">password</label>
                    <input type="password" wire:model="password" class="form-control" id="password"/>
                    @error('password') <span class="error btn-danger">{{ $message }}</span> @enderror
                </div>
                <div class="intro-y col-span-12 sm:col-span-12" style="text-align: right;">
                    <button class="btn w-32 btn-outline-danger dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10"  type="button" wire:click="back(1)">Back</button>
                    <button class="btn w-32 btn-primary dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10 nextBtn" type="button" wire:click="secondStepSubmit">Next</button>
                </div>
            </div>
        </div>
        <div class="setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <!-- BEGIN: Ads 1 -->
    <div class="col-span-12 sm:col-span-12">
        <div class="box p-8 relative overflow-hidden intro-y" style="background-color: #164e63c7!important;">
            <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3"> Mr . <span style="text-decoration: underline #ffff;">{{$fullName}} </span>
                 vous avez créés compte avec la societe <span style="text-decoration: underline #ffff;">{{$name}}</span></div>
            <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">votre compte sera activé moins de 24h.</div>
            <button class="btn w-32 btn-outline-danger dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10" type="button" wire:click="back(2)">Back</button>


            <button class="btn btn-outline-success w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10" wire:click="submitForm" type="button">Finish!</button>




            <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2" alt="Midone - HTML Admin Template" src="dist/images/woman-illustration.svg">
        </div>
    </div>
    <!-- END: Ads 1 -->

                </div>
    </div>
    </div>










