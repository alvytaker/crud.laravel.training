@extends('master')

@section('body')

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <h1 class="m-0">Temario</h1>
          <div class="alert alert-warning">
            <p>El objetivo de esta sección es contar con un conjunto de ejemplos de código disponible para los desarrolladores</p>
            <p>En el costasdo izquerdo se encuentra el temario de documentación Laravel a estudiar y practicar</p>
            <p>En el costasdo derecho se encuentran temas sugeridos a desarrollar para frontend y backend</p>
            <p>Actividad de crecimiento: Se espera que cada desarrollador tome 1 tema específico y desarrolle un código de ejemplo breve para compartir con los colaboradores, el tiempo de iteración esperdo es de 1 a 2 semanas, suma puntos escojer un tema que sea de utilidad en proyectos con clientes</p>
        </div>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-3">
            <p>Temario laravel</p>
            <table class="table">
                <thead class="thead-dark">
                    <th>Categoría</th>
                    <th>Tema</th>
                </thead>
                <tbody>
                    <tr><td><b>Architecture Concepts</b></td><td><a href="https://laravel.com/docs/6.x/tdfecycle">Request tdfecycle</a></td></tr>
                    <tr><td><b>Architecture Concepts</b></td><td><a href="https://laravel.com/docs/6.x/container">Service Container</a></td></tr>
                    <tr><td><b>Architecture Concepts</b></td><td><a href="https://laravel.com/docs/6.x/providers">Service Providers</a></td></tr>
                    <tr><td><b>Architecture Concepts</b></td><td><a href="https://laravel.com/docs/6.x/facades">Facades</a></td></tr>
                    <tr><td><b>Architecture Concepts</b></td><td><a href="https://laravel.com/docs/6.x/contracts">Contracts</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/routing">Routing</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/middleware">Middleware</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/csrf">CSRF Protection</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/controllers">Controllers</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/requests">Requests</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/responses">Responses</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/views">Views</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/urls">URL Generation</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/session">Session</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/vatddation">Vatddation</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/errors">Error Handtdng</a></td></tr>
                    <tr><td><b>The Basics</b></td><td><a href="https://laravel.com/docs/6.x/logging">Logging</a></td></tr>
                    <tr><td><b>Frontend</b></td><td><a href="https://laravel.com/docs/6.x/blade">Blade Templates</a></td></tr>
                    <tr><td><b>Frontend</b></td><td><a href="https://laravel.com/docs/6.x/locatdzation">Locatdzation</a></td></tr>
                    <tr><td><b>Frontend</b></td><td><a href="https://laravel.com/docs/6.x/frontend">Frontend Scaffolding</a></td></tr>
                    <tr><td><b>Frontend</b></td><td><a href="https://laravel.com/docs/6.x/mix">Compitdng Assets</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/authentication">Authentication</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/api-authentication">API Authentication</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/authorization">Authorization</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/verification">Email Verification</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/encryption">Encryption</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/hashing">Hashing</a></td></tr>
                    <tr><td><b>Security</b></td><td><a href="https://laravel.com/docs/6.x/passwords">Password Reset</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/artisan">Artisan Console</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/broadcasting">Broadcasting</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/cache">Cache</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/collections">Collections</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/events">Events</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/filesystem">File Storage</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/helpers">Helpers</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/mail">Mail</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/notifications">Notifications</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/packages">Package Development</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/queues">Queues</a></td></tr>
                    <tr><td><b>Digging Deeper</b></td><td><a href="https://laravel.com/docs/6.x/schedutdng">Task Schedutdng</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/database">Getting Started</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/queries">Query Builder</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/pagination">Pagination</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/migrations">Migrations</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/seeding">Seeding</a></td></tr>
                    <tr><td><b>Database</b></td><td><a href="https://laravel.com/docs/6.x/redis">Redis</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent">Getting Started</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent-relationships">Relationships</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent-collections">Collections</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent-mutators">Mutators</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent-resources">API Resources</a></td></tr>
                    <tr><td><b>Eloquent ORM</b></td><td><a href="https://laravel.com/docs/6.x/eloquent-seriatdzation">Seriatdzation</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/testing">Getting Started</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/http-tests">HTTP Tests</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/console-tests">Console Tests</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/dusk">Browser Tests</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/database-testing">Database</a></td></tr>
                    <tr><td><b>Testing</b></td><td><a href="https://laravel.com/docs/6.x/mocking">Mocking</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/biltdng">Cashier</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/dusk">Dusk</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/envoy">Envoy</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/horizon">Horizon</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/passport">Passport</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/scout">Scout</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/sociatdte">Sociatdte</a></td></tr>
                    <tr><td><b>Official Packages</b></td><td><a href="https://laravel.com/docs/6.x/telescope">Telescope</a></td></tr>                    
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <p>ejemplos plugins</p>
            <table class="table">
                <thead class="thead-dark">
                    <th>Tema</th>
                    <th>Descripción</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Datatable</td>
                        <td>datatable basico, remoto o con paginación</td>
                    </tr>
                    <tr>
                        <td>Modals</td>
                        <td>modal basico, remoto, modal dinamico por cada fila en tabla</td>
                    </tr>
                    <tr>
                        <td>select y select2</td>
                        <td>select basico, select2, select multiple, formatos</td>
                    </tr>
                    <tr>
                        <td>datepicket</td>
                        <td>selector de fecha, guardar y editar fecha, seleccionar rangos</td>
                    </tr>
                    <tr>
                        <td>calendar</td>
                        <td>calendario semanal</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <p>ejemplos backend</p>
            <table class="table">
                <thead class="thead-dark">
                    <th>Tema</th>
                    <th>Descripción</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Jobs</td>
                        <td>contruccion de jobs, agendamiento, ejecucion bajo demanda, best practices</td>
                    </tr>
                    <tr>
                        <td>Archivos</td>
                        <td>Subir y bajar archivos, estructura de carpetas, modelo de datos recomendado</td>
                    </tr>
                    <tr>
                        <td>Exportar Excel</td>
                        <td>Archivo básico, archivo con varias hojas, formato de celdas, colores, imagenes</td>
                    </tr>
                    <tr>
                        <td>Exportar PDF</td>
                        <td>Archivo básico, archivo con varias hojas, formato de celdas, colores, imagenes</td>
                    </tr>
                    <tr>
                        <td>Logs</td>
                        <td>Log básico laravel, log personalizado, log por controlador o proceso</td>
                    </tr>
                    <tr>
                        <td>Try-Catch y Excepciones</td>
                        <td>practicas recomendadas, reporte de excepciones, </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-3">
            <p>Eloquent, Query Builder, SQL</p>
            <table class="table">
                <thead class="thead-dark">
                    <th>Tema</th>
                    <th>Descripción</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Eloquent</td>
                        <td>atributos y relaciones, softdelete</td>
                    </tr>
                    <tr>
                        <td>Querybuilder</td>
                        <td>querys con multiples tablas, filtro dinámico, esquema dinámico</td>
                    </tr>
                    <tr>
                        <td>SQL</td>
                        <td>topicos avanzadso</td>
                    </tr>
                    <tr>
                        <td>Stored procedures</td>
                        <td>maneras de usar SP con laravel</td>
                    </tr>
                    <tr>
                        <td>Transactions</td>
                        <td>Transact, commit, rollback, log de transacciones</td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    
  </section>
@stop

{{-- <script>

    //Este metodo es para cargar un listado de datos a traves de filtros 

    //capturamos evento del select 
    $("#desde").change(irlic);
		$("#hasta").change(irlic);
		$("#area").change(irlic);
		$("#costo").change(irlic);
		$("#search").change(irlic);
		$("#estado").change(irlic);

		function irlic(){

			var area 	= $("#area").val();
			var desde 	= $("#desde").val();
			var hasta 	= $("#hasta").val();
			var estado 	= $("#estado").val();
			var data 	= $("#search").val();
			var costo 	= $("#costo").val();
 //enviamos parametros a la funcion que se encarga de cargar la vista "licencias"
			var url= "{{ route('Licencias') }}?desde="+desde+"&hasta="+hasta+"&area="+area+"&estado="+estado+"&data="+data+"&costo="+costo;
	 recargamos la pagina siempre y cuando se haya seleccionado un filtro 		
        window.location = (url); 
		} 
</script> --}}