@extends('master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('user.viewHealthComparisonTracking') }}" class="btn btn-success">Reset</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row" id="bar_chart_data">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Health Comparison Bar Chart</h4>
                        </div>
                        @if (!$output_array)
                            <strong class="text-danger"
                                style="text-align: center; margin-top: 20px; margin-bottom: 20px;">No Data Found!</strong>
                        @else
                            <div class="card-body">
                                <div id="barchart_material" style="height: 500px;"></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>
@endsection

@section('custom_js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Financial Year', 'Total Budget', 'Expense', 'Remaining'],

                <?php echo $output_array; ?>
            ]);

            var options = {
                chart: {
                    title: 'Union Health Budget',
                    subtitle: 'Total Budget, Expense, and Remaining',
                },
                bars: 'verticle', // Required for Material Bar Charts.
                hAxis: {
                    format: 'decimal'
                },
                // colors: ['#1b9e77', '#d95f02', '#7570b3']
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
@endsection
