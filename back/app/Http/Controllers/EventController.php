<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvent()
    {
        return Event::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'city' =>'required',
            'startdate' =>'required',
            'enddate' =>'required',
            'description' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        $request->file('photo')->images('');

        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->startdate = $request->startdate;
        $event->enddate = $request->enddate;
        $event->description = $request->description;
        $event->photo = $request->file('photo')->hashName();

        $event->save(); // Create post 

        return response()->json(["message" => "Creteted","event" => $event],201);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return Event::destroy($id);
    }
}
