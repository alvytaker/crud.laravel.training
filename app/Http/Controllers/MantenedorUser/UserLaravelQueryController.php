<?php

namespace App\Http\Controllers\MantenedorUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UserExport;
use App\Mail\UserExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use ZipArchive;
use File;
use DB;

class UserLaravelQueryController extends Controller
{

    public function index(){

        $users = DB::table('user')->select('user.id','user.name AS name_user','rut','email','title','profession_id','comunas.name AS name_comuna','regiones.name AS name_region')
        ->join('comunas','user.comuna_id','=','comunas.id')
        ->join('regiones','comunas.region_id','=','regiones.id')
        ->join('profession','user.profession_id','=','profession.id')->get();
        $total = DB::table('user')->get();
        $profession = DB::table('profession')->get();
        $regiones = DB::table('regiones')->get();
        $comunas = DB::table('comunas')->get();

        return view('usuarios.ModalConstructorLaravel.listado', compact('users','total','profession','regiones','comunas'));
    }


    public function AddUser(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password =$request->password;
        $profession_id = $request->profession_id;

       
        $create = DB::table('user')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'profession_id'=>$profession_id,
            'comuna_id'=>$request->comuna
        ]);
      
        return redirect()->route('LaravelQuery')->with('mensaje1', 'Se agrego un usuario con el constructor de consultas Laravel ');

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
    $user = DB::table('user')->where('id','=',$id)->update([
        'name'=>$name,
        'email'=>$email,
        'profession_id'=>$profession_id
    ]);


       return redirect()->route('LaravelQuery')->with('mensaje1', 'Se actualizo un usuario con el constructor de consultas Laravel  ');
    }

    }


    public function DeleteUser($id){

        $user = DB::table('user')->where('id','=',$id)->delete();

        if($user == true){
            return redirect()->route('LaravelQuery')->with('mensaje1', 'Se elimino un usuario');   
    
         }else{
            return redirect()->route('LaravelQuery')->with('mensaje2', 'Error al Eliminar');   
    
         }

    }

 public function exportexcelid($id){
         
 //Generamos una peticios para traer los datos de usuarios
  $user = DB::table('user')->select('user.id AS id_usuario','name AS nombre_usuario','email AS email_usuario','title AS nombre_profesion')->join('profession','user.profession_id','=','profession.id')->where('user.id','=',$id)->get();
  //enviamos la peticion en una variabla al metodo de exportacion excel
  $excel = new UserExport($user);
  //una vez obtenido el excel lo almacenamos en la carpeta storage
  $store =  Excel::store($excel, 'Lista-Usuario/Lista-Usuarios.xlsx');
  //Llamamos al metodo zip
  $zip = new ZipArchive;
  //Creamos un nombre al archivo zip
  $fileName = "Lista-Usuario.zip";
  //Creamos archivo zip
  if($zip->open(storage_path('app/'.$fileName),ZipArchive::CREATE)==TRUE){
  //Buscamos la carpeta a comprimir
  $files = File::files(storage_path('app/Lista-Usuario'));
  //Agregamos contraseña al archivo del zip
  $zip->addFromString('Lista-Usuarios.xlsx', 'file content goes here');
  $zip->setEncryptionName('Lista-Usuarios.xlsx', ZipArchive::EM_AES_256, '1234');
  //Recorremos la carpeta para agregar los archivos que estan dentro de esta
  foreach($files as $key=> $value){
  $relativeName = basename($value);

  $zip->addFile($value, $relativeName);
  }

  $zip->close();

  } 

  return response()->download(storage_path('app/'.$fileName)); 
    
    
        }


 public function exportazip(){

  $user = DB::table('user')->select('user.id AS id_usuario','name AS nombre_usuario','email AS email_usuario','title AS nombre_profesion')->join('profession','user.profession_id','=','profession.id')->get();
  $excel = new UserExport($user);
    
  $store =  Excel::store($excel, 'Lista-Usuario/Lista-Usuarios.xlsx');

  //Llamamos al metodo zip
  $zip = new ZipArchive;
  //Creamos un nombre al archivo zip
  $fileName = "Lista-Usuario.zip";
  //Creamos archivo zip
  if($zip->open(storage_path('app/'.$fileName),ZipArchive::CREATE)==TRUE){
  //Buscamos la carpeta a comprimir
  $files = File::files(storage_path('app/Lista-Usuario'));
  $zip->addFromString('Lista-Usuarios.xlsx', 'file content goes here');
  $zip->setEncryptionName('Lista-Usuarios.xlsx', ZipArchive::EM_AES_256, '1234');
  //Recorremos la carpeta para agregar los archivos que estan dentro de esta
  foreach($files as $key=> $value){
  $relativeName = basename($value);
  $zip->addFile($value, $relativeName);
  }
  $zip->close();
  } 
  return response()->download(storage_path('app/'.$fileName));
  }


  public function emailusers(){

    $correo = new UserExcel(); 
    
    $user = DB::table('user')->select('user.id AS id_usuario','name AS nombre_usuario','email AS email_usuario','title AS nombre_profesion')->join('profession','user.profession_id','=','profession.id')->get();

    foreach($user as $us){
        $email = $us->email_usuario;  

    Mail::to($email)->send($correo);

    }

    return redirect()->back()->with('mensaje1', 'Envio realizado! Hemos enviado un correo a todos los usuarios!');

  }

  function cargarcomunas(Request $request){

    $comunas = DB::table('comunas')->where('region_id','=',$request->region_id)->get();
 
    return response(json_encode($comunas),200)->header('Content-type','text/plain');
  }

  function cargarcomunasedit(Request $request){

    $comunas = DB::table('comunas')->where('region_id','=',$request->regionedit)->get();
 
    return response(json_encode($comunas),200)->header('Content-type','text/plain');
  }

  function viewuseredit($user_id){

    $users = DB::table('user')->select('user.id','user.name AS name_user','rut','email','title','profession_id','comunas.name AS name_comuna','regiones.name AS name_region')
        ->join('comunas','user.comuna_id','=','comunas.id')
        ->join('regiones','comunas.region_id','=','regiones.id')
        ->join('profession','user.profession_id','=','profession.id')
        ->where('user.id','=',$user_id)->get();

    $profession = DB::table('profession')->get();
    $regiones = DB::table('regiones')->get();
    $comunas = DB::table('comunas')->get();

    return view('usuarios/ModalConstructorLaravel/EditUser', compact('users','profession', 'regiones','comunas'));
  }

}
