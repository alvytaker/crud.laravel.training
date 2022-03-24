<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class LoginController extends Controller
{
    public function login(){

        auth()->logout();
        $profession = DB::table('profession')->get();
        $regiones = DB::table('regiones')->get();

        return view('login', compact('profession','regiones'));
    }

    public function logeo(){
        if(auth()->attempt(request(['rut', 'password'])) == false){
         return back()->with('message', 'El rut o contraseña son incorrectos');

        }else{
            $userId = auth()->user()->id;
         // return $userId;
           return redirect()->route("index");
        }
    }

    public function cierre(){

        auth()->logout();

        return redirect()->route('welcome');
    }

    public function register(Request $request){

        $user = new User();
        $user->rut = $request->rut;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->profession_id = $request->profession_id;
        $user->comuna_id = $request->comuna_id;
        $user->save();

      //$user = User::create(request(['rut','name','email','password','profession_id','comuna_id']));
        auth()->login($user);

        return redirect()->route('index');
    }
}
