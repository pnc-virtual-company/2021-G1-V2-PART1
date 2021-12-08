<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Join;
class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getJoins()
    {
        return Join::with('user','event')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $join = new Join();
        $join->user_id = $request->user_id;
        $join->event_id = $request->event_id;

        $join->save();

        return response()->json(["message" => "created"]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Join::findOrFail($id);
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
        $join = Join::findOrFail($id);
        $join->user_id = $request->user_id;
        $join->event_id = $request->event_id;

        $join->save();

        return response()->json(["message" => "updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return Join::destroy($id);
    }
}
