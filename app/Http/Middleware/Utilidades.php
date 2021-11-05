<?php

namespace App\Http\Middleware;
use DB;

class Utilidades {


    public function reg_log($evento, $controlador, $fecha_inicio, $estado, $detalles){

      DB::table('logQueue')->insert([
         'evento'=> $evento,
         'controlador'=>$controlador,
         'fecha_registro'=>$fecha_inicio,
         'estado'=> $estado,
         'detalle'=>$detalles,

      ]);

    }

    
   public function reg_logJobs($evento, $controlador, $fecha_inicio, $estado, $detalles){

      DB::table('logjob')->insert([
         'evento'=> $evento,
         'controlador'=>$controlador,
         'fecha_registro'=>$fecha_inicio,
         'estado'=> $estado,
         'detalle'=>$detalles,

      ]);

    }

    public function reg_logJobsupdatefecha($idjobs, $estados, $detalles){

    $event = DB::table('logjob')
    ->where('id','=',$idjobs)
    ->where('evento','=', 'updatefecha()')->update([
        'estado'=> $estados,
        'detalle'=>$detalles,
      ]);

    if($event){
      DB::table('logjob')
      ->where('estado','=', 'En ejecucion')
      ->where('evento','=', 'updatefecha()')
      ->update([
        'estado'=> $estados,
        'detalle'=>$detalles,
      ]);
     } 

    }

    public function reg_logJobsupdatevalidacion($idjobs, $estados, $detalles){

      $event = DB::table('logjob')
      ->where('id','=',$idjobs)
      ->where('evento','=', 'emailsrepetidos()')->update([
          'estado'=> $estados,
          'detalle'=>$detalles,
        ]);
  
      if($event){
        DB::table('logjob')
        ->where('estado','=', 'En ejecucion')
        ->where('evento','=', 'emailsrepetidos()')
        ->update([
          'estado'=> $estados,
          'detalle'=>$detalles,
        ]);
       } 
  
      }



}