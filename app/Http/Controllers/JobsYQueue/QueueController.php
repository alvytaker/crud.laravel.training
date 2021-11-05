<?php

namespace App\Http\Controllers\JobsYQueue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Traits\QueueTrait;
use App\Http\Traits\QueueTraitError;
use App\Http\Middleware\Calcular;
use App\Http\Middleware\Utilidades;
use DB;

class QueueController extends Controller
{

    public function ListadoQueue(){

       $logqueue = DB::table('logqueue')->get();

        return view('JobsYQueue.ListadoQueue', compact('logqueue'));
    }

    //Trait envio de correos
    use QueueTrait;

    //Trait fallo envio de correos
    use QueueTraitError;
    

    public function calcular(){
     date_default_timezone_set("America/Santiago");
     $fechactual = date("Y-m-d");

     $Calcular = new  Calcular;
     $utilidades= new Utilidades;

     $result = $Calcular->calcular();

     if(!$result==null){
        $utilidades->reg_log("calcular()", "QueueController", $fechactual, "Realizado", "Suma de valores");
        
        return redirect()->back()->with('mensaje1','Calculo realizado');;
     }else{

        return redirect()->back()->with('mensaje2','Activar queue Porfavor');
     }

    }
}