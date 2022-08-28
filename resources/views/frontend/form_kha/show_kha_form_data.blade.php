@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">Union Parishad Budget form "Kha"</h2>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <h5><u>Division Information:</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Financial Year</th>
                                    <th>Division</th>
                                    <th>District</th>
                                    <th>Upazila</th>
                                    <th>Union</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userInfo))
                                    <tr>
                                        <td>{{$userInfo[0]->financial_year}}</td>
                                        <td>{{$userInfo[0]->division_name}}</td>
                                        <td>{{$userInfo[0]->district_name}}</td>
                                        <td>{{$userInfo[0]->upazila_name}}</td>
                                        <td>{{$userInfo[0]->union_name}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="text-align: center; color: red" colspan="5">No Data Found!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <br>
                            <h5><u>User Information:</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userInfo))
                                    <tr>
                                        <td>
                                            <img style="width: 60px; height: 60px; border-radius: 50%"
                                                 src="{{ $userInfo[0]->photo ? asset('uploads/userPhoto/'.$userInfo[0]->photo)  : asset('assets/admin/dist/img/avatar5.png') }}"
                                                 alt="User Image">
                                        </td>
                                        <td>{{$userInfo[0]->name}}</td>
                                        <td>{{$userInfo[0]->designation}}</td>
                                        <td>{{$userInfo[0]->phone}}</td>
                                        <td>{{$userInfo[0]->email}}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="text-align: center; color: red" colspan="5">No Data Found!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <br>
                            <h5><u>Financial year of the R2G format 2021-22:</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-1: revenue income account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Income source statement</th>
                                    <th class="text-center">Actual income of last year</th>
                                    <th class="text-center">Current year budget or amended budget</th>
                                    <th class="text-center">Next year budget</th>
                                </tr>
                                <tr>
                                    <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                </tr>
                                </thead>

                                @php
                                    $last_year_total_amount = 0;
                                    $current_year_total_amount = 0;
                                    $next_year_total_amount = 0;
                                @endphp

                                @foreach($partOneRevenueIncomeAccountList as $partOneRevenueIncomeAccount)
                                    <thead>
                                    <tr>
                                        <th colspan="4"
                                            style="background-color: #ebebeb">{{ $partOneRevenueIncomeAccount->category_title }}</th>
                                    </tr>
                                    </thead>

                                    @php
                                        $partOneRevenueIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::select('SELECT b.id AS parent_category_id, b.parent_category_name,
                                                a.id, a.category_title_id, a.last_year_budget, a.current_year_budget, a.next_year_budget FROM
                                                `part_one_revenue_income_accounts` AS a
                                                LEFT JOIN `parent_categories` AS b ON a.parent_category_id = b.id
                                                WHERE a.category_type_id = 1 AND a.category_title_id='.$partOneRevenueIncomeAccount->category_title_id);
                                    @endphp


                                    @foreach($partOneRevenueIncomeAccountParentCategoryList as $partOneRevenueIncomeAccountParentCategory)
                                        <tbody>
                                        <tr>

                                            @php
                                                $last_year_total_amount += $partOneRevenueIncomeAccountParentCategory->last_year_budget;
                                                $current_year_total_amount += $partOneRevenueIncomeAccountParentCategory->current_year_budget;
                                                $next_year_total_amount += $partOneRevenueIncomeAccountParentCategory->next_year_budget;
                                            @endphp

                                            <td>{{ $partOneRevenueIncomeAccountParentCategory->parent_category_name }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->last_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->current_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->next_year_budget }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endforeach
                                <tbody>
                                <tr>
                                    <td>Initial Balance (1st July)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr style="font-weight: bold">
                                    <td>Total revenue income</td>
                                    <td style="text-align: end">@isset($last_year_total_amount)
                                            {{$last_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($current_year_total_amount)
                                            {{$current_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($next_year_total_amount)
                                            {{$next_year_total_amount}}
                                        @endisset</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-1: revenue income account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Income source statement</th>
                                    <th class="text-center">Actual income of last year</th>
                                    <th class="text-center">Current year budget or amended budget</th>
                                    <th class="text-center">Next year budget</th>
                                </tr>
                                <tr>
                                    <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Revenue</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-2: Development income account</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Income source statement</th>
                                    <th class="text-center">Actual income of last year</th>
                                    <th class="text-center">Current year budget or amended budget</th>
                                    <th class="text-center">Next year budget</th>
                                </tr>
                                <tr>
                                    <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Revenue</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-2: Development Expenditure account</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Income source statement</th>
                                    <th class="text-center">Actual income of last year</th>
                                    <th class="text-center">Current year budget or amended budget</th>
                                    <th class="text-center">Next year budget</th>
                                </tr>
                                <tr>
                                    <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Revenue</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-1: revenue income account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center">Income source statement</th>
                                    <th class="text-center">Actual income of last year</th>
                                    <th class="text-center">Current year budget or amended budget</th>
                                    <th class="text-center">Next year budget</th>
                                </tr>
                                <tr>
                                    <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Revenue</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                    <td style="text-align: end">0.00</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
