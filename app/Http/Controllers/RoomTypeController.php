<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype = \App\roomType::all();
        return view('roomtype.index',['roomtypes'=>$roomtype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomtype = new \App\roomType();
        $roomtype->name = $request->input('name');
        $roomtype->description = $request->input('description');
        $roomtype->save();
        return redirect()->route('roomtype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype = \App\roomType::findOrFail($id);
        return view('roomtype.show',['roomtypes'=>$roomtype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = \App\roomType::findOrFail($id);
        return view('roomtype.edit',['roomtypes'=>$roomtype]);

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
        $roomtype = \App\roomType::findOrFail($id);
        $roomtype->name = $request->input('name');
        $roomtype->description = $request->input('description');
        $roomtype->save();
        return redirect()->route('roomtype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
