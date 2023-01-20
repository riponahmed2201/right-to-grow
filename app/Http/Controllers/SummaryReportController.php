<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryReportController extends Controller
{

    public function showSummaryReport($user_id, $union_id, $financial_year)
    {
        try {

            //Start part one revenue income account
            $data['getPartOneRevenueIncomeData'] = DB::table('part_one_revenue_income_accounts as a')
                ->select(
                    DB::raw('SUM(a.last_year_budget) as total_last_year_budget'),
                    DB::raw('SUM(a.current_year_budget) as total_current_year_budget'),
                    DB::raw('SUM(a.next_year_budget) as total_next_year_budget'),
                    DB::raw('SUM(a.current_year_actual_income) as total_current_year_actual_income'),
                    DB::raw('SUM(a.next_year_actual_income) as total_next_year_actual_income')
                )
                ->where('a.type_id', '=', 1)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->get();

            //মোট প্রারম্ভিক জের (১ লা জুলাই)
            $data['getPartOneTotalEarlyBalaceFirstJulay'] = DB::table('part_one_revenue_income_accounts as a')
                ->select(
                    'a.last_year_budget as total_last_year_budget',
                    'a.current_year_budget as total_current_year_budget',
                    'a.next_year_budget as total_next_year_budget',
                    'a.current_year_actual_income as total_current_year_actual_income',
                    'a.next_year_actual_income as total_next_year_actual_income'
                )
                ->where('a.type_id', '=', 1)
                ->where('a.subcategory_id', '=', 3)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->first();
            //End part one revenue income account

            //Start part one revenue expenditure income account
            $data['getPartOneRevenueExpenditureData'] = DB::table('part_one_revenue_expenditure_accounts as a')
                ->select(
                    DB::raw('SUM(a.last_year_budget) as total_last_year_budget'),
                    DB::raw('SUM(a.current_year_budget) as total_current_year_budget'),
                    DB::raw('SUM(a.next_year_budget) as total_next_year_budget'),
                    DB::raw('SUM(a.current_year_actual_income) as total_current_year_actual_income'),
                    DB::raw('SUM(a.next_year_actual_income) as total_next_year_actual_income')
                )
                ->where('a.type_id', '=', 2)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->get();

            //End part one revenue expenditure account

            //Start part two revenue development income account
            $data['getPartTwoDevelopmentIncome'] = DB::table('part_one_revenue_expenditure_accounts as a')
                ->select(
                    DB::raw('SUM(a.last_year_budget) as total_last_year_budget'),
                    DB::raw('SUM(a.current_year_budget) as total_current_year_budget'),
                    DB::raw('SUM(a.next_year_budget) as total_next_year_budget'),
                    DB::raw('SUM(a.current_year_actual_income) as total_current_year_actual_income'),
                    DB::raw('SUM(a.next_year_actual_income) as total_next_year_actual_income')
                )
                ->where('a.type_id', '=', 3)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->get();

            //End part two development income account


            //Start part two revenue development income account
            $data['getPartTwoDevelopmentExpenditure'] = DB::table('part_two_development_expenditure_accounts as a')
                ->select(
                    DB::raw('SUM(a.last_year_budget) as total_last_year_budget'),
                    DB::raw('SUM(a.current_year_budget) as total_current_year_budget'),
                    DB::raw('SUM(a.next_year_budget) as total_next_year_budget'),
                    DB::raw('SUM(a.current_year_actual_income) as total_current_year_actual_income'),
                    DB::raw('SUM(a.next_year_actual_income) as total_next_year_actual_income')
                )
                ->where('a.type_id', '=', 4)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->get();


            $data['getPartTwoClosingBalance'] = DB::table('part_two_development_expenditure_accounts as a')
                ->select(
                    DB::raw('SUM(a.last_year_budget) as total_last_year_budget'),
                    DB::raw('SUM(a.current_year_budget) as total_current_year_budget'),
                    DB::raw('SUM(a.next_year_budget) as total_next_year_budget'),
                    DB::raw('SUM(a.current_year_actual_income) as total_current_year_actual_income'),
                    DB::raw('SUM(a.next_year_actual_income) as total_next_year_actual_income')
                )
                ->where('a.type_id', '=', 4)
                ->where('a.subcategory_id', '=', 288)
                ->where('a.user_id', '=', $user_id)
                ->where('a.union_id', '=', $union_id)
                ->where('a.financial_year', '=', $financial_year)
                ->distinct()
                ->get();

            //End part two development income account

            //Generate Financial Year
            $data['makeFinancialYear'] = $this->generateFinancialYearToOtherYears($financial_year);

            return view('frontend.form_kha.report.summary_report', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function generateFinancialYearToOtherYears($financial_year)
    {
        $split = explode("-", $financial_year);
        $zeroIndex = $split[0];
        $oneIndex = $split[1];

        //Make last/previous year
        $lastYearZeroIndex = $zeroIndex - 1;
        $lastYearOneIndex = $oneIndex - 1;
        $previousYear =  $lastYearZeroIndex . '-' . $lastYearOneIndex;

        //Make next year
        $nextYearZeroIndex = $zeroIndex + 1;
        $nextYearOneIndex = $oneIndex + 1;
        $nextYear = $nextYearZeroIndex . '-' . $nextYearOneIndex;

        $data = [
            'currentYear' => $financial_year,
            'previousYear' => $previousYear,
            'nextYear' => $nextYear,
        ];

        return $data;
    }
}
