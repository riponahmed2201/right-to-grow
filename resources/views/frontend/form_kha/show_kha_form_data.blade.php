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
                                    <th style="width: 20%">Financial Year</th>
                                    <th style="width: 20%">Division</th>
                                    <th style="width: 20%">District</th>
                                    <th style="width: 20%">Upazila</th>
                                    <th style="width: 20%">Union</th>
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
                                    <th style="width: 20%">Photo</th>
                                    <th style="width: 20%">Name</th>
                                    <th style="width: 20%">Designation</th>
                                    <th style="width: 20%">Phone</th>
                                    <th style="width: 20%">Email</th>
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
                            <h5><u>Financial year of the R2G format @if(isset($userInfo[0]->financial_year))
                                        {{ $userInfo[0]->financial_year }}:
                                    @else
                                        2021-2022:
                                    @endif</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-1: revenue income account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 40%">Income source statement</th>
                                    <th class="text-center" style="width: 20%">Actual income of last year</th>
                                    <th class="text-center" style="width: 20%">Current year budget or amended budget
                                    </th>
                                    <th class="text-center" style="width: 20%">Next year budget</th>
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
                                        $query_one = 'SELECT b.id AS parent_category_id, b.parent_category_name,
                                                    a.id, a.category_title_id, a.last_year_budget, a.current_year_budget, a.next_year_budget FROM
                                                    `part_one_revenue_income_accounts` AS a
                                                    LEFT JOIN `parent_categories` AS b ON a.parent_category_id = b.id
                                                    WHERE a.category_type_id = 1 AND a.category_title_id = '.$partOneRevenueIncomeAccount->category_title_id.' '.'AND a.user_id = '.$userInfo[0]->id;

                                            $partOneRevenueIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::select($query_one);

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
                                    <th colspan="4">Part-1: revenue expenditure account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 40%">Income source statement</th>
                                    <th class="text-center" style="width: 20%">Actual income of last year</th>
                                    <th class="text-center" style="width: 20%">Current year budget or amended budget
                                    </th>
                                    <th class="text-center" style="width: 20%">Next year budget</th>
                                </tr>
                                </thead>

                                @php
                                    $p_one_exp_last_year_total_amount = 0;
                                    $p_one_exp_current_year_total_amount = 0;
                                    $p_one_exp_next_year_total_amount = 0;
                                @endphp

                                @foreach($partOneRevenueExpenditureAccountList as $partOneRevenueExpenditureAccount)
                                    <thead>
                                    <tr>
                                        <th colspan="4"
                                            style="background-color: #ebebeb">{{ $partOneRevenueExpenditureAccount->category_title }}</th>
                                    </tr>
                                    </thead>

                                    @php
                                        $query_two = 'SELECT b.id AS parent_category_id, b.parent_category_name,
                                                    a.id, a.category_title_id, a.last_year_budget, a.current_year_budget, a.next_year_budget FROM
                                                    `part_one_revenue_expenditure_accounts` AS a
                                                    LEFT JOIN `parent_categories` AS b ON a.parent_category_id = b.id
                                                    WHERE a.category_type_id = 2 AND a.category_title_id='.$partOneRevenueExpenditureAccount->category_title_id.' '.' AND a.user_id ='.$userInfo[0]->id;

                                            $partOneRevenueExpenditureAccountParentCategoryList = \Illuminate\Support\Facades\DB::select($query_two);
                                    @endphp

                                    @foreach($partOneRevenueExpenditureAccountParentCategoryList as $partOneRevenueExpenditureAccountParentCategory)
                                        <tbody>
                                        <tr>

                                            @php
                                                $p_one_exp_last_year_total_amount += $partOneRevenueExpenditureAccountParentCategory->last_year_budget;
                                                $p_one_exp_current_year_total_amount += $partOneRevenueExpenditureAccountParentCategory->current_year_budget;
                                                $p_one_exp_next_year_total_amount += $partOneRevenueExpenditureAccountParentCategory->next_year_budget;
                                            @endphp

                                            <td>{{ $partOneRevenueExpenditureAccountParentCategory->parent_category_name }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueExpenditureAccountParentCategory->last_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueExpenditureAccountParentCategory->current_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueExpenditureAccountParentCategory->next_year_budget }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endforeach
                                <tbody>
                                <tr style="font-weight: bold">
                                    <td>Total expenditure (revenue account)</td>
                                    <td style="text-align: end">@isset($p_one_exp_last_year_total_amount)
                                            {{$p_one_exp_last_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_one_exp_current_year_total_amount)
                                            {{$p_one_exp_current_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_one_exp_next_year_total_amount)
                                            {{$p_one_exp_next_year_total_amount}}
                                        @endisset</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-2: Development income account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 40%">Income source statement</th>
                                    <th class="text-center" style="width: 20%">Actual income of last year</th>
                                    <th class="text-center" style="width: 20%">Current year budget or amended budget
                                    </th>
                                    <th class="text-center" style="width: 20%">Next year budget</th>
                                </tr>
                                </thead>

                                @php
                                    $p_two_exp_last_year_total_amount = 0;
                                    $p_two_exp_current_year_total_amount = 0;
                                    $p_two_exp_next_year_total_amount = 0;
                                @endphp

                                @foreach($partTwoDevRevenueIncomeAccountList as $partTwoDevRevenueIncomeAccount)
                                    <thead>
                                    <tr>
                                        <th colspan="4"
                                            style="background-color: #ebebeb">{{ $partTwoDevRevenueIncomeAccount->category_title }}</th>
                                    </tr>
                                    </thead>

                                    @php
                                        $query_five = 'SELECT b.id AS parent_category_id, b.parent_category_name,
                                                    a.id, a.category_title_id, a.last_year_budget, a.current_year_budget, a.next_year_budget FROM
                                                    `part_two_development_income_accounts` AS a
                                                    LEFT JOIN `parent_categories` AS b ON a.parent_category_id = b.id
                                                    WHERE a.category_type_id = 3 AND a.category_title_id='.$partTwoDevRevenueIncomeAccount->category_title_id.' '. 'AND a.user_id='.$userInfo[0]->id;

                                            $partTwoDevIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::select($query_five);
                                    @endphp

                                    @foreach($partTwoDevIncomeAccountParentCategoryList as $partTwoDevIncomeAccountParentCategory)
                                        <tbody>
                                        <tr>
                                            @php
                                                $p_two_exp_last_year_total_amount += $partTwoDevIncomeAccountParentCategory->last_year_budget;
                                                $p_two_exp_current_year_total_amount += $partTwoDevIncomeAccountParentCategory->current_year_budget;
                                                $p_two_exp_next_year_total_amount += $partTwoDevIncomeAccountParentCategory->next_year_budget;
                                            @endphp

                                            <td>{{ $partTwoDevIncomeAccountParentCategory->parent_category_name }}</td>
                                            <td style="text-align: end">{{ $partTwoDevIncomeAccountParentCategory->last_year_budget }}</td>
                                            <td style="text-align: end">{{ $partTwoDevIncomeAccountParentCategory->current_year_budget }}</td>
                                            <td style="text-align: end">{{ $partTwoDevIncomeAccountParentCategory->next_year_budget }}</td>
                                        </tr>
                                        </tbody>
                                    @endforeach
                                @endforeach
                                <tbody>
                                <tr style="font-weight: bold">
                                    <td>Total Development Income</td>
                                    <td style="text-align: end">@isset($p_two_exp_last_year_total_amount)
                                            {{$p_two_exp_last_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_two_exp_current_year_total_amount)
                                            {{$p_two_exp_current_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_two_exp_next_year_total_amount)
                                            {{$p_two_exp_next_year_total_amount}}
                                        @endisset</td>
                                </tr>
                                </tbody>
                            </table>
                            <br>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="4">Part-2: Development Expenditure account:</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="width: 40%">Income source statement</th>
                                    <th class="text-center" style="width: 20%">Actual income of last year</th>
                                    <th class="text-center" style="width: 20%">Current year budget or amended budget
                                    </th>
                                    <th class="text-center" style="width: 20%">Next year budget</th>
                                </tr>
                                </thead>

                                @php
                                    $p_two_dev_exp_last_year_total_amount = 0;
                                    $p_two_dev_exp_current_year_total_amount = 0;
                                    $p_two_dev_exp_next_year_total_amount = 0;
                                @endphp

                                @foreach($partTwoDevRevenueExpenditureAccountList as $partTwoDevRevenueExpenditureAccount)
                                    <thead>
                                    <tr>
                                        <th colspan="4"
                                            style="background-color: #ebebeb">{{ $partTwoDevRevenueExpenditureAccount->category_title }}</th>
                                    </tr>
                                    </thead>

                                    @php

                                        $query_three = 'SELECT DISTINCT b.id AS parent_category_id, b.parent_category_name FROM
                                                                                `part_two_development_expenditure_accounts` AS a
                                                                                LEFT JOIN `parent_categories` AS b ON a.parent_category_id = b.id
                                                                                WHERE a.category_type_id = 4 AND a.category_title_id = '.$partTwoDevRevenueExpenditureAccount->category_title_id. ' '. 'AND a.user_id='.$userInfo[0]->id;

                                        $partTwoDevExpAccountParentCategoryList = \Illuminate\Support\Facades\DB::select($query_three);
                                    @endphp

                                    @foreach($partTwoDevExpAccountParentCategoryList as $partTwoDevExpAccountParentCategory)
                                        <thead>
                                        <tr>
                                            <th>{{ $partTwoDevExpAccountParentCategory->parent_category_name }}</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        @php

                                            $query_four = 'SELECT DISTINCT b.id AS child_category_id, b.child_category_name, a.last_year_budget, a.current_year_budget, a.next_year_budget FROM
                                                                                            `part_two_development_expenditure_accounts` AS a
                                                                                            LEFT JOIN `child_categories` AS b ON a.child_category_id = b.id
                                                                                            WHERE a.category_type_id = 4 AND a.parent_category_id='.$partTwoDevExpAccountParentCategory->parent_category_id.' '. 'AND a.user_id='.$userInfo[0]->id;

                                                $partTwoDevExpAccountChildCategoryList = \Illuminate\Support\Facades\DB::select($query_four);


                                        @endphp
                                        @foreach($partTwoDevExpAccountChildCategoryList as $partTwoDevExpAccountChildCategory)
                                            <tbody>
                                            <tr>
                                                @php
                                                    $p_two_dev_exp_last_year_total_amount += $partTwoDevExpAccountChildCategory->last_year_budget;
                                                    $p_two_dev_exp_current_year_total_amount += $partTwoDevExpAccountChildCategory->current_year_budget;
                                                    $p_two_dev_exp_next_year_total_amount += $partTwoDevExpAccountChildCategory->next_year_budget;
                                                @endphp

                                                <td>{{ $partTwoDevExpAccountChildCategory->child_category_name }}</td>
                                                <td style="text-align: end">{{ $partTwoDevExpAccountChildCategory->last_year_budget }}</td>
                                                <td style="text-align: end">{{ $partTwoDevExpAccountChildCategory->current_year_budget }}</td>
                                                <td style="text-align: end">{{ $partTwoDevExpAccountChildCategory->next_year_budget }}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                @endforeach
                                <tbody>
                                <tr style="font-weight: bold">
                                    <td>Total Expenditure (Development account)</td>
                                    <td style="text-align: end">@isset($p_two_dev_exp_last_year_total_amount)
                                            {{$p_two_dev_exp_last_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_two_dev_exp_current_year_total_amount)
                                            {{$p_two_dev_exp_current_year_total_amount}}
                                        @endisset</td>
                                    <td style="text-align: end">@isset($p_two_dev_exp_next_year_total_amount)
                                            {{$p_two_dev_exp_next_year_total_amount}}
                                        @endisset</td>
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
