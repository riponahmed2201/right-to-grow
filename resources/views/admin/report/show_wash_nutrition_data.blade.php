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
                                        <th class="text-center">Wash and Nutrition Budget Head</th>
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
                                        <td class="text-right text-bold">Total Wash</td>
                                        <td class="text-right text-bold">{{ $wash_total_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_expense_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_remaining_budget }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Nutrition</td>
                                        <td class="text-right text-bold">{{ $nutrition_total_budget }}</td>
                                        <td class="text-right text-bold">{{ $nutrition_expense_budget }}</td>
                                        <td class="text-right text-bold">{{ $nutrition_remaining_budget }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Wash and Nutrition</td>
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
                <div class="col-md-6">

                    <!-- PIE CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Health Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="pieChart" style="height: 230px; min-height: 230px; display: block; width: 487px;"
                                width="487" height="230" class="chartjs-render-monitor"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('custom_js')
    <!-- ChartJS -->
    <script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js') }}"></script>

    <script>
        //Chart
        var ctx = document.getElementById("pieChart");
        var data = {
            datasets: [{
                data: [67, 10, 20, 30, 40, 50],
                backgroundColor: [
                    "#455C73",
                    "#9B59B6",
                    "#007bff",
                    "#fd7e14",
                    "#20c997",
                    "#dc3545",
                ],
                label: 'Health Chart' // for legend
            }],
            labels: [
                "Project",
                "Sell",
                "Product",
                "BankOrCash",
                "Purchage",
                "Order",
            ]
        };

        var pieChart = new Chart(ctx, {
            data: data,
            type: 'pie',
        });
        
        $(function() {
            // Pie chart
            if ($('#pieChart').length) {}
        })
    </script>
@endsection
