<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comuna;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class SelectController extends Controller
{
    //
    public function index()
    {
        $this->checkSquema();
        $this->checkDataModels();
        $regiones = Region::pluck('name', 'id');
        return view('frontend.select-anidado', compact('regiones'));
    }

    public function listarComunas(Request $request)
    {
        try {
            $regionId = $request->region;
            if(!$regionId){
                return response()->json(['mensaje' => 'Región ID no encontrado'], 404);
            }
            $comunas  = Comuna::select('id', 'name')->where('region_id', $regionId)->orderBy('name')->get();
            return response()->json([
                'mensaje' => 'Comunas obtenidas correctamente',
                'comunas' => $comunas
            ]);
        } catch (Exception $error) {
            Log::error($error->getMessage());
            return response()->json([], 500);
        }
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
