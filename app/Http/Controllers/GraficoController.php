<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comuna;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class GraficoController extends Controller
{
    //
    public function graficoBarrasComunas()
    {
        $this->checkSquema();
        $this->checkDataModels();

        $comunasPorRegion = Region::select('name as region', DB::raw('(SELECT COUNT(*) FROM comunas WHERE comunas.region_id = regiones.id) as comunas'))->orderBy('id')->pluck('comunas', 'region')->toArray();

        return view('frontend.grafico-comunas', compact('comunasPorRegion'));
    }


    protected function checkSquema(){
        $squemaRegiones = Schema::hasTable('regiones');
        $squemaComunas  = Schema::hasTable('comunas');
        if(!$squemaComunas || !$squemaRegiones){
            dd("
                == EJECUTAR EL SIGUIENTE COMANDO PARA CREAR TABLAS ==

                php artisan migrate
                2 - php artisan db:seed
            ");
        }

        return;
    }


    protected function checkDataModels(){
        $totalRegiones = Region::count();
        $totalComunas  = Comuna::count();
        if(!$totalRegiones || !$totalComunas){
            dd("
                == EJECUTAR EL SIGUIENTE COMANDO PARA CARGAR INFORMACIÓN ==

                php artisan db:seed
            ");
        }

        return;
    }

}
