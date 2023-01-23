@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #5314b1;">
                            <h3 class="card-title">Filter</h3>
                        </div>
                        <form action="{{ route('admin.healthComparisonReport') }}" method="get">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Union Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('union_name') is-invalid @enderror"
                                                name="union_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($unions as $union)
                                                    <option value="{{ $union->id }}">
                                                        {{ $union->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('union_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('union_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From Financial Year:</label>
                                            <select
                                                class="form-control select2bs4 @error('from_financial_year') is-invalid @enderror"
                                                name="from_financial_year">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->year_name }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('from_financial_year'))
                                                <p class="text-danger mt-1">{{ $errors->first('from_financial_year') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To Financial Year:</label>
                                            <select
                                                class="form-control select2bs4 @error('to_financial_year') is-invalid @enderror"
                                                name="to_financial_year">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->year_name }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('to_financial_year'))
                                                <p class="text-danger mt-1">{{ $errors->first('to_financial_year') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-success" style="margin-top: 32px">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Health Comparison Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="barchart_material" style="height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>

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
