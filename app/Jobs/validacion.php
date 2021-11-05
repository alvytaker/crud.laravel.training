<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Middleware\Utilidades;
use DB;
class validacion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


  
    protected $num;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $num = null)
    {
        $this->num = $num;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    $idUlt = DB::select("SELECT MAX(id) AS id_logjob FROM logjob WHERE evento = 'emailsrepetidos()'");
    foreach($idUlt as $idlo){ $idlogjob = $idlo->id_logjob;}

    $utilidades = new Utilidades;

    if($this->num > 0){
    $query = DB::delete("DELETE u1 FROM user u1 INNER JOIN user u2 WHERE u1.id > u2.id AND u1.email = u2.email");
      
     if($query){
        $utilidades->reg_logJobsupdatevalidacion($idlogjob, "Realizado", "Job validacion de emails repetidos ejecutado de forma correcta"); 
        }else{
        $utilidades->reg_logJobsupdatevalidacion($idlogjob, "Realizado", "No existen datos repetidos"); 
        }
    
    
    
    }else{
        $utilidades->reg_logJobsupdatevalidacion($idlogjob, "Fallo", "Error al ejecutar JOB validar emails repetidos, procure ingresar los datos correctos");
        }


      /* DB::table('user u1')->delete(u1)
     ->join('user u2')
     ->where('u1.id','>','u2.id')
     ->where('u1.email','=','u2.email'); */
    }
}
