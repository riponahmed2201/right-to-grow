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
                    <h3>Union Parishad Budget form "Kha"</h3>
                </div>
            </div>
        </div>

        <br> <br>

        <div class="card">
            <div class="card-body">
                <div class="accordion" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                Part-1: revenue income account:
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue income account: -->
                                <form action="{{ route('partOneRevenueIncomeAccount.store') }}" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Financial Year: </label>
                                            <input type="date" class="form-control mt-2" name="financial_year">
                                        </div>

                                    </div>
                                    <div class="table-responsive mt-5" id="part_one_revenue_income_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-1: revenue income account:</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Income source statement</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                                            </tr>
                                            </thead>

                                            <!--Start Part One Revenue Income Account Category Title and Parent Category -->
                                            @foreach($partOneRevenueIncomeAccountCategoryTitleList as $partOneRevenueIncomeAccountCategoryTitle)
                                                <thead>
                                                <tr>
                                                    <th colspan="4"
                                                        style="background-color: #e7e6e6">{{ $partOneRevenueIncomeAccountCategoryTitle->category_title }}</th>
                                                </tr>
                                                </thead>

                                                @php
                                                    $partOneRevenueIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::table('parent_categories')->where('category_title_id', '=', $partOneRevenueIncomeAccountCategoryTitle->id)->get();
                                                @endphp

                                                @foreach($partOneRevenueIncomeAccountParentCategoryList as $partOneRevenueIncomeAccountParentCategory)
                                                    <tbody>
                                                    <tr>
                                                        <td>

                                                            <input type="hidden"
                                                                   value="{{ $partOneRevenueIncomeAccountCategoryTitle->id }}"
                                                                   name="part_one_revenue_income_account_category_title_id[]">

                                                            <input type="hidden"
                                                                   name="part_one_revenue_income_account_parent_category_id[]"
                                                                   value="{{ $partOneRevenueIncomeAccountParentCategory->id }}">

                                                            <input type="hidden"
                                                                   value="{{ $partOneRevenueIncomeAccountCategoryTitle->category_type_id }}"
                                                                   name="part_one_revenue_income_account_category_type_id[]">


                                                            {{ $partOneRevenueIncomeAccountParentCategory->parent_category_name }}
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
                                            <!--End Part One Revenue Income Account Category Title and Parent Category -->

                                            <tbody>
                                            <tr>
                                                <td><strong>Total revenue income</strong></td>
                                                <td class="text-center"> 353534</td>
                                                <td class="text-center"> 43647547</td>
                                                <td class="text-center"> 4363473</td>
                                            </tr>

                                            </tbody>
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
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                Part-1: revenue Expenditure:
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <!-- Part-1: revenue Expenditure -->
                                <form action="">
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
                                            @foreach($partOneRevenueExpenditureAccountCategoryTitleList as $partOneRevenueExpenditureAccountCategoryTitle)
                                                <thead>
                                                <tr>
                                                    <th colspan="4"
                                                        style="background-color: #e7e6e6">{{ $partOneRevenueExpenditureAccountCategoryTitle->category_title }}</th>
                                                    <input type="hidden"
                                                           value="{{ $partOneRevenueExpenditureAccountCategoryTitle->id }}"
                                                           name="part_one_revenue_expenditure_account_category_title_id[]">
                                                    <input type="hidden"
                                                           value="{{ $partOneRevenueExpenditureAccountCategoryTitle->category_type_id }}"
                                                           name="part_one_revenue_expenditure_account_category_type_id[]">
                                                </tr>
                                                </thead>

                                                @php
                                                    $partOneExpenditureIncomeAccountParentCategoryList = \Illuminate\Support\Facades\DB::table('parent_categories')->where('category_title_id', '=', $partOneRevenueExpenditureAccountCategoryTitle->id)->get();
                                                @endphp

                                                @foreach($partOneExpenditureIncomeAccountParentCategoryList as $partOneExpenditureIncomeAccountParentCategory)
                                                    <tbody>
                                                    <tr>
                                                        <td> {{ $partOneExpenditureIncomeAccountParentCategory->parent_category_name }} </td>
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
                                            <tbody>
                                            <tr>
                                                <td><strong>Total expenditure (revenue account) </strong></td>
                                                <td class="text-center"> 353534</td>
                                                <td class="text-center"> 43647547</td>
                                                <td class="text-center"> 4363473</td>
                                            </tr>
                                            </tbody>
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
                                <form action="">
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-2: Development income account</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Income source statement</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="background-color: #e7e6e6"> Grants
                                                    (Development)
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td> Upazila Parishad</td>
                                                <td>
                                                    <input type="number" name="previous_budget[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="current_budget[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="next_budget[]" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Development Income</strong></td>
                                                <td class="text-center"> 353534</td>
                                                <td class="text-center"> 43647547</td>
                                                <td class="text-center"> 4363473</td>
                                            </tr>
                                            </tbody>
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
                                Part-2: Development income account
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                             aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action="">
                                    <div class="table-responsive mt-5" id="part_one_revenue_expenditure_account_id">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th colspan="4">Part-2: Development Expenditure account</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Expenditure</th>
                                                <th class="text-center">Actual income of last year (2020-21)</th>
                                                <th class="text-center">Current year budget or amended budget
                                                    (2021-22)
                                                </th>
                                                <th class="text-center">Next year budget (2023-23)</th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="background-color: #e7e6e6"> 1. Agriculture and
                                                    Small
                                                    Irrigation:
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td> Ka. Agriculture and Irrigation:(Tree plantation with Social
                                                    forestration, Drainage
                                                    and Irrigation, Small flood protection embankment, Build small
                                                    Irrigation structure)
                                                </td>
                                                <td>
                                                    <input type="number" name="previous_budget[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="current_budget[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="number" name="next_budget[]" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Total Expenditure (Development account)</strong></td>
                                                <td class="text-center"> 353534</td>
                                                <td class="text-center"> 43647547</td>
                                                <td class="text-center"> 4363473</td>
                                            </tr>
                                            </tbody>
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
                    table, thead, tbody, th, td {
                        border: 1px solid black;
                    }
                </style>
            </div>
        </div>
@endsection
