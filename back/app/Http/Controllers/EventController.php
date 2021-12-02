<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:5|max:30',
            'description' => 'nullable'
        ]);

        $event = new Event();
        $event -> title = $request -> title;
        $event -> startdate = $request -> startdate;
        $event -> enddate = $request -> enddate;
        $event -> description = $request -> description;

        $event->save();

        return response()->json(['message' => "Created Event"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:5|max:30',
            'description' => 'nullable'
        ]);

        $event = new Event();
        $event -> title = $request -> title;
        $event -> startdate = $request -> startdate;
        $event -> enddate = $request -> enddate;
        $event -> description = $request -> description;

        $event->save();

        return response()->json(['message' => "Updated Event"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::destroy($id);
    }
}
