<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public static $tipo_persona = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('people')->where('type','==','1')->get();
        return view('user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            $person = new People();
            $person->name = $request->input('name');
            $person->last_name =$request->input('last_name');
            $person->brithday = $brithday;
            $person->gendre = $request->input('gendre');
            $person->phone_number = $request->input('phone_number');
            $person->personal_email = $request->input('personal_email');
            $person->type = self::$tipo_persona;
            $person->save();

            $user = new User();
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
        $user = User::findOrFail($id);
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.show',['user'=>$user]);
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
        $person = People::findOrFail($id);
        $person->name = $request->input('name');
        $person->last_name = $request->input('last_name');
        $person->brithday = $request->input('birthday');
        $person->gendre = $request->input('gendre');
        $person->phone_number = $request->input('phone_number');
        $person->personal_email = $request->input('persnoal_email');
        $person->type = self::$tipo_persona;
        $person->save();

        $user = User::findOrFail($person->id);
        //$user->persona_id = $person->id;
        $user->email =  $request->input('email');
        $user->cargo =  $request->input('cargo');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('user.show', $person->id);
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
