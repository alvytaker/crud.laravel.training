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
          <h1 class="m-0">Binding de Eventos</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabla para ejercicios</h3>
                </div>
                <div class="card-body p-0">
                    <table id="tabla_ejercicio" class="table">
                      <thead>
                        <th>Sigla</th>
                        <th>Detalle</th>
                        <th>Acción</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>EXP</td>
                          <td>EXP</td>
                          <td><button class="btn btn-success btn-repetir">repetir detalle</button></td>
                        </tr>
                        <tr>
                          <td>ETL</td>
                          <td>ETL</td>
                          <td><button class="btn btn-success btn-repetir">repetir detalle</button></td>
                        </tr>
                        <tr>
                          <td>QA</td>
                          <td>QA</td>
                          <td><button class="btn btn-success btn-repetir">repetir detalle</button></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table">
                      <thead>
                        <th>Boton</th>
                        <th>Descripción</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td><button class="btn btn-warning btn-binding-todo">binding todo</button></td>
                          <td>añade la funcion de repetir a todos los botones de clase btn-repetir</td>
                        </tr>
                        <tr>
                          <td><button class="btn btn-warning btn-quitar-binding">quitar binding</button></td>
                          <td>quita el binding a todos los botones de clase btn-repetir</td>
                        </tr>
                        <tr>
                          <td><button class="btn btn-warning btn-agregar-fila">agregar fila</button></td>
                          <td>se añade una nueva fila como HTML</td>
                        </tr>
                        <tr>
                          <td><button class="btn btn-warning btn-agregar-fila-binding">agregar fila con binding</button></td>
                          <td>se añade una nueva fila como HTML y le añade la funcion de repetir</td>
                        </tr>
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

<script>
    // binding inicial
    function repetir(){
              var texto_sigla = $(this).parent('td').parent('tr').find('td:nth-child(1)').text();
              var texto_detalle = $(this).parent('td').parent('tr').find('td:nth-child(2)').text();
              var concatenar = texto_detalle + '|' + texto_sigla ;
              $(this).parent('td').parent('tr').find('td:nth-child(2)').text(concatenar);
    }
    
    $('.btn-repetir').click(repetir);

    $('.btn-binding-todo').click(function(){
        $('.btn-repetir').click(repetir);
    });
    $('.btn-quitar-binding').click(function(){
        $('.btn-repetir').unbind('click');
    });  
    $('.btn-agregar-fila').click(function(){
      var nueva_fila = '<tr><td>NEW</td><td>NEW</td><td><button class="btn btn-success btn-repetir">repetir detalle</button></td></tr>';
      $('#tabla_ejercicio tbody').append(nueva_fila);
    });
    $('.btn-agregar-fila-binding').click(function(){
          var nueva_fila = '<tr><td>BIN</td><td>BIN</td><td><button class="btn btn-success btn-repetir">repetir detalle</button></td></tr>';
          $('#tabla_ejercicio tbody').append(nueva_fila);
          $('#tabla_ejercicio  tbody tr:last-child .btn-repetir').click(repetir);
          
    });  

</script>

@stop
