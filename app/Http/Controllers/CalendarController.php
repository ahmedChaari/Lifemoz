<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user  = Auth::user()->id;
        $events = Event::where('user_id', $user)

        ->paginate(10);
        return view('calender.list' , compact('events'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calender.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $user  = Auth::user()->id;
        Event::create([
                'name'        => $request->name,
                'start'       => $request->start,
                'end'         => $request->end,
                'user_id'     => $user,
                'description' => $request->description,
                ]);

        return redirect(route('calender.list'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('calender.update')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEvent(EventRequest $request,Event $event)
    {
        $event->update([
            'name'        => $request->name,
            'start'       => $request->start,
            'end'         => $request->end,
            'description' => $request->description,
            ]);


        return redirect(route('calender.list'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent($id)
    {
        Event::find($id)->delete();
        return redirect()->back();
    }

}
