@extends('layouts.menu')
@section('content')

<!-- BEGIN: Content -->
   <div class="content">
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
                            <a href="" class="font-medium whitespace-nowrap">{{ $history->user->name }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">{{ $history->user->role->name }}</div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center text-primary whitespace-nowrap mr-5" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> View Details </a>
                                <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                            </div>
                        </td>
                    </tr>
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
