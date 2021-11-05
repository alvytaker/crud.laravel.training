@extends('master')
@section('css')

@stop
@section('body')

 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Gráfico de Barras</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">N° Comunas por Región</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <input type="hidden" name="numero_comunas" id="numero_comunas" value="{{ json_encode(array_values($comunasPorRegion)) }}">
  <input type="hidden" name="nombre_regiones" id="nombre_regiones" value="{{ json_encode(array_keys($comunasPorRegion)) }}">
@stop

@section('js')
<script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


     var areaChartData = {
        labels  : JSON.parse($("#nombre_regiones").val()),
        datasets: [
          {
            label               : 'N° Comunas',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : JSON.parse($("#numero_comunas").val())
          },
        ]
      }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp1 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp1

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })



  })
</script>
@stop
