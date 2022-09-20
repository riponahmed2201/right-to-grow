@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center en" style="display: none;">Budget Monitoring &amp; Expenditure
                    Tracking (BMET)</h2>
            </div>
        </div>

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
                                <form action="{{ route('partOneRevenueIncomeAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>R2G ফরমেটের অর্থ বছর:</label>
                                            <select name="part_one_revenue_income_financial_year" required
                                                class="form-control mt-2" id="part_one_revenue_income_financial_year">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_income_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">অংশ-১- রাজস্ব হিসাব আয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 55%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        (২০২০-২০২১)</th>
                                                    <th style="width: 15%" class="text-center">চলতি বৎসরের বাজেট বা সংশোধিত
                                                        বাজেট (২০২১-২০২২)
                                                    </th>
                                                    <th style="width: 15%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        (২০২২-২০২৩)</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="4" style="background-color: #e7e6e6">রাজস্ব আয়</th>
                                                </tr>
                                            </thead>

                                            <!--Start Part One Revenue Income Account Category and Subcategory -->
                                            @foreach ($partOneRevenueIncomeAccountCategories as $partOneRevenueIncomeAccountCategory)
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" style="background-color: #e7e6e6">
                                                            {{ $partOneRevenueIncomeAccountCategory->name }}</th>
                                                    </tr>
                                                </thead>

                                                @php
                                                    $partOneRevenueIncomeAccountSubcategories = \Illuminate\Support\Facades\DB::table('subcategories')
                                                        ->where('category_id', '=', $partOneRevenueIncomeAccountCategory->id)
                                                        ->get();
                                                @endphp

                                                @foreach ($partOneRevenueIncomeAccountSubcategories as $partOneRevenueIncomeAccountSubcategory)
                                                    <tbody>
                                                        <tr>
                                                            <td>

                                                                <input type="hidden"
                                                                    value="{{ $partOneRevenueIncomeAccountCategory->id }}"
                                                                    name="part_one_revenue_income_account_category_id[]">

                                                                <input type="hidden"
                                                                    name="part_one_revenue_income_account_subcategory_id[]"
                                                                    value="{{ $partOneRevenueIncomeAccountSubcategory->id }}">

                                                                <input type="hidden"
                                                                    value="{{ $partOneRevenueIncomeAccountCategory->type_id }}"
                                                                    name="part_one_revenue_income_account_type_id[]">


                                                                {{ $partOneRevenueIncomeAccountSubcategory->name }}
                                                            </td>
                                                            <td>
                                                                <input type="number" name="previous_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="current_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="next_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endforeach
                                            <!--End Part One Revenue Income Account Category and Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn btn-success text-center">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                অংশ-১- রাজস্ব হিসাব ব্যয়ঃ
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue Expenditure -->
                                <form action="{{ route('partOneRevenueExpenditureAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>R2G ফরমেটের অর্থ বছর ২০২১-২২:</label>
                                            <select name="part_one_revenue_expenditure_financial_year" required
                                                class="form-control mt-2">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">অংশ-১- রাজস্ব হিসাব ব্যয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 55%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        (২০২০-২০২১)</th>
                                                    <th style="width: 15%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত বাজেট (২০২১-২০২২)
                                                    </th>
                                                    <th style="width: 15%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        (২০২২-২০২৩)</th>
                                                </tr>
                                            </thead>

                                            <!--Start Part One Expenditure Income Account Category and  subcategory -->
                                            @foreach ($partOneRevenueExpenditureAccountCategories as $partOneRevenueExpenditureAccountCategory)
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" style="background-color: #e7e6e6">
                                                            {{ $partOneRevenueExpenditureAccountCategory->name }}</th>
                                                    </tr>
                                                </thead>

                                                @php
                                                    $partOneExpenditureIncomeAccountSubategories = \Illuminate\Support\Facades\DB::table('subcategories')
                                                        ->where('category_id', '=', $partOneRevenueExpenditureAccountCategory->id)
                                                        ->get();
                                                @endphp

                                                @foreach ($partOneExpenditureIncomeAccountSubategories as $partOneExpenditureIncomeAccountSubategory)
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden"
                                                                    value="{{ $partOneRevenueExpenditureAccountCategory->id }}"
                                                                    name="part_one_revenue_expenditure_account_category_id[]">

                                                                <input type="hidden"
                                                                    name="part_one_revenue_expenditure_account_subcategory_id[]"
                                                                    value="{{ $partOneExpenditureIncomeAccountSubategory->id }}">

                                                                <input type="hidden"
                                                                    value="{{ $partOneRevenueExpenditureAccountCategory->type_id }}"
                                                                    name="part_one_revenue_expenditure_account_type_id[]">

                                                                {{ $partOneExpenditureIncomeAccountSubategory->name }}
                                                            </td>
                                                            <td>
                                                                <input type="number" name="previous_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="current_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="next_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                @endforeach
                                            @endforeach
                                            <!--End Part One Expenditure Income Account Category and Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn btn-success text-center">Submit</button>
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
                                <form action="{{ route('partTwoDevelopmentIncomeAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>R2G ফরমেটের অর্থ বছর:</label>
                                            <select name="part_two_development_income_financial_year" required
                                                class="form-control mt-2" id="part_one_revenue_income_financial_year">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">অংশ-২- উন্নয়ন হিসাব আয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 55%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        (২০২০-২০২১)</th>
                                                    <th style="width: 15%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত বাজেট (২০২১-২০২২)
                                                    </th>
                                                    <th style="width: 15%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        (২০২২-২০২৩)</th>
                                                </tr>
                                            </thead>

                                            <!--Start Part Two Development Income Account Category and Subcategory -->
                                            @foreach ($partTwoDevelopmentIncomeAccountCategories as $partTwoDevelopmentIncomeAccountCategory)
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" style="background-color: #e7e6e6">
                                                            {{ $partTwoDevelopmentIncomeAccountCategory->name }}</th>
                                                    </tr>
                                                </thead>

                                                @php
                                                    $partTwoDevelopmentIncomeAccountSubcategories = \Illuminate\Support\Facades\DB::table('subcategories')
                                                        ->where('category_id', '=', $partTwoDevelopmentIncomeAccountCategory->id)
                                                        ->get();
                                                @endphp
                                                <tbody>
                                                    @foreach ($partTwoDevelopmentIncomeAccountSubcategories as $partTwoDevelopmentIncomeAccountSubcategory)
                                                        <tr>
                                                            <td>
                                                                <input type="hidden"
                                                                    value="{{ $partTwoDevelopmentIncomeAccountCategory->id }}"
                                                                    name="part_two_development_income_account_category_id[]">

                                                                <input type="hidden"
                                                                    name="part_two_development_income_account_subcategory_id[]"
                                                                    value="{{ $partTwoDevelopmentIncomeAccountSubcategory->id }}">

                                                                <input type="hidden"
                                                                    value="{{ $partTwoDevelopmentIncomeAccountCategory->type_id }}"
                                                                    name="part_two_development_income_account_type_id[]">

                                                                {{ $partTwoDevelopmentIncomeAccountSubcategory->name }}
                                                            </td>
                                                            <td>
                                                                <input type="number" name="previous_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="current_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="next_budget[]"
                                                                    class="form-control">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            @endforeach
                                            <!--End Part Two Development Income Account Category and Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn btn-success text-center">Submit</button>
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
                                <form action="{{ route('partTwoDevelopmentExpenditureAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>R2G ফরমেটের অর্থ বছর:</label>
                                            <select name="part_two_development_expenditure_financial_year" required
                                                class="form-control mt-2">
                                                <option value="">--নির্বাচন করুন--</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option value="{{ $financialYear->slug }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="4"> অংশ-২- উন্নয়ন হিসাব ব্যয়ঃ</th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 55%" class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th style="width: 15%" class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয়
                                                        (২০২০-২০২১)</th>
                                                    <th style="width: 15%" class="text-center">চলতি বৎসরের বাজেট বা
                                                        সংশোধিত বাজেট (২০২১-২০২২)
                                                    </th>
                                                    <th style="width: 15%" class="text-center">পরবর্তী বৎসরের বাজেট
                                                        (২০২২-২০২৩)</th>
                                                </tr>
                                            </thead>

                                            <!--Start Part Two Development Expenditure Account Category and Subategory -->
                                            @foreach ($partTwoDevelopmentExpenditureAccountCategories as $partTwoDevelopmentExpenditureAccountCategory)
                                                <thead>
                                                    <tr>
                                                        <th colspan="4" style="background-color: #e7e6e6">
                                                            {{ $partTwoDevelopmentExpenditureAccountCategory->name }}
                                                        </th>
                                                    </tr>
                                                </thead>

                                                @php
                                                    $partTwoDevelopmentExpenditureAccountSubcategories = \Illuminate\Support\Facades\DB::table('subcategories')
                                                        ->where('category_id', '=', $partTwoDevelopmentExpenditureAccountCategory->id)
                                                        ->get();
                                                @endphp

                                                @foreach ($partTwoDevelopmentExpenditureAccountSubcategories as $partTwoDevelopmentExpenditureAccountSubcategory)
                                                    <tr>
                                                        <td>
                                                            <input type="hidden"
                                                                value="{{ $partTwoDevelopmentExpenditureAccountCategory->id }}"
                                                                name="part_two_development_expenditure_account_category_id[]">

                                                            <input type="hidden"
                                                                name="part_two_development_expenditure_account_subcategory_id[]"
                                                                value="{{ $partTwoDevelopmentExpenditureAccountSubcategory->id }}">

                                                            <input type="hidden"
                                                                value="{{ $partTwoDevelopmentExpenditureAccountCategory->type_id }}"
                                                                name="part_two_development_expenditure_account_type_id[]">

                                                            {{ $partTwoDevelopmentExpenditureAccountSubcategory->name }}
                                                        </td>
                                                        <td>
                                                            <input type="number" name="previous_budget[]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="current_budget[]"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="next_budget[]"
                                                                class="form-control">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            <!--End Part Two Development Expenditure Account Category and  Subcategory -->
                                        </table>
                                    </div>
                                    <button class="btn btn-success text-center">Submit</button>
                                </form>
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
                        border: 1px solid black;
                    }
                </style>
            </div>
        </div>
    @endsection
