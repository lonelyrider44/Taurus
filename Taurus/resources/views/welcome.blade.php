@extends('master')

@section('content')
<div class="container">
        <div class="row">
            
            <div class="col-sm-12">
    
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dobrodošli, {{ Auth::user()->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    
                    <div class="box-footer">
                            
                        </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('content.new')

<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Statistika pregleda</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            
                        </ul>
                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="text-center">
                           
                        </p>

                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                           
                            <canvas id="myChart" width="400" height="300"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Jun','Jul','Avgust','Septembar',
            'Oktobar', 'Novembar', 'Decembar'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                    
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<script>
$(function() {

            'use strict';

            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            // -----------------------
            // - MONTHLY SALES CHART -
            // -----------------------

            // Get context with jQuery - using jQuery's .get() method.
            var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
            // This will get the first returned node in the jQuery collection.
            var salesChart = new Chart(salesChartCanvas);

            var salesChartData = {
                labels: [   'Januar', 'Februar', 'Mart', 'April', 'Maj', 'Jun', 
                            'Jul', 'Avgust', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'],
                datasets: [{
                        label: 'Electronics',
                        fillColor: 'rgb(210, 214, 222)',
                        strokeColor: 'rgb(210, 214, 222)',
                        pointColor: 'rgb(210, 214, 222)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgb(220,220,220)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: 'Digital Goods',
                        fillColor: 'rgba(60,141,188,0.9)',
                        strokeColor: 'rgba(60,141,188,0.8)',
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };

            var salesChartOptions = {
                    // Boolean - If we should show the scale at all
                    showScale: true,
                    // Boolean - Whether grid lines are shown across the chart
                    scaleShowGridLines: false,
                    // String - Colour of the grid lines
                    scaleGridLineColor: 'rgba(0,0,0,.05)',
                    // Number - Width of the grid lines
                    scaleGridLineWidth: 1,
                    // Boolean - Whether to show horizontal lines (except X axis)
                    scaleShowHorizontalLines: true,
                    // Boolean - Whether to show vertical lines (except Y axis)
                    scaleShowVerticalLines: true,
                    // Boolean - Whether the line is curved between points
                    bezierCurve: true,
                    // Number - Tension of the bezier curve between points
                    bezierCurveTension: 0.3,
                    // Boolean - Whether to show a dot for each point
                    pointDot: false,
                    // Number - Radius of each point dot in pixels
                    pointDotRadius: 4,
                    // Number - Pixel width of point dot stroke
                    pointDotStrokeWidth: 1,
                    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                    pointHitDetectionRadius: 20,
                    // Boolean - Whether to show a stroke for datasets
                    datasetStroke: true,
                    // Number - Pixel width of dataset stroke
                    datasetStrokeWidth: 2,
                    // Boolean - Whether to fill the dataset with a color
                    datasetFill: true,
                    // String - A legend template
                    legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  maintainAspectRatio     : true,
  // Boolean - whether to make the chart responsive to window resizing
  responsive              : true
};

// Create the line chart
salesChart.Line(salesChartData, salesChartOptions);
});

// ---------------------------
// - END MONTHLY SALES CHART -
// ---------------------------
</script>
</div>
@endsection