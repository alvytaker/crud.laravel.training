@extends('master')

@section('body')
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Usuarios Laravel Query</h1>
          {{--<a href="javascript:location.reload()">Actualizar página</a>--}}
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
  <button class="btn btn-info" data-toggle="modal" data-target="#AddUser">
    Agregar Usuario
</button>
<td><a href="{{ route('exportarexcel') }}" class="btn btn-success">Exportar Excel</a></td>
<td><a href="{{ route('emailusers') }}" class="btn btn-warning">Enviar excel a correos</a></td>
</div>
@include('usuarios/ModalConstructorLaravel/ModalAdd')
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
                    <table id="datatableCliente" class="table table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Profesion</th>
                                <th>Region</th>
                                <th>Comuna</th>
                            </tr>
                        </thead>
                        <tbody>

                          @foreach($users as $posicion => $user)
                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name_user}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->title}}</td>
                            <td>{{$user->name_region}}</td>
                            <td>{{$user->name_comuna}}</td>
                             <td style="text-align: center;">  
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editUser{{ $user->id }}">
                                <i class="zmdi zmdi-refresh-sync zmdi-hc-lg" title="Actualizar Registro"></i>  
                              </button>

                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteUser{{ $user->id }}">
                                <i class="zmdi zmdi-delete zmdi-hc-lg" title="Eliminar Registro"></i>  
                              </button>

                              <a href="{{ route('exportexcelid', $user->id)}}" type="button" class="btn btn-success">
                                <i class="far fa-file-excel" title="Exporta excel"></i> 
                              </a>
                            </td>
                           
                        </tr>

                        @include('usuarios/ModalConstructorLaravel/ModalEdit')

                        @include('usuarios/ModalConstructorLaravel/ModalDelete')
                      
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
@endsection

@section('js')

<script>

  $("#regionadd").change(function(){
      comunas();
    });

  function comunas(){
    document.getElementById("comunaadd").innerHTML = null;
    $.ajax({
              url:  '{{route('cargarcomunas')}}',
              method: 'GET' ,
              data:$("#regionadd").serialize()

              }).done(function(com){
               arreglo = JSON.parse(com);
               for (var i=0; i<arreglo.length; i++) { 
             todo = '<option value="'+arreglo[i].id+'">'+arreglo[i].name+'</option>';

             $('#comunaadd').append(todo);
               }
              });
    }


</script>

<script>
$("#regionedit").change(function(){
     
      comunasedit();
    });

    function comunasedit(){
    document.getElementById("comunaedit").innerHTML = null;
    $.ajax({
              url:  '{{route('cargarcomunasedit')}}',
              method: 'GET' ,
              data:$("#regionedit").serialize()

              }).done(function(com){
               arreglo = JSON.parse(com);
               for (var i=0; i<arreglo.length; i++) { 
             todo = '<option value="'+arreglo[i].id+'">'+arreglo[i].name+'</option>';

             $('#comunaedit').append(todo);
               }
              });
    }
</script>

@stop

