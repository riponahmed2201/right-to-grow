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
                                <tr>
                                    <td>2021-2022</td>
                                    <td>Khulna</td>
                                    <td>Khulna</td>
                                    <td>Dumuria</td>
                                    <td>Gutudia</td>
                                </tr>
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
                                <tr>
                                    <td>
                                        <img style="width: 60px; height: 60px; border-radius: 50%"
                                             src="{{ asset('assets/admin/dist/img/avatar5.png') }}"
                                             alt="User Image">
                                    </td>
                                    <td>Siful Islam Tuhin</td>
                                    <td>Software Engineer</td>
                                    <td>01700000000</td>
                                    <td>situhin2007@gmail.com</td>
                                </tr>
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

                                    <tbody>
                                    @foreach($partOneRevenueIncomeAccountParentCategoryList as $partOneRevenueIncomeAccountParentCategory)
                                        <tr>
                                            <td>{{ $partOneRevenueIncomeAccountParentCategory->parent_category_name }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->last_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->current_year_budget }}</td>
                                            <td style="text-align: end">{{ $partOneRevenueIncomeAccountParentCategory->next_year_budget }}</td>
                                        </tr>
                                    </tbody>
                                @endforeach
                                @endforeach
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
