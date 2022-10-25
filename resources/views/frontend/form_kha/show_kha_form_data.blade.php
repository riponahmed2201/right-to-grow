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
                                <u>অর্থ বছর @if (isset($userInfo[0]->financial_year))
                                        {{ $userInfo[0]->financial_year }}:
                                    @else
                                        2021-2022:
                                    @endif
                                </u>
                            </h5>

                            @php
                                $last_year_total_amount = 0;
                                $current_year_total_amount = 0;
                                $next_year_total_amount = 0;
                                $current_year_actual_income_total_amount = 0;
                                $next_year_actual_income_total_amount = 0;
                            @endphp

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

                                    @foreach ($partOneRevenueIncomeAccountList as $partOneRevenueIncomeAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="6" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueIncomeAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
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
                                                @if ($partOneRevenueIncomeAccountSubcategory->last_year_budget ||
                                                    $partOneRevenueIncomeAccountSubcategory->current_year_budget ||
                                                    $partOneRevenueIncomeAccountSubcategory->next_year_budget ||
                                                    $partOneRevenueIncomeAccountSubcategory->current_year_actual_income ||
                                                    $partOneRevenueIncomeAccountSubcategory->next_year_actual_income)
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
                                                @endif
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

                            @php
                                $p_one_exp_last_year_total_amount = 0;
                                $p_one_exp_current_year_total_amount = 0;
                                $p_one_exp_next_year_total_amount = 0;
                                $p_one_exp_current_year_actual_income_total_amount = 0;
                                $p_one_exp_next_year_actual_income_total_amount = 0;
                            @endphp

                            @if (!empty($partOneRevenueExpenditureAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-১- রাজস্ব হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

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

                                                @if ($partOneIncomeAccountSubcategory->last_year_budget ||
                                                    $partOneIncomeAccountSubcategory->current_year_budget ||
                                                    $partOneIncomeAccountSubcategory->next_year_budget ||
                                                    $partOneIncomeAccountSubcategory->current_year_actual_income ||
                                                    $partOneIncomeAccountSubcategory->next_year_actual_income)
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
                                                            {{ $partOneIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partOneIncomeAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partOneIncomeAccountSubcategory->next_year_budget }}</td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partOneIncomeAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>উপমোট</td>
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
                                        <tr>
                                            <td>১০। রাজস্ব উদ্বৃত্ত উন্নয়ন হিসাবে স্থানান্তর</td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr style="font-weight: bold">
                                            <td>মোট ব্যয় (রাজস্ব হিসাব)</td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount + $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount + $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>

                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount + $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount + $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount + $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @php
                                $p_two_exp_last_year_total_amount = 0;
                                $p_two_exp_current_year_total_amount = 0;
                                $p_two_exp_next_year_total_amount = 0;
                                $p_two_exp_current_year_actual_income_total_amount = 0;
                                $p_two_exp_next_year_actual_income_total_amount = 0;
                            @endphp


                            @if (!empty($partTwoDevRevenueIncomeAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-২- উন্নয়ন হিসাব আয়ঃ </th>
                                        </tr>
                                    </thead>

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
                                                @if ($partTwoDevIncomeAccountSubcategory->last_year_budget ||
                                                    $partTwoDevIncomeAccountSubcategory->current_year_budget ||
                                                    $partTwoDevIncomeAccountSubcategory->next_year_budget ||
                                                    $partTwoDevIncomeAccountSubcategory->current_year_actual_income ||
                                                    $partTwoDevIncomeAccountSubcategory->next_year_actual_income)
                                                    <tr>
                                                        @php
                                                            $p_two_exp_last_year_total_amount += $partTwoDevIncomeAccountSubcategory->last_year_budget;
                                                            $p_two_exp_current_year_total_amount += $partTwoDevIncomeAccountSubcategory->current_year_budget;
                                                            $p_two_exp_next_year_total_amount += $partTwoDevIncomeAccountSubcategory->next_year_budget;
                                                            $p_two_exp_current_year_actual_income_total_amount += $partTwoDevIncomeAccountSubcategory->current_year_actual_income;
                                                            $p_two_exp_next_year_actual_income_total_amount += $partTwoDevIncomeAccountSubcategory->next_year_actual_income;
                                                        @endphp

                                                        <td style="width: 30%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->subcategory_name }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 14%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->last_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 14%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 14%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 14%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->next_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 14%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td>উপমোট</td>
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
                                        <tr>
                                            <td>রাজস্ব উদ্বৃত্ত উন্নয়ন হিসাবে স্থানান্তর</td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr style="font-weight: bold">
                                            <td>মোট প্রাপ্তি (উন্নয়ন হিসাব ) </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount + $p_two_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount + $p_two_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount + $p_two_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount + $p_two_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end">
                                                @isset($p_two_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount + $p_two_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif

                            @php
                                $p_two_dev_exp_last_year_total_amount = 0;
                                $p_two_dev_exp_current_year_total_amount = 0;
                                $p_two_dev_exp_next_year_total_amount = 0;
                                $p_two_dev_exp_current_year_actual_income_total_amount = 0;
                                $p_two_dev_exp_next_year_actual_income_total_amount = 0;
                            @endphp

                            @if (!empty($partTwoDevRevenueExpenditureAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="6">অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @foreach ($partTwoDevRevenueExpenditureAccountList as $partTwoDevRevenueExpenditureAccount)
                                        <thead>
                                            <tr>
                                                <th style="background-color: #ebebeb; width: 30%">
                                                    {{ $partTwoDevRevenueExpenditureAccount->category_name }}</th>
                                                <th style="background-color: #ebebeb; width: 14%"></th>
                                                <th style="background-color: #ebebeb; width: 14%"></th>
                                                <th style="background-color: #ebebeb; width: 14%"></th>
                                                <th style="background-color: #ebebeb; width: 14%"></th>
                                                <th style="background-color: #ebebeb; width: 14%"></th>
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
                                                @if ($partTwoDevExpAccountSubcategory->last_year_budget ||
                                                    $partTwoDevExpAccountSubcategory->current_year_budget ||
                                                    $partTwoDevExpAccountSubcategory->next_year_budget ||
                                                    $partTwoDevExpAccountSubcategory->current_year_actual_income ||
                                                    $partTwoDevExpAccountSubcategory->next_year_actual_income)
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
                                                            {{ $partTwoDevExpAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partTwoDevExpAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partTwoDevExpAccountSubcategory->next_year_budget }}</td>
                                                        <td style="text-align: end; width: 14%">
                                                            {{ $partTwoDevExpAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
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
                                        <tr>
                                            <td colspan="6" style="background-color: #44546a"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="background-color: #c6e0b4; width: 30%">রাজস্ব আয়</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $last_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $current_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $current_year_actual_income_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $next_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $next_year_actual_income_total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">উপমোট রাজস্ব ব্যয়</td>
                                        <td style="width: 14%; text-align: end">{{ $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">{{ $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_one_exp_next_year_total_amount }}</td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_one_exp_next_year_actual_income_total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">রাজস্ব উদ্বৃত্ত</td>
                                        <td style="background-color: #ffc000; width: 14%; text-align: end">
                                            {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}</td>
                                        <td style="background-color: #ffc000; width: 14%; text-align: end">
                                            {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}</td>
                                        <td style="background-color: #ffc000; width: 14%; text-align: end">
                                            {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #ffc000; width: 14%; text-align: end">
                                            {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #ffc000; width: 14%; text-align: end">
                                            {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #c6e0b4; width: 30%">মোট রাজস্ব ব্যয়</td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $p_one_exp_last_year_total_amount + $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $p_one_exp_current_year_total_amount + $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $p_one_exp_current_year_actual_income_total_amount + $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $p_one_exp_next_year_total_amount + $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 14%; text-align: end">
                                            {{ $p_one_exp_next_year_actual_income_total_amount + $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">উপমোট উন্নয়ন আয়</td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_two_exp_last_year_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_two_exp_current_year_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_two_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_two_exp_next_year_total_amount }}
                                        </td>
                                        <td style="width: 14%; text-align: end">
                                            {{ $p_two_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #f4b084; width: 30%">মোট উন্নয়ন আয়= উপমোট উন্নয়ন আয়+
                                            রাজস্ব উদ্বৃত্ত</td>
                                        <td style="background-color: #f4b084; width: 14%; text-align: end">
                                            {{ $p_two_exp_last_year_total_amount + $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 14%; text-align: end">
                                            {{ $p_two_exp_current_year_total_amount + $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 14%; text-align: end">
                                            {{ $p_two_exp_current_year_actual_income_total_amount + $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 14%; text-align: end">
                                            {{ $p_two_exp_next_year_total_amount + $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 14%; text-align: end">
                                            {{ $p_two_exp_next_year_actual_income_total_amount + $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #acb9ca; width: 30%">মোট আয় (রাজস্ব আয়+উপমোট উন্নয়ন
                                            আয়)</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">
                                            {{ $last_year_total_amount + $p_two_exp_last_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">
                                            {{ $current_year_total_amount + $p_two_exp_current_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">
                                            {{ $current_year_actual_income_total_amount + $p_two_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">
                                            {{ $next_year_total_amount + $p_two_exp_next_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">
                                            {{ $next_year_actual_income_total_amount + $p_two_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">উপমোট উন্নয়ন ব্যয় </td>
                                        <td style="width: 14%; text-align: end">34634</td>
                                        <td style="width: 14%; text-align: end">346347</td>
                                        <td style="width: 14%; text-align: end">36347</td>
                                        <td style="width: 14%; text-align: end">33467</td>
                                        <td style="width: 14%; text-align: end">36347</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30%">সমাপ্তি জের = (মোট উন্নয়ন আয়-উপমোট উন্নয়ন ব্যয়)</td>
                                        <td style="width: 14%; text-align: end">0</td>
                                        <td style="width: 14%; text-align: end">0</td>
                                        <td style="width: 14%; text-align: end">0</td>
                                        <td style="width: 14%; text-align: end">0</td>
                                        <td style="width: 14%; text-align: end">0</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #acb9ca; width: 30%">মোট উন্নয়ন ব্যয় : (সমাপ্তি জের
                                            সহ)</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #acb9ca; width: 30%">মোট ব্যয় (সমাপ্তি জের সহ)</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                        <td style="background-color: #acb9ca; width: 14%; text-align: end">0</td>
                                    </tr>
                                    </thead>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
