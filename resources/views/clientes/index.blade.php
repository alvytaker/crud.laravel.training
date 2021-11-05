@extends('master')
@section('css')
<link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop
@section('body')

 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Clientes</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body p-0">
                    <table id="datatableCliente" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($clientes  as $cliente)
                          <tr>
                            <th scope="row">{{$cliente->id}}</th>
                            <td>{{$cliente->CODIGO}}</td>
                            <td>{{$cliente->NOMBRE}}</td>
                            
                           
                        </tr>
                          
                          @endforeach()
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
@stop
@section('js')

<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function(){
        tablaContenido = $('#datatableCliente').dataTable({
            processing: true,
            serverSide: true,
            bInfo : false,
            ajax:{
                url: "{{ route('clientes.datos') }}", // Change this URL to where your json data comes from
                type: "GET" // This is the default value, could also be POST, or anything you want.
            },
            responsive: true,
            stateSave: false,
            columns: [
                { data: 'ID', name: 'id' },
                { data: 'CODIGO', name: 'codigo' },
                { data: 'NOMBRE', name: 'nombre' },
                { data: 'opciones', name: 'opciones' },
            ],
            aLengthMenu: [5, 10, 20, 50, 100, 500],
            order: [[ 0, "asc" ]],
        });


    });


    // VER REGISTRO
    $('#datatableCliente').on('click','.ver-cliente',function(e){
        e.preventDefault();
        const clienteId = $(this).data().id;
        console.log(clienteId);
    });


</script>

@stop
