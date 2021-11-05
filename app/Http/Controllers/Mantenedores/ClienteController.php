<?php

namespace App\Http\Controllers\Mantenedores;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ClienteController extends Controller
{

    public function index(){

        $clientes = Cliente::select('id','CODIGO','NOMBRE')->get();
        return view('clientes.index', compact('clientes'));

    }

    public function getListaClientes(){
        $query = Cliente::query();
        $query->select('ID', 'CODIGO', 'NOMBRE');

        //Docs Datatables:
        //https://github.com/yajra/laravel-datatables

        return Datatables::of($query)

        ->addColumn('opciones', function ($dato){
            $id = $dato->ID;
            $btns = "
                <button data-id='".$id."' title='Ver más información' type='button' class='btn btn-block bg-gradient-info btn-xs ver-cliente'>Ver Cliente</button>
            ";
            return $btns;
        })

        ->rawColumns(['opciones'])
        ->make(true);
    }

    public function show(Request $request){
        $clienteId = $request->cliente;
    }

}
