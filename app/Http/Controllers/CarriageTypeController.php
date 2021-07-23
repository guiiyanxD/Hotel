<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarriageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carriagetype = \App\carriageType::all();
        return view('carriagetype.index',['carriagetypes'=>$carriagetype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carriagetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carriagetype = new \App\carriageType();
        $carriagetype->name = $request->input('name');
        $carriagetype->description = $request->input('description');
        $carriagetype->save();
        return redirect()->route('carriagetype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carriagetype = \App\carriageType::findOrFail($id);
        return view('carriagetype.show',['carriagetypes'=>$carriagetype]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carriagetype = \App\carriageType::findOrFail($id);
        return view('carriagetype.edit',['carriagetypes'=>$carriagetype]);
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
        $carriagetype = \App\carriageType::findOrFail($id);
        $carriagetype->name = $request->input('name');
        $carriagetype->description = $request->input('description');
        $carriagetype->save();
        return redirect()->route('carriagetype.index');
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
