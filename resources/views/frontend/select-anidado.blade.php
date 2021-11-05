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
          <h1 class="m-0">Select Anidado</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-8 offset-2">
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Regiones y Comunas de Chile</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Región</label>
                        <select name="region" id="region" class="form-control select2" data-url="{{ route('select.listacomunas') }}">
                            <option value="">Seleccione Región</option>
                            @foreach ($regiones as $key => $item)
                            <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Comuna</label>
                        <select name="comuna" id="comuna" class="form-control select2">
                            <option value="">Seleccione Comuna</option>
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <div class="row">
                        <div id="div-msg" class="col-12 font-weight-bold text-center"></div>
                    </div>
                </div>

            </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('js')
<script src="{{ url('frontend/js/select-anidados.js') }}"></script>
@stop
