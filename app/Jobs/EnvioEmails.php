<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\Utilidades;
use App\Mail\UserExcel;
use ZipArchive;
use File;
use DB;

class EnvioEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        date_default_timezone_set("America/Santiago");
        $fechactual = date("Y-m-d H:i:s");
        $user = DB::table('user')->select('user.id AS id_usuario','name AS nombre_usuario','email AS email_usuario','title AS nombre_profesion')->join('profession','user.profession_id','=','profession.id')->get();
        $excel = new UserExport($user);

        $store =  Excel::store($excel, 'Lista-Usuario/Lista-Usuarios.xlsx');

        $zip = new ZipArchive;
        
        $fileName = "Lista-Usuario.zip";
        
        if($zip->open(storage_path('app/'.$fileName),ZipArchive::CREATE)==TRUE){
        
        $files = File::files(storage_path('app/Lista-Usuario'));
        $zip->addFromString('Lista-Usuarios.xlsx', 'file content goes here');
        $zip->setEncryptionName('Lista-Usuarios.xlsx', ZipArchive::EM_AES_256, '1234');
        
        foreach($files as $key=> $value){
        $relativeName = basename($value);
    
        $zip->addFile($value, $relativeName);
        }

        $zip->close();

        } 

        $linkexcel = response((storage_path('app/'.$fileName)));
    
        $correo = new UserExcel($linkexcel);

        foreach($user as $us){
         
        $mail = $us->email_usuario;

         Log::debug('-----------------------inicia job Correos------------------------');
         Mail::to($mail)->send($correo);

        }

        $utilidades = new Utilidades;

        $utilidades->reg_logJobs("handle()", "Jobs(EnvioEmails)", $fechactual, "Enviando", "Envio de correos automatico");

/*
        if(!$est==null){
          $utilidades->reg_log("emailusers", "QueueController", $fechactual, "Enviando", "Envio de correos");
           return redirect()->back()->with('mensaje1', 'Envio realizado con exito! Hemos enviado un correo a todos los usuarios!');
          }else{
  
          $utilidades->reg_log("emailusersfails()", "QueueController", $fechactual, "Error", "Fallo el envio de correos");
          return redirect()->back()->with('mensaje2', 'FALLO EN EL ENVIO DE CORREO!');
          }  */

        return true;
    }
}
