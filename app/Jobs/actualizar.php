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
class actualizar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fechaactual;
    protected $num;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fechaactual = null, $num = null)
    {
        $this->fechaactual = $fechaactual;
        $this->num = $num;
       
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    $idUlt = DB::select("SELECT MAX(id) AS id_logjob FROM logjob WHERE evento ='updatefecha()'");
    foreach($idUlt as $idlo){ $idlogjob = $idlo->id_logjob;}

    $utilidades = new Utilidades;

 //  if(!$this->fechaactual==null)  

   if($this->num > 0){

    $query = DB::table('user')->update([
        'created_at'=>$this->fechaactual,
       ]);

        if($query){
        $utilidades->reg_logJobsupdatefecha($idlogjob, "Realizado", "Job actualizar 'created_at' ejecutado de forma correcta"); 
        }else{
        $utilidades->reg_logJobsupdatefecha($idlogjob, "Fallo", "Error al actualizar campo 'created_at'"); 
        }
   }else{

      $utilidades->reg_logJobsupdatefecha($idlogjob, "Fallo", "Error al ejecutar JOB actualizar 'created_at', procure ingresar los datos correctos");
   }
           
    }
}
