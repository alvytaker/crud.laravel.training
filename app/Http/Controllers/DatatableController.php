<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class DatatableController extends Controller
{
    public function datatable_basico()
    {
        return view('frontend.datatable_basico');
    }

    public function datatable_eloquent_all()
    {
        $data = Empleado::All();
        return view('frontend.datatable_eloquent_all',['data' => $data]);
    }
    public function datatable_remoto()
    {
        return view('frontend.datatable_remoto');
    }
    public function datatable_remoto_ajax(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
   
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
   
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
   
        // Total records
        $totalRecords = Empleado::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Empleado::select('count(*) as allcount')->where('NOMBRE', 'like', '%' .$searchValue . '%')->count();
   
        // Fetch records
        $records = Empleado::orderBy($columnName,$columnSortOrder)
          ->where('EMPLEADO.NOMBRE', 'like', '%' .$searchValue . '%')
          ->select('EMPLEADO.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();
   
        $data_arr = array();
        
        foreach($records as $record){
           $CORRELATIVO = $record->CORRELATIVO;
           $NOMBRE = $record->NOMBRE;
           $TELEFONO_FIJO = $record->TELEFONO_FIJO;
           $CORREO = $record->CORREO;
           $SUCURSAL = $record->Sucursal ? $record->Sucursal->NOMBRE : 'Sin sucursal';
           $CARGO = $record->Cargo ? $record->Cargo->NOMBRE : 'Sin cargo';
           $USUARIO = $record->Usuario ? $record->Usuario->USUARIO : 'Sin usuario';
       
           $data_arr[] = array(
             "CORRELATIVO" => $CORRELATIVO,
             "NOMBRE" => $NOMBRE,
             "TELEFONO_FIJO" => $TELEFONO_FIJO,
             "CORREO" => $CORREO,
             "SUCURSAL" => $SUCURSAL,
             "CARGO" => $CARGO,
             "USUARIO" => $USUARIO
           );
        }
   
        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );
   
        echo json_encode($response);
        exit;
      }
    
}
