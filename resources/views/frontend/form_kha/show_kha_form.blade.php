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

        <div class="row">
            <div class="col-md-12">

                <style>
                    table, thead, tbody, th, td {
                        border: 1px solid black;
                    }
                </style>

                <!-- Part-1: revenue income account: -->
                <form action="">
                    <div class="table-responsive mt-5" id="part_one_revenue_income_account_id">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th colspan="4">Part-1: revenue income account:</th>
                            </tr>
                            <tr>
                                <th class="text-center">Income source statement</th>
                                <th class="text-center">Actual income of last year (2020-21)</th>
                                <th class="text-center">Current year budget or amended budget (2021-22)</th>
                                <th class="text-center">Next year budget budget (2023-23)</th>
                            </tr>
                            <tr>
                                <th colspan="4" style="background-color: #e7e6e6">revenue income</th>
                            </tr>
                            <tr>
                                <th colspan="4" style="background-color: #e7e6e6">Own Source</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td> Balance (in hand(tk 500)</td>
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
                                <th class="text-center">Current year budget or amended budget (2021-22)</th>
                                <th class="text-center">Next year budget budget (2023-23)</th>
                            </tr>
                            <tr>
                                <th colspan="4" style="background-color: #e7e6e6">1. General establishment/Institutional
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td> Ka. Allowance of Chairmen (Government part)</td>
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
                                <th class="text-center">Current year budget or amended budget (2021-22)</th>
                                <th class="text-center">Next year budget budget (2023-23)</th>
                            </tr>
                            <tr>
                                <th colspan="4" style="background-color: #e7e6e6"> Grants (Development) </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td> Upazila Parishad </td>
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
                                <th class="text-center">Current year budget or amended budget (2021-22)</th>
                                <th class="text-center">Next year budget budget (2023-23)</th>
                            </tr>
                            <tr>
                                <th colspan="4" style="background-color: #e7e6e6"> 1. Agriculture and Small Irrigation: </th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td> Ka. Agriculture and Irrigation:(Tree plantation with Social forestration, Drainage and Irrigation, Small flood protection embankment, Build small Irrigation structure) </td>
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

{{--                <div class="text-center">--}}
{{--                    <button type="submit" id="submit" class="btn btn-primary">Save as draft</button>--}}
{{--                </div>--}}
            </div>
        </div>
@endsection
