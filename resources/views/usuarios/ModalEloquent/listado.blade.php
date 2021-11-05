@extends('master')

@section('body')
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Usuarios Eloquent</h1>
        </div>
      </div>
    </div>
    
  </div>

  <center>
  <div class="container">
    @if (session('mensaje1'))
    <div class="alert alert-info" id="msj">
     {{session('mensaje1')}}
    </div>
    @endif
  <button class="btn btn-success" data-toggle="modal" data-target="#AddUser">
    Agregar Usuario
</button>
</div>
@include('usuarios/ModalEloquent/ModalAdd')
</center>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="datatableCliente" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Profesion</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach($users as $posicion => $user)
                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->profession->title}}</td>
                             <td style="text-align: center;">  
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{ $user->id }}">
                                <i class="zmdi zmdi-refresh-sync zmdi-hc-lg" title="Actualizar Registro"></i>  
                              </button>

                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser{{ $user->id }}">
                                <i class="zmdi zmdi-delete zmdi-hc-lg" title="Eliminar Registro"></i>  
                              </button>
                          </td>
                           
                        </tr>

                        @include('usuarios/ModalEloquent/ModalEdit')
                        @include('usuarios/ModalEloquent/ModalDelete')
                      
                        @endforeach()

                        </tbody>
                        
                       
                    </table>
                  </div>
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
                { data: 'NOMBRE', name: 'codigo' },
                { data: 'EMAIL', name: 'nombre' },
                { data: 'PROFESION', name: 'profesion' },
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