@extends('master')

@section('body')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Registro Queues</h1>
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
      <div class="container">
        @if (session('mensaje2'))
        <div class="alert alert-danger" id="msj">
         {{session('mensaje2')}}
        </div>
        @endif
    <button class="btn btn-success" data-toggle="modal" data-target="#Queue">
      Eventos
  </button>
  </div>
  @include('JobsYQueue/ModalEventosQueue')
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
                                <th>Nombre Evento</th>
                                <th>Controlador</th>
                                <th>Fecha Registro</th>
                                <th>Estado</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($logqueue as $log)
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