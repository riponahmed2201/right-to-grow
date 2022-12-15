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

                                    @foreach ($wash_nutritions as $key => $wash_nutrition_data)
                                        <tr>
                                            <td style="background-color: #acb9ca" colspan="4">{{ $key }}</td>
                                        </tr>

                                        @php
                                            $wash_and_nutrition_tota_budget = 0;
                                            $wash_and_nutrition_expense_budget = 0;
                                            $wash_and_nutrition_remaining_budget = 0;
                                        @endphp

                                        @foreach ($wash_nutrition_data as $wash_nutrition)
                                            @php
                                                $wash_and_nutrition_tota_budget += $wash_nutrition['total_budget'];
                                                $wash_and_nutrition_expense_budget += $wash_nutrition['expense_budget'];
                                                $wash_and_nutrition_remaining_budget += $wash_nutrition['remaining_budget'];
                                            @endphp

                                            <tr>
                                                <td>{{ $wash_nutrition['subcategory_name'] }}</td>
                                                <td class="text-right">{{ $wash_nutrition['total_budget'] }}</td>
                                                <td class="text-right">{{ $wash_nutrition['expense_budget'] }}</td>
                                                <td class="text-right">{{ $wash_nutrition['remaining_budget'] }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    <tr>
                                        <td class="text-right text-bold">Total Wash</td>
                                        <td class="text-right text-bold">0</td>
                                        <td class="text-right text-bold">0</td>
                                        <td class="text-right text-bold">0</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Nutrition</td>
                                        <td class="text-right text-bold">0</td>
                                        <td class="text-right text-bold">0</td>
                                        <td class="text-right text-bold">0</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right text-bold">Total Wash and Nutrition</td>
                                        <td class="text-right text-bold">{{ $wash_and_nutrition_tota_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_and_nutrition_expense_budget }}</td>
                                        <td class="text-right text-bold">{{ $wash_and_nutrition_remaining_budget }}</td>
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
