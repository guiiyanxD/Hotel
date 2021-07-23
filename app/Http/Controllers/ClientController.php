<?php

namespace App\Http\Controllers;

use App\Poeple;
use App\User;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public static $tipo_persona = 2;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Client::with('people')->where('type','==','2');
        return view('client.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brithday = $request->input('birthday');
        $age = Carbon::parse($brithday)->age;

        if($age > 17){
            $person = new Poeple();
            $person->name = $request->input('name');
            $person->last_name =$request->input('last_name');
            $person->brithday = $brithday;
            $person->gendre = $request->input('gendre');
            $person->phone_number = $request->input('phone_number');
            $person->personal_email = $request->input('personal_email');
            $person->type = self::$tipo_persona;
            $person->save();

            $user = new \App\Client();
            $user->persona_id = $person->id;
            $user->cargo =  $request->input('cargo');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('home');
        }else{
            return redirect()->route('register')->withErrors(['El nuevo usuario debe ser mayor de edad','the message']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = User::findOrFail($id);
        return view('client.show',['client'=>$clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = User::findOrFail($id);
        return view('client.show',['client'=>$clients]);
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
        $person = Poeple::findOrFail($id);
        $person->name = $request->input('name');
        $person->last_name = $request->input('last_name');
        $person->brithday = $request->input('birthday');
        $person->gendre = $request->input('gendre');
        $person->phone_number = $request->input('phone_number');
        $person->personal_email = $request->input('personal_email');
        $person->type = self::$tipo_persona;
        $person->save();

        $user = User::findOrFail($id);
        $user->persona_id = $person->id;
        $user->cargo =  $request->input('cargo');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('home');

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
