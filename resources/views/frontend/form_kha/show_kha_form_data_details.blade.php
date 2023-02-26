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
                                            <th colspan="7">অংশ-১- রাজস্ব হিসাব আয়ঃ</th>
                                        </tr>
                                        <tr>
                                            <th style="width: 25%" class="text-center">প্রাপ্তির বিবরণ</th>
                                            <th style="width: 15%;" class="text-center">
                                                নোট</th>
                                            <th style="width: 12%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                (২০২০-২০২১)</th>
                                            <th style="width: 12%" class="text-center">চলতি বৎসরের বাজেট বা
                                                সংশোধিত
                                                বাজেট (২০২১-২০২২)
                                            </th>
                                            <th style="width: 12%" class="text-center">প্রকৃত আয় (২০২০-২০২১)
                                            </th>
                                            <th style="width: 12%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                (২০২২-২০২৩)</th>
                                            <th style="width: 12%" class="text-center">প্রকৃত আয় (২০২২-২০২৩)</th>
                                        </tr>
                                        <tr>
                                            <th colspan="7" style="background-color: #e7e6e6">রাজস্ব আয়</th>
                                        </tr>
                                    </thead>

                                    @foreach ($partOneRevenueIncomeAccountList as $partOneRevenueIncomeAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="7" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueIncomeAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $partOneRevenueIncomeAccountSubcategories = \Illuminate\Support\Facades\DB::table('part_one_revenue_income_accounts as a')
                                                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                                                ->select('b.id AS subcategory_id', 'b.name as subcategory_name', 'a.id', 'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                                                ->where('a.type_id', '=', 1)
                                                ->where('a.category_id', '=', $partOneRevenueIncomeAccount->category_id)
                                                ->where('a.user_id', '=', $userInfo[0]->id)
                                                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                                                ->distinct()
                                                ->get();
                                            
                                        @endphp

                                        <tbody>
                                            @foreach ($partOneRevenueIncomeAccountSubcategories as $partOneRevenueIncomeAccountSubcategory)
                                                @if (
                                                    $partOneRevenueIncomeAccountSubcategory->last_year_budget ||
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

                                                        <td style="width: 25%">{{ $partOneRevenueIncomeAccountSubcategory->subcategory_name }}
                                                        </td>
                                                        <td style="width: 15%">{{ $partOneRevenueIncomeAccountSubcategory->notes }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneRevenueIncomeAccountSubcategory->last_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneRevenueIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneRevenueIncomeAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneRevenueIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneRevenueIncomeAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">মোট রাজস্ব হিসাব আয়</td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($last_year_total_amount)
                                                    {{ $last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($current_year_total_amount)
                                                    {{ $current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($next_year_total_amount)
                                                    {{ $next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
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
                                            <th colspan="7">অংশ-১- রাজস্ব হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @foreach ($partOneRevenueExpenditureAccountList as $partOneRevenueExpenditureAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="7" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueExpenditureAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $partOneIncomeAccountSubcategoryList = \Illuminate\Support\Facades\DB::table('part_one_revenue_expenditure_accounts as a')
                                                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                                                ->select('b.id AS subcategory_id', 'b.name as subcategory_name', 'a.id', 'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                                                ->where('a.type_id', '=', 2)
                                                ->where('a.category_id', '=', $partOneRevenueExpenditureAccount->category_id)
                                                ->where('a.user_id', '=', $userInfo[0]->id)
                                                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                                                ->distinct()
                                                ->get();
                                            
                                        @endphp

                                        @foreach ($partOneIncomeAccountSubcategoryList as $partOneIncomeAccountSubcategory)
                                            <tbody>

                                                @if (
                                                    $partOneIncomeAccountSubcategory->last_year_budget ||
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

                                                        <td style="width: 25%">
                                                            {{ $partOneIncomeAccountSubcategory->subcategory_name }}</td>
                                                        <td style="width: 15%">
                                                            {{ $partOneIncomeAccountSubcategory->notes }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneIncomeAccountSubcategory->last_year_budget }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneIncomeAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneIncomeAccountSubcategory->next_year_budget }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partOneIncomeAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">উপমোট</td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 25%">১০। রাজস্ব উদ্বৃত্ত উন্নয়ন হিসাবে স্থানান্তর</td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">মোট ব্যয় (রাজস্ব হিসাব)</td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount + $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount + $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>

                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount + $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount + $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
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
                                            <th colspan="7">অংশ-২- উন্নয়ন হিসাব আয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @foreach ($partTwoDevRevenueIncomeAccountList as $partTwoDevRevenueIncomeAccount)
                                        <thead>
                                            <tr>
                                                <th colspan="7" style="background-color: #ebebeb">
                                                    {{ $partOneRevenueExpenditureAccount->category_name }}</th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $partTwoDevIncomeAccountSubcategoryList = \Illuminate\Support\Facades\DB::table('part_two_development_income_accounts as a')
                                                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                                                ->select('b.id AS subcategory_id', 'b.name as subcategory_name', 'a.id', 'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                                                ->where('a.type_id', '=', 3)
                                                ->where('a.category_id', '=', $partTwoDevRevenueIncomeAccount->category_id)
                                                ->where('a.user_id', '=', $userInfo[0]->id)
                                                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                                                ->distinct()
                                                ->get();
                                            
                                        @endphp

                                        @foreach ($partTwoDevIncomeAccountSubcategoryList as $partTwoDevIncomeAccountSubcategory)
                                            <tbody>
                                                @if (
                                                    $partTwoDevIncomeAccountSubcategory->last_year_budget ||
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

                                                        <td style="width: 25%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->subcategory_name }}
                                                        </td>
                                                        <td style="width: 15%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->notes }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 12%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->last_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 12%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 12%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 12%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->next_year_budget }}
                                                        </td>
                                                        <td style="text-align: end" style="width: 12%">
                                                            {{ $partTwoDevIncomeAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        @endforeach
                                    @endforeach
                                    <tbody>
                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">উপমোট</td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_last_year_total_amount)
                                                    {{ $p_two_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_current_year_total_amount)
                                                    {{ $p_two_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_current_year_actual_income_total_amount)
                                                    {{ $p_two_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_next_year_total_amount)
                                                    {{ $p_two_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_next_year_actual_income_total_amount)
                                                    {{ $p_two_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" width: 25%">রাজস্ব উদ্বৃত্ত উন্নয়ন হিসাবে স্থানান্তর</td>
                                            <td style=" width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_one_exp_next_year_actual_income_total_amount)
                                                    {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">মোট প্রাপ্তি (উন্নয়ন হিসাব ) </td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_last_year_total_amount)
                                                    {{ $last_year_total_amount - $p_one_exp_last_year_total_amount + $p_two_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_current_year_total_amount)
                                                    {{ $current_year_total_amount - $p_one_exp_current_year_total_amount + $p_two_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_current_year_actual_income_total_amount)
                                                    {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount + $p_two_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_exp_next_year_total_amount)
                                                    {{ $next_year_total_amount - $p_one_exp_next_year_total_amount + $p_two_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
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
                                
                                //Closing Balance
                                $p_two_dev_exp_last_year_closing_balance = 0;
                                $p_two_dev_exp_current_year_closing_balance = 0;
                                $p_two_dev_exp_next_year_closing_balance = 0;
                                $p_two_dev_exp_current_year_actual_income_closing_balance = 0;
                                $p_two_dev_exp_next_year_actual_income_closing_balance = 0;
                                
                            @endphp

                            @if (!empty($partTwoDevRevenueExpenditureAccountList))
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="7">অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ </th>
                                        </tr>
                                    </thead>

                                    @foreach ($partTwoDevRevenueExpenditureAccountList as $partTwoDevRevenueExpenditureAccount)
                                        <thead>
                                            <tr>
                                                <th style="background-color: #ebebeb; width: 25%">
                                                    {{ $partTwoDevRevenueExpenditureAccount->category_name }}</th>
                                                <th style="background-color: #ebebeb; width: 15%"></th>
                                                <th style="background-color: #ebebeb; width: 12%"></th>
                                                <th style="background-color: #ebebeb; width: 12%"></th>
                                                <th style="background-color: #ebebeb; width: 12%"></th>
                                                <th style="background-color: #ebebeb; width: 12%"></th>
                                                <th style="background-color: #ebebeb; width: 12%"></th>
                                            </tr>
                                        </thead>

                                        @php
                                            
                                            $partTwoDevExpAccountSubcategoryList = \Illuminate\Support\Facades\DB::table('part_two_development_expenditure_accounts as a')
                                                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                                                ->select('b.id AS subcategory_id', 'b.name as subcategory_name', 'a.id', 'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                                                ->where('a.type_id', '=', 4)
                                                ->where('a.category_id', '=', $partTwoDevRevenueExpenditureAccount->category_id)
                                                ->where('a.user_id', '=', $userInfo[0]->id)
                                                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                                                ->distinct()
                                                ->get();
                                        @endphp

                                        <tbody>
                                            @foreach ($partTwoDevExpAccountSubcategoryList as $partTwoDevExpAccountSubcategory)
                                                @if (
                                                    $partTwoDevExpAccountSubcategory->last_year_budget ||
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
                                                            
                                                            if ($partTwoDevExpAccountSubcategory->subcategory_id == 288) {
                                                                $p_two_dev_exp_last_year_closing_balance += $partTwoDevExpAccountSubcategory->last_year_budget;
                                                                $p_two_dev_exp_current_year_closing_balance += $partTwoDevExpAccountSubcategory->current_year_budget;
                                                                $p_two_dev_exp_next_year_closing_balance += $partTwoDevExpAccountSubcategory->next_year_budget;
                                                                $p_two_dev_exp_current_year_actual_income_closing_balance += $partTwoDevExpAccountSubcategory->current_year_actual_income;
                                                                $p_two_dev_exp_next_year_actual_income_closing_balance += $partTwoDevExpAccountSubcategory->next_year_actual_income;
                                                            }
                                                            
                                                        @endphp
                                                        <td style="width: 25%">
                                                            {{ $partTwoDevExpAccountSubcategory->subcategory_name }}</td>
                                                        <td style="width: 15%">
                                                            {{ $partTwoDevExpAccountSubcategory->notes }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partTwoDevExpAccountSubcategory->last_year_budget }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partTwoDevExpAccountSubcategory->current_year_budget }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partTwoDevExpAccountSubcategory->current_year_actual_income }}
                                                        </td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partTwoDevExpAccountSubcategory->next_year_budget }}</td>
                                                        <td style="text-align: end; width: 12%">
                                                            {{ $partTwoDevExpAccountSubcategory->next_year_actual_income }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endforeach
                                    <tbody>
                                        <tr>
                                            <td style="width: 25%">উপমোট </td>
                                            <td style="width: 15%"></td>
                                            <td style="width: 12%; text-align: end">
                                                {{ $p_two_dev_exp_last_year_total_amount - $p_two_dev_exp_last_year_closing_balance }}
                                            </td>
                                            <td style="width: 12%; text-align: end">
                                                {{ $p_two_dev_exp_current_year_total_amount - $p_two_dev_exp_current_year_closing_balance }}
                                            </td>
                                            <td style="width: 12%; text-align: end">
                                                {{ $p_two_dev_exp_current_year_actual_income_total_amount - $p_two_dev_exp_next_year_closing_balance }}
                                            </td>
                                            <td style="width: 12%; text-align: end">
                                                {{ $p_two_dev_exp_next_year_total_amount - $p_two_dev_exp_current_year_actual_income_closing_balance }}
                                            </td>
                                            <td style="width: 12%; text-align: end">
                                                {{ $p_two_dev_exp_next_year_actual_income_total_amount - $p_two_dev_exp_next_year_actual_income_closing_balance }}
                                            </td>
                                        </tr>

                                        <tr style="font-weight: bold">
                                            <td style="width: 25%">মোট উন্নয়ন ব্যয় </td>
                                            <td style="width: 15%"></td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_dev_exp_last_year_total_amount)
                                                    {{ $p_two_dev_exp_last_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_dev_exp_current_year_total_amount)
                                                    {{ $p_two_dev_exp_current_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_dev_exp_current_year_actual_income_total_amount)
                                                    {{ $p_two_dev_exp_current_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_dev_exp_next_year_total_amount)
                                                    {{ $p_two_dev_exp_next_year_total_amount }}
                                                @endisset
                                            </td>
                                            <td style="text-align: end; width: 12%">
                                                @isset($p_two_dev_exp_next_year_actual_income_total_amount)
                                                    {{ $p_two_dev_exp_next_year_actual_income_total_amount }}
                                                @endisset
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" style="background-color: #44546a"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="background-color: #c6e0b4; width: 25%">রাজস্ব আয়</td>
                                        <td style="background-color: #c6e0b4; width: 15%"></td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $last_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $current_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $current_year_actual_income_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $next_year_total_amount }}</td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $next_year_actual_income_total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">উপমোট রাজস্ব ব্যয়</td>
                                        <td style="width: 15%"></td>
                                        <td style="width: 12%; text-align: end">{{ $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">{{ $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_total_amount }}</td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_actual_income_total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #ffc000; width: 25%">রাজস্ব উদ্বৃত্ত</td>
                                        <td style="background-color: #ffc000; width: 15%"></td>
                                        <td style="background-color: #ffc000; width: 12%; text-align: end">
                                            {{ $last_year_total_amount - $p_one_exp_last_year_total_amount }}</td>
                                        <td style="background-color: #ffc000; width: 12%; text-align: end">
                                            {{ $current_year_total_amount - $p_one_exp_current_year_total_amount }}</td>
                                        <td style="background-color: #ffc000; width: 12%; text-align: end">
                                            {{ $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #ffc000; width: 12%; text-align: end">
                                            {{ $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #ffc000; width: 12%; text-align: end">
                                            {{ $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #c6e0b4; width: 25%">মোট রাজস্ব ব্যয়</td>
                                        <td style="background-color: #c6e0b4; width: 15%"></td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $p_one_exp_last_year_total_amount + $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $p_one_exp_current_year_total_amount + $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $p_one_exp_current_year_actual_income_total_amount + $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_total_amount + $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #c6e0b4; width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_actual_income_total_amount + $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%">উপমোট উন্নয়ন আয়</td>
                                        <td style="width: 15%"></td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_exp_last_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_exp_current_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_exp_next_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="background-color: #f4b084; width: 25%">মোট উন্নয়ন আয়= উপমোট উন্নয়ন আয়+
                                            রাজস্ব উদ্বৃত্ত</td>
                                        <td style="background-color: #f4b084; width: 15%"></td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            {{ $p_two_exp_last_year_total_amount + $last_year_total_amount - $p_one_exp_last_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            {{ $p_two_exp_current_year_total_amount + $current_year_total_amount - $p_one_exp_current_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            {{ $p_two_exp_current_year_actual_income_total_amount + $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            {{ $p_two_exp_next_year_total_amount + $next_year_total_amount - $p_one_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            {{ $p_two_exp_next_year_actual_income_total_amount + $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #acb9ca; width: 25%">মোট আয় (রাজস্ব আয়+উপমোট উন্নয়ন
                                            আয়)</td>
                                        <td style="background-color: #acb9ca; width: 15%"></td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $last_year_total_amount + $p_two_exp_last_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $current_year_total_amount + $p_two_exp_current_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $current_year_actual_income_total_amount + $p_two_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $next_year_total_amount + $p_two_exp_next_year_total_amount }}</td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $next_year_actual_income_total_amount + $p_two_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 25%">উপমোট উন্নয়ন ব্যয় </td>
                                        <td style="width: 15%"></td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_dev_exp_last_year_total_amount - $p_two_dev_exp_last_year_closing_balance }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_dev_exp_current_year_total_amount - $p_two_dev_exp_current_year_closing_balance }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_dev_exp_current_year_actual_income_total_amount - $p_two_dev_exp_next_year_closing_balance }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_dev_exp_next_year_total_amount - $p_two_dev_exp_current_year_actual_income_closing_balance }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $p_two_dev_exp_next_year_actual_income_total_amount - $p_two_dev_exp_next_year_actual_income_closing_balance }}
                                        </td>
                                    </tr>

                                    @php
                                        $last_year_total_development_income = $p_two_exp_last_year_total_amount + $last_year_total_amount - $p_one_exp_last_year_total_amount;
                                        $current_year_total_development_income = $p_two_exp_current_year_total_amount + $current_year_total_amount - $p_one_exp_current_year_total_amount;
                                        $current_year_actual_income_total_development_income = $p_two_exp_current_year_actual_income_total_amount + $current_year_actual_income_total_amount - $p_one_exp_current_year_actual_income_total_amount;
                                        $next_year_total_development_income = $p_two_exp_next_year_total_amount + $next_year_total_amount - $p_one_exp_next_year_total_amount;
                                        $next_year_actual_income_total_development_income = $p_two_exp_next_year_actual_income_total_amount + $next_year_actual_income_total_amount - $p_one_exp_next_year_actual_income_total_amount;
                                    @endphp

                                    <tr>
                                        <td style="width: 25%">সমাপ্তি জের = (মোট উন্নয়ন আয়-উপমোট উন্নয়ন ব্যয়)</td>
                                        <td style="width: 15%"></td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $last_year_total_development_income - $p_two_dev_exp_last_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $current_year_total_development_income - $p_two_dev_exp_current_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $current_year_actual_income_total_development_income - $p_two_dev_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $next_year_total_development_income - $p_two_dev_exp_next_year_total_amount }}
                                        </td>
                                        <td style="width: 12%; text-align: end">
                                            {{ $next_year_actual_income_total_development_income - $p_two_dev_exp_next_year_actual_income_total_amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #f4b084; width: 25%">মোট উন্নয়ন ব্যয় : (সমাপ্তি জের
                                            সহ)</td>
                                        <td style="background-color: #f4b084; width: 15%"></td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            @isset($p_two_dev_exp_last_year_total_amount)
                                                {{ $p_two_dev_exp_last_year_total_amount }}
                                            @endisset
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            @isset($p_two_dev_exp_current_year_total_amount)
                                                {{ $p_two_dev_exp_current_year_total_amount }}
                                            @endisset
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            @isset($p_two_dev_exp_current_year_actual_income_total_amount)
                                                {{ $p_two_dev_exp_current_year_actual_income_total_amount }}
                                            @endisset
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            @isset($p_two_dev_exp_next_year_total_amount)
                                                {{ $p_two_dev_exp_next_year_total_amount }}
                                            @endisset
                                        </td>
                                        <td style="background-color: #f4b084; width: 12%; text-align: end">
                                            @isset($p_two_dev_exp_next_year_actual_income_total_amount)
                                                {{ $p_two_dev_exp_next_year_actual_income_total_amount }}
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #acb9ca; width: 25%">মোট ব্যয় (সমাপ্তি জের সহ)</td>
                                        <td style="background-color: #acb9ca; width: 15%"></td>

                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $p_one_exp_last_year_total_amount + $p_two_dev_exp_last_year_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $p_one_exp_current_year_total_amount + $p_two_dev_exp_current_year_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $p_one_exp_current_year_actual_income_total_amount + $p_two_dev_exp_current_year_actual_income_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_total_amount + $p_two_dev_exp_next_year_total_amount }}
                                        </td>
                                        <td style="background-color: #acb9ca; width: 12%; text-align: end">
                                            {{ $p_one_exp_next_year_actual_income_total_amount + $p_two_dev_exp_next_year_actual_income_total_amount }}
                                        </td>
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
