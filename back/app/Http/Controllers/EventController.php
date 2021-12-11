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
    public function getEvents()
    {
        return Event::with('category','join')->latest()->get();
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
            'title'=>'required',
            'city'=>'required',
            'startdate'=>'required',
            'enddate'=>'required',
            'description'=>'required',
            'photo'=>'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        $request->file('photo')->store('public/imageEvent');

        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->startdate = $request->startdate;
        $event->enddate = $request->enddate;
        $event->description = $request->description;
        $event->photo = $request->file('photo')->hashName();
        $event->category_id = $request->category_id;
        $event->user_id = $request->user_id;

        $event->save();
       
        return response()->json(['message' => "created successfully!" , "event" => $event],201);
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
        $event = Event::findOrFail($id);
        $event->update($request->all());
       
        return response()->json(['message' => "updated successfully!" , "event" => $event],200);
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

    public function search($title)
    {
        return Event::where('title','like','%'.$title.'%')->get();
    }

    public function searchbycity($cities)
    {
        return Event::where('city','like','%'.$cities.'%')->get();
    }
}
