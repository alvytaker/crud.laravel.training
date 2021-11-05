<?php

namespace App\Http\Controllers\MantenedorUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profession;

class UserController extends Controller
{
    
    public function index(){

        $users = User::all();
        $total = User::all()->count();
        $profession = Profession::all();

        return view('usuarios.ModalEloquent.listado', compact('users','total','profession'));
    }

    public function AddUser(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password =$request->password;
        $profession_id = $request->profession_id;

       
        $create = new User;
        $create->name = $name;
        $create->email = $email;
        $create->profession_id=$profession_id;
        $create->password =$password;
        $con = $create->save();

        return redirect()->route('user.index')->with('mensaje1', 'Se agrego un usuario ');

    }


    public function EditUser(Request $request, $id){

        $name = $request->name;
        $email = $request->email;
        $profession_id = $request->profession_id;

        $v = \Validator::make($request->all(), [
            
            'name' => 'required',
            'email' => 'required|email',
            'profession_id'=>'required'
        ]);

       if($v-> fails()){

            return redirect()->back();
   
       }else{
    
    /*
     $user = User::find($id);
     $user->update([
         'name'=>$name,
         'email'=>$email,
         'password'=>$password
     ]);
    */
     $user = User::find($id);
     $user->name = $name;
     $user->email = $email;
     $user->profession_id= $profession_id;
     $user->save();


       return redirect()->route('user.index')->with('mensaje1', 'Se actualizo un usuario ');
    }

    }


    public function DeleteUser($id){

        $user = User::find($id);
        $user->delete();

        if($user == true){
            return redirect()->route('user.index')->with('mensaje1', 'Se elimino un usuario');   
    
         }else{
            return redirect()->route('user.index')->with('mensaje2', 'Error al Eliminar');   
    
         }

    }

}
