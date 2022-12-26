@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="col-md-12">
            <div class="page-header">
                <div class="col-md-12 text-center">
                    <h3>ইউনিয়ন পরিষদ বাজেট ফরম "খ"</h3>
                    <p>[বিধি-৩ (২) এবং আইনের চতুর্থ তফসিল দ্রষ্টব্য]</p>
                </div>
            </div>
        </div>

        <br> <br>

        <div class="col-md-12">
            @include('message')
        </div>

        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                অংশ-১- রাজস্ব হিসাব আয়ঃ
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue income account: / অংশ-১- রাজস্ব হিসাব আয়ঃ-->
                                <form
                                    action="{{ route('partOneRevenueIncomeAccount.update', ['user_id' => $userInfo[0]->id, 'financial_year' => $userInfo[0]->financial_year, 'union_id' => $userInfo[0]->union_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>অর্থ বছর:</label>
                                            <select onchange="partOneRevenueIncomeFinancialYearFunc(this.value)"
                                                name="part_one_revenue_income_financial_year" required
                                                class="form-control mt-2" id="part_one_revenue_income_financial_year">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        {{ $userInfo[0]->financial_year == $financialYear->slug ? 'selected' : '' }}
                                                        value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_income_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="6">অংশ-১- রাজস্ব হিসাব আয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 25%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%; background-color: #f4b084" class="text-center">
                                                        নোট</th>
                                                    <th style="width: 12%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        <p id="part_one_revenue_pre_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">চলতি বৎসরের বাজেট বা সংশোধিত
                                                        বাজেট <p id="part_one_revenue_current_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_one_revenue_actual_income_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        <p id="part_one_revenue_next_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_one_revenue_next_year_actual_budget_id"></p>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="7" style="background-color: #e7e6e6">রাজস্ব আয়</th>
                                                </tr>
                                            </thead>

                                            <!--Start Part One Revenue Income Account Category and Subcategory -->
                                            @foreach ($partOneDataFormat as $key => $value)
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" style="background-color: #e7e6e6">
                                                            {{ $key }}</th>
                                                    </tr>
                                                </thead>

                                                @foreach ($value as $v)
                                                    @if ($v)
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden" value="{{ $v['id'] }}"
                                                                        name="partOneId[]">
                                                                    <input type="hidden" value="{{ $v['category_id'] }}"
                                                                        name="part_one_revenue_category_id[]">

                                                                    <input type="hidden"
                                                                        name="part_one_revenue_subcategory_id[]"
                                                                        value="{{ $v['subcategory_id'] }}">

                                                                    <input type="hidden" value="{{ $v['type_id'] }}"
                                                                        name="part_one_revenue_type_id[]">

                                                                    <label
                                                                        for="">{{ $v['subcategory_name'] }}</label>

                                                                </td>
                                                                <td style="background-color: #f4b084">
                                                                    <input type="text" name="notes[]"
                                                                        class="form-control" value="{{ $v['notes'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="previous_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $v['last_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="current_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $v['current_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number"
                                                                        name="current_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $v['current_year_actual_income'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $v['next_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $v['next_year_actual_income'] }}">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <!--End Part One Revenue Income Account Category and Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn text-center" style="background-color: #5312b1; color:white">Final
                                        Submission</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                অংশ-১- রাজস্ব হিসাব ব্যয়ঃ
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue Expenditure -->
                                <form
                                    action="{{ route('partOneRevenueExpenditureAccount.update', ['user_id' => $userInfo[0]->id, 'financial_year' => $userInfo[0]->financial_year, 'union_id' => $userInfo[0]->union_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>অর্থ বছর:</label>
                                            <select name="part_two_financial_year" id="part_two_financial_year"
                                                onchange="partOneExpenditureIncomeFinancialYearFunc(this.value)" required
                                                class="form-control mt-2">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        {{ $userInfo[0]->financial_year == $financialYear->slug ? 'selected' : '' }}
                                                        value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">অংশ-১- রাজস্ব হিসাব ব্যয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 25%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%; background-color: #f4b084" class="text-center">
                                                        নোট</th>
                                                    <th style="width: 12%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        <p id="part_one_expenditure_pre_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত
                                                        বাজেট <p id="part_one_expenditure_current_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_one_expenditure_actual_income_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        <p id="part_one_expenditure_next_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_one_expenditure_next_year_actual_budget_id"></p>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <!--Start Part One Expenditure Income Account Category and  subcategory -->
                                            @foreach ($partTwoDataFormat as $part_two_key => $part_two_value)
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" style="background-color: #e7e6e6">
                                                            {{ $part_two_key }}</th>
                                                    </tr>
                                                </thead>

                                                @foreach ($part_two_value as $part_two_subcategory_value)
                                                    @if ($part_two_subcategory_value)
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden"
                                                                        value="{{ $part_two_subcategory_value['category_id'] }}"
                                                                        name="part_two_category_id[]">

                                                                    <input type="hidden" name="part_two_subcategory_id[]"
                                                                        value="{{ $part_two_subcategory_value['subcategory_id'] }}">

                                                                    <input type="hidden"
                                                                        value="{{ $part_two_subcategory_value['type_id'] }}"
                                                                        name="part_two_type_id[]">

                                                                    {{ $part_two_subcategory_value['subcategory_name'] }}
                                                                </td>
                                                                <td style="background-color: #f4b084">
                                                                    <input type="text" name="notes[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['notes'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="previous_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['last_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="current_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['current_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number"
                                                                        name="current_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['current_year_actual_income'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['next_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_two_subcategory_value['next_year_actual_income'] }}">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <!--End Part One Expenditure Income Account Category and Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn text-center" style="background-color: #5312b1; color:white">Final
                                        Submission</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                aria-controls="flush-collapseThree">
                                অংশ-২- উন্নয়ন হিসাব আয়ঃ
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!--অংশ-২- উন্নয়ন হিসাব আয়ঃ -->
                                <form
                                    action="{{ route('partTwoDevelopmentIncomeAccount.update', ['user_id' => $userInfo[0]->id, 'financial_year' => $userInfo[0]->financial_year, 'union_id' => $userInfo[0]->union_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>অর্থ বছর:</label>
                                            <select name="part_two_financial_year"
                                                onchange="partTwoDevelopmentRevenueFinancialYearFunc(this.value)" required
                                                class="form-control mt-2" id="part_two_financial_year">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        {{ $userInfo[0]->financial_year == $financialYear->slug ? 'selected' : '' }}
                                                        value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7">অংশ-২- উন্নয়ন হিসাব আয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 25%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%; background-color: #f4b084" class="text-center">
                                                        নোট</th>
                                                    <th style="width: 12%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        <p id="part_two_development_revenue_pre_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত
                                                        বাজেট <p id="part_two_development_revenue_current_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_two_development_revenue_actual_income_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        <p id="part_two_development_revenue_next_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_two_development_revenue_next_year_actual_budget_id">
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <!-- START PART THREE CATEGORY AND SUBCATEGORY -->
                                            @foreach ($partThreeDataFormat as $part_three_key => $part_three_value)
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" style="background-color: #e7e6e6">
                                                            {{ $part_three_key }}</th>
                                                    </tr>
                                                </thead>

                                                @foreach ($part_three_value as $part_three_subcategory_value)
                                                    @if ($part_three_subcategory_value)
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden"
                                                                        value="{{ $part_three_subcategory_value['category_id'] }}"
                                                                        name="part_three_category_id[]">

                                                                    <input type="hidden"
                                                                        name="part_three_subcategory_id[]"
                                                                        value="{{ $part_three_subcategory_value['subcategory_id'] }}">

                                                                    <input type="hidden"
                                                                        value="{{ $part_three_subcategory_value['type_id'] }}"
                                                                        name="part_three_type_id[]">

                                                                    {{ $part_three_subcategory_value['subcategory_name'] }}
                                                                </td>
                                                                <td style="background-color: #f4b084">
                                                                    <input type="text" name="notes[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['notes'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="previous_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['last_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="current_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['current_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number"
                                                                        name="current_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['current_year_actual_income'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['next_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_three_subcategory_value['next_year_actual_income'] }}">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <!-- END PART THREE CATEGORY AND SUBCATEGORY -->
                                        </table>
                                    </div>
                                    <button class="btn text-center" style="background-color: #5312b1; color:white">Final
                                        Submission</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                aria-controls="flush-collapseFour">
                                অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form
                                    action="{{ route('partTwoDevelopmentExpenditureAccount.update', ['user_id' => $userInfo[0]->id, 'financial_year' => $userInfo[0]->financial_year, 'union_id' => $userInfo[0]->union_id]) }}"
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>অর্থ বছর:</label>
                                            <select name="part_four_financial_year" id="part_four_financial_year"
                                                onchange="partTwoDevelopmentExpenditureFinancialYearFunc(this.value)"
                                                required class="form-control mt-2">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        {{ $userInfo[0]->financial_year == $financialYear->slug ? 'selected' : '' }}
                                                        value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7"> অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 25%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%; background-color: #f4b084" class="text-center">
                                                        নোট</th>
                                                    <th style="width: 12%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        <p id="part_two_development_expenditure_pre_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত
                                                        বাজেট <p
                                                            id="part_two_development_expenditure_current_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_two_development_expenditure_actual_income_year_budget_id">
                                                        </p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        <p id="part_two_development_expenditure_next_year_budget_id"></p>
                                                    </th>
                                                    <th style="width: 12%" class="text-center">প্রকৃত আয় <p
                                                            id="part_two_development_expenditure_next_year_actual_budget_id">
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <!-- START PART FOUR CATEGORY AND SUBCATEGORY -->
                                            @foreach ($partFourDataFormat as $part_four_key => $part_four_value)
                                                <thead>
                                                    <tr>
                                                        <th colspan="7" style="background-color: #e7e6e6">
                                                            {{ $part_four_key }}
                                                        </th>
                                                    </tr>
                                                </thead>

                                                @foreach ($part_four_value as $part_four_subcategory_value)
                                                    @if ($part_four_subcategory_value)
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="hidden"
                                                                        value="{{ $part_four_subcategory_value['category_id'] }}"
                                                                        name="part_four_category_id[]">

                                                                    <input type="hidden"
                                                                        name="part_four_subcategory_id[]"
                                                                        value="{{ $part_four_subcategory_value['subcategory_id'] }}">

                                                                    <input type="hidden"
                                                                        value="{{ $part_four_subcategory_value['type_id'] }}"
                                                                        name="part_four_type_id[]">

                                                                    {{ $part_four_subcategory_value['subcategory_name'] }}
                                                                </td>
                                                                <td style="background-color: #f4b084">
                                                                    <input type="text" name="notes[]"
                                                                        value="{{ $part_four_subcategory_value['notes'] }}"
                                                                        class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="previous_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_four_subcategory_value['last_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="current_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_four_subcategory_value['current_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number"
                                                                        name="current_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_four_subcategory_value['current_year_actual_income'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_budget[]"
                                                                        class="form-control"
                                                                        value="{{ $part_four_subcategory_value['next_year_budget'] }}">
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="next_year_actual_income[]"
                                                                        class="form-control"
                                                                        value="{{ $part_four_subcategory_value['next_year_actual_income'] }}">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <!-- END PART FOUR CATEGORY AND SUBCATEGORY -->
                                        </table>
                                    </div>
                                    <button class="btn text-center" style="background-color: #5312b1; color:white">Final
                                        Submission</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <style>
                table,
                thead,
                tbody,
                th,
                td {
                    border: 1px solid #5312b1;
                }
            </style>
        </div>
    </div>
    <br><br><br><br>
@endsection

@section('custom_js')
    <script>
        //Part One Revenue Income Financial Year Onchane Function
        function partOneRevenueIncomeFinancialYearFunc(current_financial_year) {

            if (current_financial_year) {

                const financial_year_array = current_financial_year.split("-").slice(0, 3);

                if (financial_year_array.length === 2) {

                    const previous_year = (parseInt(financial_year_array[0]) - 1) + "-" + (parseInt(financial_year_array[
                            1]) -
                        1);

                    const next_year = (parseInt(financial_year_array[0]) + 1) + "-" + (parseInt(financial_year_array[1]) +
                        1);

                    //Current Financial Year 
                    document.getElementById("part_one_revenue_current_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';
                    document.getElementById("part_one_revenue_actual_income_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';

                    //Previous Financial Year
                    document.getElementById("part_one_revenue_pre_year_budget_id").innerHTML = '(' + previous_year + ')';

                    //Next Financial Year
                    document.getElementById("part_one_revenue_next_year_budget_id").innerHTML = '(' + next_year + ')';
                    document.getElementById("part_one_revenue_next_year_actual_budget_id").innerHTML = '(' + next_year +
                        ')';
                }
            }

        }

        //Part One Expenditure Income Financial Year Onchane Function
        function partOneExpenditureIncomeFinancialYearFunc(current_financial_year) {

            if (current_financial_year) {

                const financial_year_array = current_financial_year.split("-").slice(0, 3);

                if (financial_year_array.length === 2) {

                    const previous_year = (parseInt(financial_year_array[0]) - 1) + "-" + (parseInt(financial_year_array[
                            1]) -
                        1);

                    const next_year = (parseInt(financial_year_array[0]) + 1) + "-" + (parseInt(financial_year_array[1]) +
                        1);

                    //Current Financial Year 
                    document.getElementById("part_one_expenditure_current_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';
                    document.getElementById("part_one_expenditure_actual_income_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';

                    //Previous Financial Year
                    document.getElementById("part_one_expenditure_pre_year_budget_id").innerHTML = '(' + previous_year +
                        ')';

                    //Next Financial Year
                    document.getElementById("part_one_expenditure_next_year_budget_id").innerHTML = '(' + next_year + ')';
                    document.getElementById("part_one_expenditure_next_year_actual_budget_id").innerHTML = '(' + next_year +
                        ')';
                }
            }
        }

        //Part Two Revenue Income Financial Year Onchane Function
        function partTwoDevelopmentRevenueFinancialYearFunc(current_financial_year) {

            if (current_financial_year) {

                const financial_year_array = current_financial_year.split("-").slice(0, 3);

                if (financial_year_array.length === 2) {

                    const previous_year = (parseInt(financial_year_array[0]) - 1) + "-" + (parseInt(financial_year_array[
                            1]) -
                        1);

                    const next_year = (parseInt(financial_year_array[0]) + 1) + "-" + (parseInt(financial_year_array[1]) +
                        1);

                    //Current Financial Year 
                    document.getElementById("part_two_development_revenue_current_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';
                    document.getElementById("part_two_development_revenue_actual_income_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';

                    //Previous Financial Year
                    document.getElementById("part_two_development_revenue_pre_year_budget_id").innerHTML = '(' +
                        previous_year + ')';

                    //Next Financial Year
                    document.getElementById("part_two_development_revenue_next_year_budget_id").innerHTML = '(' +
                        next_year + ')';
                    document.getElementById("part_two_development_revenue_next_year_actual_budget_id").innerHTML = '(' +
                        next_year +
                        ')';
                }
            }

        }

        //Part Two Development Expenditure Financial Year Onchane Function
        function partTwoDevelopmentExpenditureFinancialYearFunc(current_financial_year) {

            if (current_financial_year) {

                const financial_year_array = current_financial_year.split("-").slice(0, 3);

                if (financial_year_array.length === 2) {

                    const previous_year = (parseInt(financial_year_array[0]) - 1) + "-" + (parseInt(financial_year_array[
                            1]) -
                        1);

                    const next_year = (parseInt(financial_year_array[0]) + 1) + "-" + (parseInt(financial_year_array[1]) +
                        1);

                    //Current Financial Year 
                    document.getElementById("part_two_development_expenditure_current_year_budget_id").innerHTML = '(' +
                        current_financial_year + ')';
                    document.getElementById("part_two_development_expenditure_actual_income_year_budget_id").innerHTML =
                        '(' +
                        current_financial_year + ')';

                    //Previous Financial Year
                    document.getElementById("part_two_development_expenditure_pre_year_budget_id").innerHTML = '(' +
                        previous_year + ')';

                    //Next Financial Year
                    document.getElementById("part_two_development_expenditure_next_year_budget_id").innerHTML = '(' +
                        next_year + ')';
                    document.getElementById("part_two_development_expenditure_next_year_actual_budget_id").innerHTML = '(' +
                        next_year +
                        ')';
                }
            }

        }
    </script>
@endsection
