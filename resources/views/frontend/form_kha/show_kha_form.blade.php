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
                                            <label>R2G ফরমেটের অর্থ বছর ২০২১-২২: </label>
                                            <select name="part_one_revenue_income_financial_year" required
                                                class="form-control mt-2" id="part_one_revenue_income_financial_year">
                                                <option value="">----অনুগ্রহ করে নির্বাচন করুন----</option>
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
                                                    <th class="text-center">প্রাপ্তির বিবরণ</th>
                                                    <th class="text-center">পূর্ববর্তী বৎসরের প্রকৃত আয় (২০২০-২০২১)</th>
                                                    <th class="text-center">চলতি বৎসরের বাজেট বা সংশোধিত বাজেট (২০২১-২০২২)
                                                    </th>
                                                    <th class="text-center">পরবর্তী বৎসরের বাজেট (২০২২-২০২৩)</th>
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

                    {{-- <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                Part-1: revenue Expenditure:
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue Expenditure -->
                                <form action="{{ route('partOneRevenueExpenditureAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Financial Year: </label>
                                            <select name="part_one_revenue_expenditure_financial_year" required
                                                    class="form-control mt-2">
                                                <option value="">----Please Select----</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        value="{{ $financialYear->slug }}">{{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-1: revenue Expenditure:</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Expenditure</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            </thead>

                                            <!--Start Part One Expenditure Income Account Category Title and Parent Category -->
                                            @foreach ($partOneRevenueExpenditureAccountCategoryTitleList as $partOneRevenueExpenditureAccountCategoryTitle)
                                                <thead>
                                                <tr>
                                                    <th colspan="4"
                                                        style="background-color: #e7e6e6">{{ $partOneRevenueExpenditureAccountCategoryTitle->category_title }}</th>
                                                </tr>
                                                </thead>

                                                @php
                                                    $partOneExpenditureIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::table('parent_categories')->where('category_title_id', '=', $partOneRevenueExpenditureAccountCategoryTitle->id)->get();
                                                @endphp

                                                @foreach ($partOneExpenditureIncomeAccountParentCategoryList as $partOneExpenditureIncomeAccountParentCategory)
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden"
                                                                   value="{{ $partOneRevenueExpenditureAccountCategoryTitle->id }}"
                                                                   name="part_one_revenue_expenditure_account_category_title_id[]">

                                                            <input type="hidden"
                                                                   name="part_one_revenue_expenditure_account_parent_category_id[]"
                                                                   value="{{ $partOneExpenditureIncomeAccountParentCategory->id }}">

                                                            <input type="hidden"
                                                                   value="{{ $partOneRevenueExpenditureAccountCategoryTitle->category_type_id }}"
                                                                   name="part_one_revenue_expenditure_account_category_type_id[]">

                                                            {{ $partOneExpenditureIncomeAccountParentCategory->parent_category_name }}
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
                                            <!--End Part One Expenditure Income Account Category Title and Parent Category -->
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
                                Part-2: Development income account
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-2: Development income account -->
                                <form action="{{ route('partTwoDevelopmentIncomeAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Financial Year: </label>
                                            <select name="part_two_development_income_financial_year" required
                                                    class="form-control mt-2"
                                                    id="part_one_revenue_income_financial_year">
                                                <option value="">----Please Select----</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        value="{{ $financialYear->slug }}">{{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-2: Development income account:</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Expenditure</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            </thead>

                                            <!--Start Part Two Development Income Account Category Title and Parent Category -->
                                            @foreach ($partTwoDevelopmentIncomeAccountCategoryTitleList as $partTwoDevelopmentIncomeAccountCategoryTitle)
                                                <thead>
                                                <tr>
                                                    <th colspan="4"
                                                        style="background-color: #e7e6e6">{{ $partTwoDevelopmentIncomeAccountCategoryTitle->category_title }}</th>
                                                </tr>
                                                </thead>

                                                @php
                                                    $partTwoDevelopmentIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::table('parent_categories')->where('category_title_id', '=', $partTwoDevelopmentIncomeAccountCategoryTitle->id)->get();
                                                @endphp

                                                @foreach ($partTwoDevelopmentIncomeAccountParentCategoryList as $partTwoDevelopmentIncomeAccountParentCategory)
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden"
                                                                   value="{{ $partTwoDevelopmentIncomeAccountCategoryTitle->id }}"
                                                                   name="part_two_development_income_account_category_title_id[]">

                                                            <input type="hidden"
                                                                   name="part_two_development_income_account_parent_category_id[]"
                                                                   value="{{ $partTwoDevelopmentIncomeAccountParentCategory->id }}">

                                                            <input type="hidden"
                                                                   value="{{ $partTwoDevelopmentIncomeAccountCategoryTitle->category_type_id }}"
                                                                   name="part_two_development_income_account_category_type_id[]">

                                                            {{ $partTwoDevelopmentIncomeAccountParentCategory->parent_category_name }}
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
                                            <!--End Part Two Development Income Account Category Title and Parent Category -->
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
                                Part-2: Development Expenditure account
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action="{{ route('partTwoDevelopmentExpenditureAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Financial Year: </label>
                                            <select name="part_two_development_expenditure_financial_year" required
                                                    class="form-control mt-2">
                                                <option value="">----Please Select----</option>
                                                @foreach ($financialYearList as $financialYear)
                                                    <option
                                                        value="{{ $financialYear->slug }}">{{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-2: Development Expenditure account:</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Expenditure</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            </thead>

                                            <!--Start Part Two Development Expenditure Account Category Title and Parent Category -->
                                            @foreach ($partTwoDevelopmentExpenditureAccountCategoryTitleList as $partTwoDevelopmentExpenditureAccountCategoryTitle)
                                                <thead>
                                                <tr>
                                                    <th colspan="4"
                                                        style="background-color: #e7e6e6">{{ $partTwoDevelopmentExpenditureAccountCategoryTitle->category_title }}</th>
                                                </tr>
                                                </thead>

                                                @php
                                                    $partTwoDevelopmentExpenditureAccountParentCategoryList = \Illuminate\Support\Facades\DB::table('parent_categories')->where('category_title_id', '=', $partTwoDevelopmentExpenditureAccountCategoryTitle->id)->get();
                                                @endphp

                                                @foreach ($partTwoDevelopmentExpenditureAccountParentCategoryList as $partTwoDevelopmentExpenditureAccountParentCategory)

                                                    <thead>
                                                    <tr>
                                                        <td>
                                                            {{ $partTwoDevelopmentExpenditureAccountParentCategory->parent_category_name }}
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    </thead>

                                                    @php
                                                        $partTwoDevExpendChildCategoryList = \Illuminate\Support\Facades\DB::table('child_categories')->where('parent_category_id','=',$partTwoDevelopmentExpenditureAccountParentCategory->id)->get();
                                                    @endphp

                                                    <tbody>
                                                    @foreach ($partTwoDevExpendChildCategoryList as $partTwoDevExpendChildCategory)
                                                        <tr>
                                                            <td>
                                                                <input type="hidden"
                                                                       value="{{ $partTwoDevelopmentExpenditureAccountCategoryTitle->id }}"
                                                                       name="part_two_development_expenditure_account_category_title_id[]">

                                                                <input type="hidden"
                                                                       name="part_two_development_expenditure_account_parent_category_id[]"
                                                                       value="{{ $partTwoDevelopmentExpenditureAccountParentCategory->id }}">

                                                                <input type="hidden"
                                                                       value="{{ $partTwoDevelopmentExpenditureAccountCategoryTitle->category_type_id }}"
                                                                       name="part_two_development_expenditure_account_category_type_id[]">


                                                                <input type="hidden"
                                                                       name="part_two_development_expenditure_account_child_category_id[]"
                                                                       value="{{ $partTwoDevExpendChildCategory->id }}">


                                                                {{ $partTwoDevExpendChildCategory->child_category_name }}

                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="number" name="previous_budget[]"
                                                                           class="form-control">
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="number" name="current_budget[]"
                                                                           class="form-control">
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label>
                                                                    <input type="number" name="next_budget[]"
                                                                           class="form-control">
                                                                </label>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                @endforeach
                                            @endforeach
                                            @endforeach
                                            <!--End Part Two Development Expenditure Account Category Title and Parent Category -->
                                        </table>
                                    </div>
                                    <button class="btn btn-success text-center">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}

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
