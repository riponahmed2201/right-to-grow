@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.viewDevelopmentExpenseBudgetTracking') }}" class="btn btn-success">Reset</a>
            </div>
        </div>
        <br>
        <div class="row" id="bar_chart_data">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Development Expense Budget Tracking Report Chart</h4>
                    </div>
                    @if (!$output_array)
                        <strong class="text-danger" style="text-align: center; margin-top: 20px; margin-bottom: 20px;">No
                            Data Found!</strong>
                    @else
                        <div class="card-body">
                            <div id="piechart" style="width: 900px; height: 500px;"></div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection

@section('custom_js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // var data = google.visualization.arrayToDataTable([<?php echo $output_array; ?>]);
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                <?php echo $output_array; ?>
            ]);

            var options = {
                title: 'Development Expense Budget Tracking Report Chart',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
