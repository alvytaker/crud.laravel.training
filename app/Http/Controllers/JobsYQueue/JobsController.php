<?php

namespace App\Http\Controllers\JobsYQueue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Traits\QueueTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\Utilidades;
use App\Jobs\actualizar;
use App\Jobs\validacion;
use DB;

class JobsController extends Controller
{

    public function ListadoJobs(){
        $logjob = DB::table('logjob')->get();

        return view('JobsYQueue.ListadoJobs', compact('logjob'));
    }


    public function jobcontroller(Request $request){

        switch ($request->jobsact) {
            case 0:
             return $this->updatefecha(0);
                break;
            case 1:
             return $this->updatefecha(1);
                break;
            case 2:
             return $this->datosrepetidos(0);
                break;
            case 3:
             return $this->datosrepetidos(1);
                break;
        }
   }



    public function updatefecha($num){

    date_default_timezone_set("America/Santiago");
    $fechactual = date("Y-m-d H:i:s");
    $utilidades = new Utilidades;
    
    $utilidades->reg_logJobs("updatefecha()", "Jobs/updateuser", $fechactual, "En ejecucion", "Activando colas, Procure activar jobs");
        
    Log::debug('-----------------------inicia job Update------------------------');
    $actu = actualizar::dispatch($fechactual, $num);
    if($actu){
    return redirect()->back()->with('mensaje1','Evento ejecutado, espere unos segundos');
    }else{
        return redirect()->back()->with('mensaje2','Evento No ejecutado, ocurrio un error');

    }

       }

    public function datosrepetidos($num){
        date_default_timezone_set("America/Santiago");
        $fechactual = date("Y-m-d H:i:s");
        $utilidades = new Utilidades;
    
        $utilidades->reg_logJobs("emailsrepetidos()", "Jobs/validacion", $fechactual, "En ejecucion", "Activando colas, Procure activar jobs");
            
        Log::debug('-----------------------inicia job validacion emails------------------------');
        $actu = validacion::dispatch($num);
        if($actu){
        return redirect()->back()->with('mensaje1','Evento ejecutado, espere unos segundos');
        }else{
            return redirect()->back()->with('mensaje2','Evento No ejecutado, ocurrio un error');
    
        }

    }
    

    


}
