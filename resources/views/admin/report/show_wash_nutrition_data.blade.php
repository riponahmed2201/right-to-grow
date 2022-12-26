@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Wash and Nutrition Budget Report</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="subcategoryTableId" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4">Union Name: @if ($union_name)
                                                {{ $union_name }}
                                            @endif
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Wash and Nutrition Budget Head @if ($financial_year_name)
                                                {{ $financial_year_name }}
                                            @endif
                                        </th>
                                        <th class="text-center">Total Budget</th>
                                        <th class="text-center">Expense Budget</th>
                                        <th class="text-center">Remaining Budget</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td style="background-color: #acb9ca" colspan="4">স্বাস্থ্যঃ (পল্লী জল
                                            সরবরাহের ব্যাবস্থা, স্বল্প ব্যয়ে পায়খানা নির্মাণ, স্যানিটেশন,স্বাস্থ্যগত
                                            পরিচ্ছন্নতা ও পরিবার পরিকল্পনা, প্রাথমিক স্বাস্থ্য পরিচর্যা ও পুষ্টি, ইপিআই
                                            কর্মসূচি প্রভৃতি)</td>
                                    </tr>

                                    @php
                                        $wash_total_budget = 0;
                                        $wash_expense_budget = 0;
                                        $wash_remaining_budget = 0;
                                        
                                        $nutrition_total_budget = 0;
                                        $nutrition_expense_budget = 0;
                                        $nutrition_remaining_budget = 0;
                                        
                                    @endphp


                                    @foreach ($wash_data as $wash_value)
                                        @php
                                            $wash_total_budget += $wash_value->total_budget;
                                            $wash_expense_budget += $wash_value->expense_budget;
                                            $wash_remaining_budget += $wash_value->remaining_budget;
                                        @endphp

                                        <tr>
                                            <td>{{ $wash_value->subcategory_name }}</td>
                                            <td class="text-right">{{ $wash_value->total_budget }}</td>
                                            <td class="text-right">{{ $wash_value->expense_budget }}</td>
                                            <td class="text-right">{{ $wash_value->remaining_budget }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td style="background-color: #acb9ca" colspan="4">ওয়াস এবং সেনিটেসন</td>
                                    </tr>

                                    @foreach ($nutrition_data as $nutrition_value)
                                        @php
                                            $nutrition_total_budget += $nutrition_value->total_budget;
                                            $nutrition_expense_budget += $nutrition_value->expense_budget;
                                            $nutrition_remaining_budget += $nutrition_value->remaining_budget;
                                        @endphp

                                        <tr>
                                            <td>{{ $nutrition_value->subcategory_name }}</td>
                                            <td class="text-right">{{ $nutrition_value->total_budget }}</td>
                                            <td class="text-right">{{ $nutrition_value->expense_budget }}</td>
                                            <td class="text-right">{{ $nutrition_value->remaining_budget }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right text-bold">Total Wash @if ($financial_year_name)
                                                {{ $financial_year_name }}
                                            @endif
                                        </td>
                                        <td class="text-right text-bold">{{ $wash_total_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_expense_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_remaining_budget }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Nutrition @if ($financial_year_name)
                                                {{ $financial_year_name }}
                                            @endif
                                        </td>
                                        <td class="text-right text-bold">{{ $nutrition_total_budget }}</td>
                                        <td class="text-right text-bold">{{ $nutrition_expense_budget }}</td>
                                        <td class="text-right text-bold">{{ $nutrition_remaining_budget }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Wash and Nutrition @if ($financial_year_name)
                                                {{ $financial_year_name }}
                                            @endif
                                        </td>
                                        <td class="text-right text-bold">{{ $wash_total_budget + $nutrition_total_budget }}
                                        </td>
                                        <td class="text-right text-bold">
                                            {{ $wash_expense_budget + $nutrition_expense_budget }}</td>
                                        <td class="text-right text-bold">
                                            {{ $wash_remaining_budget + $nutrition_remaining_budget }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Health Budget Chart</h3>
                        </div>
                        <div class="card-body">
                            <div id="health_piechart" style="height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('custom_js')
    <script type="text/javascript" src="{{ asset('assets/admin/plugins/googleChart/loader.js') }}"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Budget', 'Budget Amount'],
                <?php echo $output_array; ?>
            ]);

            var options = {
                pieSliceText: 'label',
                pieStartAngle: 100,
            };

            var chart = new google.visualization.PieChart(document.getElementById('health_piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection
