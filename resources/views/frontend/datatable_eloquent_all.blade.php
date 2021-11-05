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
                    <h3 class="card-title">Ejemplo de datatable con eloquent</h3>
                </div>
                <div class="card-body p-0">
                  <div class="alert">
                    <h5>Nota</h5>
                    <p>Este ejemplo extrae la data desde la base de datos usando el comando de eloquent Empleado::All()</p>
                    <p>esto significa que toda la data se carga en el navegador del usuario y al filtrar o avanzar en la tabla, esto se realiza en el computador del usuario</p> 
                    <p>El uso de eloquent es recomendado para pequeños sets de datos permitiendo un desarrollo ágil y un breve tiempo de respuesta a los requerimientos del cliente</p>
                    <p>Cuando el set de datos crece o se vuelve mas complejo, la pagina web tardara más en cargar, esto requiere una optimización</p>
                    <p>Opciones de optimización: usar paginación con datatable remoto ; cambiar eloquent por querybuilder o storedprocedures</p> 
                  </div>
                    <table id="example2" class="table table-bordered table-hover">
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
							@foreach($data as $item)
								<tr>
									<td>{{$item->CORRELATIVO}}</td>
									<td>{{$item->NOMBRE}}</td>
									<td>{{$item->TELEFONO_FIJO}}</td>
									<td>{{$item->CORREO}}</td>
									<td>{{$item->Sucursal ? $item->Sucursal->NOMBRE : 'Sin sucursal'}}</td>
									<td>{{$item->Cargo ? $item->Cargo->NOMBRE : 'Sin cargo'}}</td>
									<td>{{$item->Usuario ? $item->Usuario->USUARIO : 'Sin usuario'}}</td>
								</tr>
							@endforeach
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
      $("#example2").dataTable()
    });
</script>

@stop
