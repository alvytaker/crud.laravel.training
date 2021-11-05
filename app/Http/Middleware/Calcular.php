<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Middleware\Utilidades;
use DB;

class Calcular implements ShouldQueue{


    public function calcular(){

        $sum = 3*4;
        $result = 12+$sum;
         
     return $result;
    }


}