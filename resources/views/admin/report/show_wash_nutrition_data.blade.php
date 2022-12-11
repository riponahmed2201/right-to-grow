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
                                        <th>Wash and Nutrition Budget Head 2022-23</th>
                                        <th>Total Budget</th>
                                        <th>Expense Budget</th>
                                        <th>Remaining Budget</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @php
                                        $wash_and_nutrition_tota_budget = 0;
                                        $wash_and_nutrition_expense_budget = 0;
                                        $wash_and_nutrition_remaining_budget = 0;
                                    @endphp

                                    @foreach ($wash_nutritions as $wash_nutrition)
                                        @php
                                            $wash_and_nutrition_tota_budget += $wash_nutrition->total_budget;
                                            $wash_and_nutrition_expense_budget += $wash_nutrition->expense_budget;
                                            $wash_and_nutrition_remaining_budget += $wash_nutrition->remaining_budget;
                                        @endphp

                                        <tr>
                                            <td></td>
                                            <td class="text-right">{{ $wash_nutrition->total_budget }}</td>
                                            <td class="text-right">{{ $wash_nutrition->expense_budget }}</td>
                                            <td class="text-right">{{ $wash_nutrition->remaining_budget }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-right">Total Wash</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Total Nutrition</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Total Wash and Nutrition 2022-23</td>
                                        <td class="text-right">{{ $wash_and_nutrition_tota_budget }}</td>
                                        <td class="text-right">{{ $wash_and_nutrition_expense_budget }}</td>
                                        <td class="text-right">{{ $wash_and_nutrition_remaining_budget }}</td>
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
@endsection

@section('custom_js')
@endsection
