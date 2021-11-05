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
          <h1 class="m-0">Datatables</h1>
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
                    <h3 class="card-title">Ejemplo de datatable remoto</h3>
                </div>
                <div class="card-body p-0">
                  <div class="alert">
                    <h5>Nota</h5>
                    <p>Este ejemplo se divide en 2 páginas: una para la base html y otra para cargar los datos por ajax</p>
                    <p>al cargar la página html esta viene vacía, una vez cargada se envia una petición al servidor con lo siguiente parametros:</p> 
                    <ul>
                      <li>draw : id secuencial de la petición</li>
                      <li>start : indica el punto de inicio del set a extraer</li>
                      <li>order : orden ascendente o descendente</li>
                      <li>columns : listado de columnas del datatable</li>
                      <li>search : valor buscado en el filtro del datatable</li>
                    </ul>
                    <p>Con la información proporcionada al controlador ajax, este busca y ordena la data para avanzar una página a la vez</p> 
                  </div>
                    <table id="datatable_remoto" class="table table-bordered table-hover">
                        <thead>
							<tr>
								<th>Correlativo</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Email</th>
								<th>Sucursal</th>
								<th>Cargo</th>
								<th>Usuario</th>
							</tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
							<tr>
								<th>Correlativo</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Email</th>
								<th>Sucursal</th>
								<th>Cargo</th>
								<th>Usuario</th>
							</tr>
                        </tfoot>
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
    $(function () {
      $("#datatable_remoto").DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('datatable.remoto.ajax')}}",
         columns: [
            { data: 'CORRELATIVO' },
            { data: 'NOMBRE' },
            { data: 'TELEFONO_FIJO' },
            { data: 'CORREO' },
            { data: 'SUCURSAL' },
            { data: 'CARGO' },
            { data: 'USUARIO' },
         ]
      });
    });
</script>

@stop
