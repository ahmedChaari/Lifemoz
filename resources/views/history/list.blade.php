@extends('layouts.menu')
@section('content')

<!-- BEGIN: Content -->
<div class="content" style="padding-top: 0rem;">
    <h2 class="intro-y text-lg font-medium mt-10">
        Mot historique
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
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
                        <th class="whitespace-nowrap">DATE EVENEMENT</th>
                        <th class="text-center whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">CREATION DE / ROLE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($histories->count() > 0 )
                    @foreach($histories as $history)
                    <tr class="intro-x">
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">{{ $history->created_at }}</a>
                        </td>
                        <td class="text-center">{{ $history->name }}</td>
                        <td class="w-40">
                            <a href="" class="font-medium whitespace-nowrap">{{ $history->user->fullName }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $history->user->role->name }}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;"
                                data-tw-toggle="modal" data-tw-target="#overlapping-modal-preview_{{ $history->id }}"  >
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details </a>
                                <!-- BEGIN: Modal Toggle -->
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>






   <!-- BEGIN: Modal Content -->
 <div id="overlapping-modal-preview_{{ $history->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">La Fiche D'historique D'événement</h2>
            </div> <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-1" class="form-label">Date Evenement</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">  {{ $history->created_at }}</div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-2" class="form-label">Name d'Evenement</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">  {{ $history->name }}</div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-3" class="form-label">Modification de</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">  {{ $history->user->fullName }}</div>
                <div class="col-span-12 sm:col-span-6"> <label for="modal-form-4" class="form-label">Le Role</label></div>
                <div class="col-span-12 sm:col-span-6 font-medium whitespace-nowrap">  {{ $history->user->role->name }}</div>
            </div> <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer"> <button type="button" data-tw-dismiss="modal" class="btn btn-outline-danger w-20 mr-1">Cancel</button></div> <!-- END: Modal Footer -->
        </div>
    </div>
</div>
<!-- END: Modal Content -->










                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des users</h3>
                    @endif
                </tbody>
            </table>
                {{ $histories->links() }}
        </div>
        <!-- END: Data List -->
    </div>
   </div>
<!-- END: Content -->



@endsection

@section('scripts')






@endsection
