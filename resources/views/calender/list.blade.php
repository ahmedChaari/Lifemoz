@extends('layouts.menu')

@section('content')

   <!-- BEGIN: Content -->
   <div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Seller List
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <button class="btn btn-primary shadow-md mr-2">Ajouter Evénement</button>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>

            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">DATE DEBUT</th>
                        <th class="text-center whitespace-nowrap">DATE FIN</th>
                        <th class="text-center whitespace-nowrap">DESCRIPTION</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($events->count() > 0 )
                    @foreach($events as $event)
                    <tr class="intro-x">
                        <td class="w-10"> <a class="flex items-center justify-center underline decoration-dotted"
                        href="javascript:;">{{ $event->name }}</a> </td>
                        <td class="text-center capitalize">{{ $event->start }}</td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-success">
                                <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $event->end }} </div>
                        </td>
                        <td class="text-center">{{ $event->description }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('event.edit', $event->id) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                <form method="POST" action="{{ route('calender.deleteEvent', $event->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="flex items-center text-danger deleteEvent" title='Delete' >
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h3 class="text-center mt-5 mb-5">Pas encore des Events</h3>
                    @endif
                </tbody>

            </table>
            {{ $events->links() }}
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>

</div>
<!-- END: Content -->
@endsection

@section('scripts')
<script type="text/javascript">
            $(document).ready(function() {
                $('.deleteEvent').click(function(e) {
                    if(!confirm('Are you sure you want to delete this post?')) {
                        e.preventDefault();
                    }
                });
            });
        </script>

@endsection



