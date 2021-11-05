@extends('master')

@section('body')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Registro Jobs</h1>
        </div>
      </div>
    </div>
</div>

<center>
  <div class="container">
    @if (session('mensaje1'))
    <div class="alert alert-info" id="msj">
      {{-- Recargamos la pagina luego de obtener el msj  --}}
      <meta http-equiv="refresh" content="7" >
     {{session('mensaje1')}}
    </div>
    @endif
    @if (session('mensaje2'))
    <div class="alert alert-danger" id="msj">
     {{session('mensaje2')}}
    </div>
    @endif
  <button class="btn btn-success" data-toggle="modal" data-target="#Jobs">
    Eventos
</button>
</div>
@include('JobsYQueue/ModalEventosJobs')
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
                              <th>Nombre Evento</th>
                              <th>Clase</th>
                              <th>Fecha Registro</th>
                              <th>Estado</th>
                              <th>Detalles</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($logjob as $log)
                        <tr>
                          <th scope="row">{{ $log->id }}</th>
                            <td>{{ $log->evento }}</td>
                            <td>{{ $log->controlador }}</td>
                            <td>{{ $log->fecha_registro }}</td>
                            <td>{{ $log->estado }}</td>
                            <td>{{ $log->detalle }}</td>
                         
                      </tr>
                      @endforeach

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

<script>
/*
var time = new Date().getTime();
$(document.body).bind("mousemove keypress", function () {
    time = new Date().getTime();
});

setInterval(function() {
    if (new Date().getTime() - time >= 5000) {
        window.location.reload(true);
    }
}, 1000); */
</script>
@stop