<?php

namespace App\Http\Controllers;

use App\HotelRequest;
use Illuminate\Http\Request;

class HotelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelreq = HotelRequest::all();
        return view('hotelrequest.index',['hotelrequest'=>$hotelreq]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotelrequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotelreq = new HotelRequest();
        $hotelreq->client_id = $request->input('client_id');
        $hotelreq->hotel_id = $request->input('hotel_id');
        $hotelreq->city = $request->input('city');
        $hotelreq->date_in = $request->input('date_in');
        $hotelreq->date_out = $request->input('date_out');
        $hotelreq->qyu_adults = $request->input('qty_adults');
        $hotelreq->rooms = $request->input('rooms');
        $hotelreq->ubication = $request->input('ubications');
        $hotelreq->save();
        return redirect()->route('hotelrequest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotelreq = HotelRequest::findOrFail($id);
        return view('hoterequest.show',['hotelrequest' => $hotelreq]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotelreq = HotelRequest::findOrFail($id);
        return view('hoterequest.edit',['hotelrequest' => $hotelreq]);
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
        $hotelreq = HotelRequest::findOrFail($id);
        $hotelreq->client_id = $request->input('client_id');
        $hotelreq->hotel_id = $request->input('hotel_id');
        $hotelreq->city = $request->input('city');
        $hotelreq->date_in = $request->input('date_in');
        $hotelreq->date_out = $request->input('date_out');
        $hotelreq->qyu_adults = $request->input('qty_adults');
        $hotelreq->rooms = $request->input('rooms');
        $hotelreq->ubication = $request->input('ubications');
        $hotelreq->save();
        return redirect()->route('hotelrequest.index');
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
