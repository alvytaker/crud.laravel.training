<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <!--Bootsrap 4 CDN-->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
   
    <title>Laravel Training</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <link rel="stylesheet" href="/dist/css/adminlte.min.css">
   <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
   @yield('css')
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('welcome') }}" class="nav-link">Inicio</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                </a>
              </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('welcome') }}" class="brand-link">
                <span class="brand-text font-weight-light">Laravel Training</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Temario de Ejemplos
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            DataTables
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="/ejemplos/datatable/datatable_basico" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Datatable básico</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('datatable.eloquent')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Datatable con eloquent</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('datatable.remoto')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Datatable remoto (json)</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            Javascript y Jquery
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="/ejemplos/js/binding" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Binding de Eventos</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            Select
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="{{ route('select') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Select Anidado</p>
                            </a>
                          </li>
                        </ul>
                      </li>


                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            Gráficos
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                          <li class="nav-item">
                            <a href="{{ route('graficos.comunas') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Gráfico de Barras</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                      <li class="nav-item {{ Request::is('clientes*') ? 'menu-is-opening menu-open' : ''  }}">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            Mantenedores
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>

                      <ul class="nav nav-treeview" style="{{ Request::is('clientes*') ? 'display: block' : 'display: none'  }};">
                      <li class="nav-item">
                            <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Clientes</p>
                            </a>
                          </li>
                        </ul>
                      </li>

                  <li class="nav-item {{ Request::is('user*') ? 'menu-is-opening menu-open' : ''  }}">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-js"></i>
                          <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>

                        <ul class="nav nav-treeview" style="{{ Request::is('user*') ? 'display: block' : 'display: none'  }};">
                          <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('userEloquent') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Listado Eloquent</p>
                            </a>
                          </li>
                        </ul>

                        <ul class="nav nav-treeview" style="{{ Request::is('user*') ? 'display: block' : 'display: none'  }};" >
                          <li class="nav-item">
                            <a href="{{ route('userQueryPDO') }}" class="nav-link {{ Request::is('userQueryPDO') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Listado QueryPDO</p>
                            </a>
                          </li>
                        </ul>
                        
                        <ul class="nav nav-treeview" style="{{ Request::is('user*') ? 'display: block' : 'display: none'  }};">
                          <li class="nav-item">
                            <a href="{{ route('LaravelQuery') }}" class="nav-link {{ Request::is('userLaravelQuery') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Listado LaravelQuery</p>
                            </a>
                          </li>
                        </ul>

                        <ul class="nav nav-treeview " style="{{ Request::is('user*') ? 'display: block' : 'display: none'  }};">
                            <li class="nav-item">
                            <a href="{{ route('ListadoJobs') }}" class="nav-link {{ Request::is('userJobs') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Jobs</p>
                            </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview " style="{{ Request::is('user*') ? 'display: block' : 'display: none'  }};">
                          <li class="nav-item">
                          <a href="{{ route('ListadoQueue') }}" class="nav-link {{ Request::is('userQueue') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Queue</p>
                          </a>
                          </li>
                      </ul>

                  </li>
                    

                      <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link">
                          <i class="nav-icon fas fa-arrow-left"></i>
                          <p>
                            Ménu principal
                          </p>
                        </a>
                      </li>

                    </ul>
                </nav>
            </div>
        </aside>

            <div class="content-wrapper">
                @yield('body')
            </div>
            <footer class="main-footer">
                <strong>Diseño basado en <a href="https://adminlte.io">AdminLTE 3.1.0</a></strong>
            </footer>

              <aside class="control-sidebar control-sidebar-dark">
              </aside>
        </div>

    
    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
  setTimeout(function () {
         $("#msj").fadeOut(1000);
     }, 5000); </script>
@yield('js')

</body>
</html>
