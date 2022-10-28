@extends('master')

@section('main-content')
    <style>
        @media print {
            #myPrint {
                display: none;
            }
        }

        @media print {
            #view_project {
                display: none;
            }
        }

        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 1.6cm;
            }
        }

        @media print {
            @page {
                size: landscape
            }
        }
    </style>
    <div class="main-containt" id="printSummaryDetails">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">বাজেট ফরম ’ক’</h2>
                <h4 class="page-title text-center">[বিধি ৩ (২) দ্রষ্টব্য]</h4>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-header" style="background-color: #222222; color: white">
                <div style="display: flex; justify-content: space-between;">
                    <h2 class="card-title">অর্থ বছর: {{ $makeFinancialYear['currentYear'] }}</h2>
                    <button style="margin-bottom: 5px" type="button" id="myPrint"
                        onclick="printDiv('printSummaryDetails')" class="btn btn-primary">Print
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <td colspan="7"> <strong>বাজেট সার-সংক্ষেপ</strong> </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">বিবরণ</th>
                                        <th>পূর্ববর্তী বৎসরের প্রকৃত ({{ $makeFinancialYear['previousYear'] }})</th>
                                        <th>চলতি বৎসরের বাজেট বা চলতি বৎসরের সংশোধিত বাজেট
                                            ({{ $makeFinancialYear['currentYear'] }})</th>
                                        <th>প্রকৃত আয় ({{ $makeFinancialYear['currentYear'] }})
                                        </th>
                                        <th>পরবর্তী বৎসরের বাজেট ({{ $makeFinancialYear['nextYear'] }})</th>
                                        <th>প্রকৃত আয় ({{ $makeFinancialYear['nextYear'] }})</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- part one income -->
                                    <tr>
                                        <td rowspan="6">অংশ-১</td>
                                        <td style="background-color: #c0c0c0">রাজস্ব হিসাব প্রাপ্তি</td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                    </tr>
                                    <tr>
                                        <td>রাজস্ব</td>
                                        <td class="text-end"> {{ $getPartOneRevenueIncomeData[0]->total_last_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_budget }}
                                        </td>
                                        <td class="text-end">{{ $getPartOneRevenueIncomeData[0]->total_next_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_actual_income }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_actual_income }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>অনদুান</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end"> 0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                    <tr>
                                        <td> <strong>মোট প্রাপ্তি</strong> </td>
                                        <td class="text-end"> {{ $getPartOneRevenueIncomeData[0]->total_last_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_budget }}
                                        </td>
                                        <td class="text-end">{{ $getPartOneRevenueIncomeData[0]->total_next_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_actual_income }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_actual_income }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>বাদ রাজস্ব ব্যয়</td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueExpenditureData[0]->total_last_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueExpenditureData[0]->total_current_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueExpenditureData[0]->total_next_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueExpenditureData[0]->total_current_year_actual_income }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueExpenditureData[0]->total_next_year_actual_income }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <strong>রাজস্ব উদ্বৃত্ত/ঘাটতি (ক)</strong> </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_last_year_budget - $getPartOneRevenueExpenditureData[0]->total_last_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_budget - $getPartOneRevenueExpenditureData[0]->total_current_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_budget - $getPartOneRevenueExpenditureData[0]->total_next_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_actual_income - $getPartOneRevenueExpenditureData[0]->total_current_year_actual_income }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_actual_income - $getPartOneRevenueExpenditureData[0]->total_next_year_actual_income }}
                                        </td>
                                    </tr>

                                    <!-- part two development -->
                                    <tr>
                                        <td rowspan="9">অংশ-২</td>
                                        <td style="background-color: #c0c0c0">উন্নয়ন অনদুান</td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                        <td style="background-color: #c0c0c0"></td>
                                    </tr>
                                    <tr>
                                        <td>উন্নয়ন অনদুান</td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_last_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_current_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_next_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_current_year_actual_income)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_next_year_actual_income)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>অন্যান্য অনুদান ও চাঁদা</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end">0</td>
                                        <td class="text-end">0</td>
                                    </tr>
                                    <tr>
                                        <td>মোট (খ)</td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_last_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_current_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_next_year_budget)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_current_year_actual_income)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentIncome[0]->total_next_year_actual_income)
                                                {{ $getPartTwoDevelopmentIncome[0]->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <strong>মোট প্রাপ্ত সম্পদ (ক+খ)</strong> </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_last_year_budget - $getPartOneRevenueExpenditureData[0]->total_last_year_budget + $getPartTwoDevelopmentIncome[0]->total_last_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_budget - $getPartOneRevenueExpenditureData[0]->total_current_year_budget + $getPartTwoDevelopmentIncome[0]->total_current_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_budget - $getPartOneRevenueExpenditureData[0]->total_next_year_budget + $getPartTwoDevelopmentIncome[0]->total_next_year_budget }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_current_year_actual_income - $getPartOneRevenueExpenditureData[0]->total_current_year_actual_income + $getPartTwoDevelopmentIncome[0]->total_current_year_actual_income }}
                                        </td>
                                        <td class="text-end">
                                            {{ $getPartOneRevenueIncomeData[0]->total_next_year_actual_income - $getPartOneRevenueExpenditureData[0]->total_next_year_actual_income + $getPartTwoDevelopmentIncome[0]->total_next_year_actual_income }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>বাদ উন্নয়ন ব্যয়</td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentExpenditure[0]->total_last_year_budget)
                                                {{ $getPartTwoDevelopmentExpenditure[0]->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentExpenditure[0]->total_current_year_budget)
                                                {{ $getPartTwoDevelopmentExpenditure[0]->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentExpenditure[0]->total_next_year_budget)
                                                {{ $getPartTwoDevelopmentExpenditure[0]->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentExpenditure[0]->total_current_year_actual_income)
                                                {{ $getPartTwoDevelopmentExpenditure[0]->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoDevelopmentExpenditure[0]->total_next_year_actual_income)
                                                {{ $getPartTwoDevelopmentExpenditure[0]->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>সার্বিক বাজেট উদ্বৃত্ত/ঘাটতি</td>
                                        <td class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_last_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_current_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_next_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_current_year_actual_income)
                                                {{ $getPartTwoClosingBalance[0]->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_next_year_actual_income)
                                                {{ $getPartTwoClosingBalance[0]->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>যোগ প্রারম্ভিক জের (১ জুলাই)</td>
                                        <td class="text-end">
                                            @if ($getPartOneTotalEarlyBalaceFirstJulay->total_last_year_budget)
                                                {{ $getPartOneTotalEarlyBalaceFirstJulay->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartOneTotalEarlyBalaceFirstJulay->total_current_year_budget)
                                                {{ $getPartOneTotalEarlyBalaceFirstJulay->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartOneTotalEarlyBalaceFirstJulay->total_next_year_budget)
                                                {{ $getPartOneTotalEarlyBalaceFirstJulay->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            @if ($getPartOneTotalEarlyBalaceFirstJulay->total_current_year_actual_income)
                                                {{ $getPartOneTotalEarlyBalaceFirstJulay->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            @if ($getPartOneTotalEarlyBalaceFirstJulay->total_next_year_actual_income)
                                                {{ $getPartOneTotalEarlyBalaceFirstJulay->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="background-color: #c0c0c0">সমাপ্তি জের</td>
                                        <td style="background-color: #c0c0c0" class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_last_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_last_year_budget }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td style="background-color: #c0c0c0" class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_current_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_current_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td style="background-color: #c0c0c0" class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_next_year_budget)
                                                {{ $getPartTwoClosingBalance[0]->total_next_year_budget }}
                                            @else
                                                0
                                            @endif

                                        </td>
                                        <td style="background-color: #c0c0c0" class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_current_year_actual_income)
                                                {{ $getPartTwoClosingBalance[0]->total_current_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        <td style="background-color: #c0c0c0" class="text-end">
                                            @if ($getPartTwoClosingBalance[0]->total_next_year_actual_income)
                                                {{ $getPartTwoClosingBalance[0]->total_next_year_actual_income }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>

    <script>
        // print to the project view details
        function printDiv(divName) {
            const printContents = document.getElementById(divName).innerHTML;
            const originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
