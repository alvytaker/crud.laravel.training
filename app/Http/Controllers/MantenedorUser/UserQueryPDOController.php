<?php

namespace App\Http\Controllers\MantenedorUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserQueryPDOController extends Controller
{

    public function index(){

        $users = DB::select('SELECT user.id ,rut , user.name AS name_user, email , title, profession_id, comunas.name AS name_comuna, regiones.name AS name_region FROM user 
        INNER JOIN profession ON user.profession_id=profession.id 
        INNER JOIN comunas ON user.comuna_id = comunas.id
        INNER JOIN regiones ON comunas.region_id = regiones.id');

        $total = DB::table('user')->get();
        $profession = DB::table('profession')->get();

        return view('usuarios.ModalQueryPDO.listado', compact('users','total','profession'));
    }




    public function AddUser(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password =$request->password;
        $profession_id = $request->profession_id;

       
        $create =  DB::insert("INSERT INTO user (name, email, password, profession_id) VALUES (?, ?, ?, ?)", [$name, $email, $password, $profession_id]);

        return redirect()->route('userQueryPDO')->with('mensaje1', 'Se agrego un usuario con Query y proteccion PDO ');

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
    
    $user = DB::update("UPDATE user SET name=?, email=?, profession_id=? WHERE id = ?", [$name, $email, $profession_id, $id]);

       return redirect()->route('userQueryPDO')->with('mensaje1', 'Se actualizo un usuario con Query y proteccion PDO');
    }

    }


    public function DeleteUser($id){

        $user = DB::delete("DELETE FROM user WHERE id='?'",[$id]);

        if($user == true){
            return redirect()->route('userQueryPDO')->with('mensaje1', 'Se elimino un usuario con Query y proteccion PDO');   
    
         }else{
            return redirect()->route('userQueryPDO')->with('mensaje2', 'Error al Eliminar');   
    
         }

    }
}
