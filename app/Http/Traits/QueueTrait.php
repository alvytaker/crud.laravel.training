<?php

namespace App\Http\Traits;
use App\Exports\UserExport;
use App\Mail\UserExcel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\Utilidades;
use ZipArchive;
use File;
use DB;

trait QueueTrait {

    public function emailusers(){
  
        date_default_timezone_set("America/Santiago");
        $fechactual = date("Y-m-d i:s");

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
   
       $linkexcel = response((storage_path('app/'.$fileName)));
       $correo = new UserExcel($linkexcel); 
      

         $utilidades = new Utilidades;

       if(empty($correo)){
        $utilidades->reg_log("emailusers", "QueueController", $fechactual, "Error", "Fallo el envio de correos");
        return redirect()->back()->with('mensaje2', 'FALLO EN EL ENVIO DE CORREO!');
      }


       foreach($user as $us){
           $email = $us->email_usuario;  
   
         $est = Mail::to($email)->send($correo);
       }

       // if(!$est==null){
        $utilidades->reg_log("emailusers", "QueueController", $fechactual, "Enviando", "Envio de correos");
         return redirect()->back()->with('mensaje1', 'Envio realizado con exito! Hemos enviado un correo a todos los usuarios!');
      //  }else{

     //   $utilidades->reg_log("emailusersfails()", "QueueController", $fechactual, "Error", "Fallo el envio de correos");
       // return redirect()->back()->with('mensaje2', 'FALLO EN EL ENVIO DE CORREO!');
      //  }
        
     }
}