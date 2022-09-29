@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">ইউনিয়ন পরিষদ বাজেট ফরম "খ"</h2>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <h5><u>বিভাগ তথ্য:</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">অর্থ বছর</th>
                                        <th style="width: 20%">বিভাগ</th>
                                        <th style="width: 20%">জেলা</th>
                                        <th style="width: 20%">উপজেলা</th>
                                        <th style="width: 20%">ইউনিয়ন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userInfo))
                                        <tr>
                                            <td>{{ $userInfo[0]->financial_year }}</td>
                                            <td>{{ $userInfo[0]->division_name }}</td>
                                            <td>{{ $userInfo[0]->district_name }}</td>
                                            <td>{{ $userInfo[0]->upazila_name }}</td>
                                            <td>{{ $userInfo[0]->union_name }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td style="text-align: center; color: red" colspan="5">No Data Found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <br>
                            <h5><u>ব্যবহারকারী তথ্য:</u></h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 20%">ছবি</th>
                                        <th style="width: 20%">নাম</th>
                                        <th style="width: 20%">উপাধি</th>
                                        <th style="width: 20%">ফোন</th>
                                        <th style="width: 20%">ইমেইল</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userInfo))
                                        <tr>
                                            <td>
                                                <img style="width: 60px; height: 60px; border-radius: 50%"
                                                    src="{{ $userInfo[0]->photo ? asset('uploads/userPhoto/' . $userInfo[0]->photo) : asset('assets/admin/dist/img/avatar5.png') }}"
                                                    alt="User Image">
                                            </td>
                                            <td>{{ $userInfo[0]->name }}</td>
                                            <td>{{ $userInfo[0]->designation }}</td>
                                            <td>{{ $userInfo[0]->phone }}</td>
                                            <td>{{ $userInfo[0]->email }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td style="text-align: center; color: red" colspan="5">No Data Found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <br>
                            <h5>
                                <u>R2G ফরমেটের অর্থ বছর @if (isset($userInfo[0]->financial_year))
                                        {{ $userInfo[0]->financial_year }}:
                                    @else
                                        2021-2022:
                                    @endif
                                </u>
                            </h5>

                            @if (!empty($partOneRevenueIncomeAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="4">অংশ-১- রাজস্ব হিসাব আয়ঃ</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 30%" class="text-center">প্রাপ্তির বিবরণ</th>
                                            <th style="width: 14%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                (২০২০-২০২১)</th>
                                            <th style="width: 14%" class="text-center">চলতি বৎসরের বাজেট বা
                                                সংশোধিত
                                                বাজেট (২০২১-২০২২)
                                            </th>
                                            <th style="width: 14%" class="text-center">প্রকৃত আয় (২০২০-২০২১)
                                            </th>
                                            <th style="width: 14%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                (২০২২-২০২৩)</th>
                                            <th style="width: 14%" class="text-center">প্রকৃত আয় (২০২২-২০২৩)</th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" style="background-color: #e7e6e6">রাজস্ব আয়</th>
                                        </tr>
                                    </thead>

                                    @php
                                        $last_year_total_amount = 0;
                                        $current_year_total_amount = 0;
                                        $next_year_total_amount = 0;
                                        $current_year_actual_income_total_amount = 0;
                                        $next_year_actual_income_total_amount = 0;
                                    @endphp

                                    @foreach ($partOneRevenueIncomeAccountList as $partOneRevenueIncomeAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueIncomeAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php

                                        // dd($partOneRevenueIncomeAccount);

                                            $query_one =
                                                'SELECT b.id AS subcategory_id, b.name as subcategory_name,
                                                        a.id, a.category_id, a.last_year_budget, a.current_year_budget, a.next_year_budget, a.current_year_actual_income, a.next_year_actual_income FROM
                                                        `part_one_revenue_income_accounts` AS a
                                                        LEFT JOIN `subcategories` AS b ON a.subcategory_id = b.id
                                                        WHERE a.type_id = 1 AND a.category_id = ' .
                                                $partOneRevenueIncomeAccount->category_id .
                                                ' ' .
                                                'AND a.user_id = ' .
                                                $userInfo[0]->id;
                                            
                                            $partOneRevenueIncomeAccountSubcategories = \Illuminate\Support\Facades\DB::select($query_one);
                                            
                                        @endphp

                                        <tbody>
                                            @foreach ($partOneRevenueIncomeAccountSubcategories as $partOneRevenueIncomeAccountSubcategory)
                                                <tr>

                                                    @php
                                                        $last_year_total_amount += $partOneRevenueIncomeAccountSubcategory->last_year_budget;
                                                        $current_year_total_amount += $partOneRevenueIncomeAccountSubcategory->current_year_budget;
                                                        $next_year_total_amount += $partOneRevenueIncomeAccountSubcategory->next_year_budget;
                                                        $current_year_actual_income_total_amount += $partOneRevenueIncomeAccountSubcategory->current_year_actual_income;
                                                        $next_year_actual_income_total_amount += $partOneRevenueIncomeAccountSubcategory->next_year_actual_income;
                                                    @endphp

                                                    <td>{{ $partOneRevenueIncomeAccountSubcategory->subcategory_name }}
                                                    </td>
                                                    <td style="text-align: end">
                                                        {{ $partOneRevenueIncomeAccountSubcategory->last_year_budget }}
                                                    </td>
                                                    <td style="text-align: end">
                                                        {{ $partOneRevenueIncomeAccountSubcategory->current_year_budget }}
                                                    </td>
                                                    <td style="text-align: end">
                                                        {{ $partOneRevenueIncomeAccountSubcategory->current_year_actual_income }}
                                                    </td>
                                                    <td style="text-align: end">
                                                        {{ $partOneRevenueIncomeAccountSubcategory->current_year_budget }}
                                                    </td>
                                                    <td style="text-align: end">
                                                        {{ $partOneRevenueIncomeAccountSubcategory->next_year_actual_income }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>মোট রাজস্ব হিসাব আয়</td>
                                            <td style="text-align: end">
                                                @isset($last_year_total_amount)
                                                    {{ $last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($current_year_total_amount)
                                                    {{ $current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($next_year_total_amount)
                                                    {{ $next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @if (!empty($partOneRevenueExpenditureAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-১- রাজস্ব হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @php
                                        $p_one_exp_last_year_total_amount = 0;
                                        $p_one_exp_current_year_total_amount = 0;
                                        $p_one_exp_next_year_total_amount = 0;
                                        $p_one_exp_current_year_actual_income_total_amount = 0;
                                        $p_one_exp_next_year_actual_income_total_amount = 0;
                                    @endphp

                                    @foreach ($partOneRevenueExpenditureAccountList as $partOneRevenueExpenditureAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueExpenditureAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $query_two =
                                                'SELECT b.id AS subcategory_id, b.name as subcategory_name,
                                                        a.id, a.category_id, a.last_year_budget, a.current_year_budget, a.next_year_budget, a.current_year_actual_income, a.next_year_actual_income FROM
                                                        `part_one_revenue_expenditure_accounts` AS a
                                                        LEFT JOIN `subcategories` AS b ON a.subcategory_id = b.id
                                                        WHERE a.type_id = 2 AND a.category_id = ' .
                                                $partOneRevenueExpenditureAccount->category_id .
                                                ' ' .
                                                'AND a.user_id = ' .
                                                $userInfo[0]->id;
                                            
                                            $partOneIncomeAccountSubcategoryList = \Illuminate\Support\Facades\DB::select($query_two);
                                            
                                        @endphp

                                        @foreach ($partOneIncomeAccountSubcategoryList as $partOneIncomeAccountSubcategory)
                                            <tbody>
                                                <tr>
                                                    @php
                                                        $p_one_exp_last_year_total_amount += $partOneIncomeAccountSubcategory->last_year_budget;
                                                        $p_one_exp_current_year_total_amount += $partOneIncomeAccountSubcategory->current_year_budget;
                                                        $p_one_exp_next_year_total_amount += $partOneIncomeAccountSubcategory->next_year_budget;
                                                        $p_one_exp_current_year_actual_income_total_amount += $partOneIncomeAccountSubcategory->current_year_actual_income;
                                                        $p_one_exp_next_year_actual_income_total_amount += $partOneIncomeAccountSubcategory->next_year_actual_income;
                                                    @endphp

                                                    <td style="width: 30%">
                                                        {{ $partOneIncomeAccountSubcategory->subcategory_name }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partOneIncomeAccountSubcategory->last_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partOneIncomeAccountSubcategory->current_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partOneIncomeAccountSubcategory->current_year_actual_income }}
                                                    </td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partOneIncomeAccountSubcategory->next_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partOneIncomeAccountSubcategory->next_year_actual_income }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>মোট ব্যয় (রাজস্ব হিসাব)</td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @if (!empty($partTwoDevRevenueIncomeAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-২- উন্নয়ন হিসাব আয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @php
                                        $p_two_exp_last_year_total_amount = 0;
                                        $p_two_exp_current_year_total_amount = 0;
                                        $p_two_exp_next_year_total_amount = 0;
                                        $p_two_exp_current_year_actual_income_total_amount = 0;
                                        $p_two_exp_next_year_actual_income_total_amount = 0;
                                    @endphp

                                    @foreach ($partTwoDevRevenueIncomeAccountList as $partTwoDevRevenueIncomeAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueExpenditureAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $query_five =
                                                'SELECT b.id AS subcategory_id, b.name as subcategory_name,
                                                a.id, a.category_id, a.last_year_budget, a.current_year_budget, a.next_year_budget, a.current_year_actual_income, a.next_year_actual_income FROM
                                                `part_two_development_income_accounts` AS a
                                                LEFT JOIN `subcategories` AS b ON a.subcategory_id = b.id
                                                WHERE a.type_id = 3 AND a.category_id=' .
                                                $partTwoDevRevenueIncomeAccount->category_id .
                                                ' ' .
                                                'AND a.user_id=' .
                                                $userInfo[0]->id;
                                            
                                            $partTwoDevIncomeAccountSubcategoryList = \Illuminate\Support\Facades\DB::select($query_five);
                                            
                                        @endphp

                                        @foreach ($partTwoDevIncomeAccountSubcategoryList as $partTwoDevIncomeAccountSubcategory)
                                            <tbody>
                                                <tr>
                                                    @php
                                                        $p_two_exp_last_year_total_amount += $partTwoDevIncomeAccountSubcategory->last_year_budget;
                                                        $p_two_exp_current_year_total_amount += $partTwoDevIncomeAccountSubcategory->current_year_budget;
                                                        $p_two_exp_next_year_total_amount += $partTwoDevIncomeAccountSubcategory->next_year_budget;
                                                        $p_two_exp_current_year_actual_income_total_amount += $partTwoDevIncomeAccountSubcategory->current_year_actual_income;
                                                        $p_two_exp_next_year_actual_income_total_amount += $partTwoDevIncomeAccountSubcategory->next_year_actual_income;
                                                    @endphp

                                                    <td style="width: 30%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->subcategory_name }}</td>
                                                    <td style="text-align: end" style="width: 14%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->last_year_budget }}</td>
                                                    <td style="text-align: end" style="width: 14%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->current_year_budget }}</td>
                                                    <td style="text-align: end" style="width: 14%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->current_year_actual_income }}
                                                    </td>
                                                    <td style="text-align: end" style="width: 14%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->next_year_budget }}</td>
                                                    <td style="text-align: end" style="width: 14%">
                                                        {{ $partTwoDevIncomeAccountSubcategory->next_year_actual_income }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>মোট প্রাপ্তি (উন্নয়ন হিসাব ) </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_last_year_total_amount)
                                                    {{ $p_two_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_current_year_total_amount)
                                                    {{ $p_two_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_current_year_actual_income_total_amount)
                                                    {{ $p_two_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_next_year_total_amount)
                                                    {{ $p_two_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_next_year_actual_income_total_amount)
                                                    {{ $p_two_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @if (!empty($partTwoDevRevenueExpenditureAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @php
                                        $p_two_dev_exp_last_year_total_amount = 0;
                                        $p_two_dev_exp_current_year_total_amount = 0;
                                        $p_two_dev_exp_next_year_total_amount = 0;
                                        $p_two_dev_exp_current_year_actual_income_total_amount = 0;
                                        $p_two_dev_exp_next_year_actual_income_total_amount = 0;
                                    @endphp

                                    @foreach ($partTwoDevRevenueExpenditureAccountList as $partTwoDevRevenueExpenditureAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="background-color: #ebebeb">
                                                    {{ $partTwoDevRevenueExpenditureAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $query_three =
                                                'SELECT DISTINCT b.id AS subcategory_id, b.name as subcategory_name,
                                                        a.id, a.category_id, a.last_year_budget, a.current_year_budget, a.next_year_budget, a.current_year_actual_income, a.next_year_actual_income FROM
                                                                                    `part_two_development_expenditure_accounts` AS a
                                                                                    LEFT JOIN `subcategories` AS b ON a.subcategory_id = b.id
                                                                                    WHERE a.type_id = 4 AND a.category_id = ' .
                                                $partTwoDevRevenueExpenditureAccount->category_id .
                                                ' ' .
                                                'AND a.user_id=' .
                                                $userInfo[0]->id;
                                            
                                            $partTwoDevExpAccountSubcategoryList = \Illuminate\Support\Facades\DB::select($query_three);
                                        @endphp

                                        <tbody>
                                            @foreach ($partTwoDevExpAccountSubcategoryList as $partTwoDevExpAccountSubcategory)
                                                <tr>
                                                    @php
                                                        $p_two_dev_exp_last_year_total_amount += $partTwoDevExpAccountSubcategory->last_year_budget;
                                                        $p_two_dev_exp_current_year_total_amount += $partTwoDevExpAccountSubcategory->current_year_budget;
                                                        $p_two_dev_exp_next_year_total_amount += $partTwoDevExpAccountSubcategory->next_year_budget;
                                                        $p_two_dev_exp_current_year_actual_income_total_amount += $partTwoDevExpAccountSubcategory->current_year_actual_income;
                                                        $p_two_dev_exp_next_year_actual_income_total_amount += $partTwoDevExpAccountSubcategory->next_year_actual_income;
                                                    @endphp
                                                    <td style="width: 30%">
                                                        {{ $partTwoDevExpAccountSubcategory->subcategory_name }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partTwoDevExpAccountSubcategory->last_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partTwoDevExpAccountSubcategory->current_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partTwoDevExpAccountSubcategory->current_year_actual_income }}
                                                    </td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partTwoDevExpAccountSubcategory->next_year_budget }}</td>
                                                    <td style="text-align: end; width: 14%">
                                                        {{ $partTwoDevExpAccountSubcategory->next_year_actual_income }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>মোট উন্নয়ন ব্যয় </td>
                                            <td style="text-align: end">
                                                @isset($p_two_dev_exp_last_year_total_amount)
                                                    {{ $p_two_dev_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_dev_exp_current_year_total_amount)
                                                    {{ $p_two_dev_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_dev_exp_current_year_actual_income_total_amount)
                                                    {{ $p_two_dev_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_dev_exp_next_year_total_amount)
                                                    {{ $p_two_dev_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_dev_exp_next_year_actual_income_total_amount)
                                                    {{ $p_two_dev_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
