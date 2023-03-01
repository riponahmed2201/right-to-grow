<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackingReportController extends Controller
{
    public function viewDevelopmentExpenseBudgetTracking()
    {
        try {
            $data['unions'] = DB::table('unions')->get();
            $data['financialYearList'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();

            return view('frontend.trackingReport.development_expense_budget_report', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDevelopmentExpenseBudgetTracking(Request $request)
    {
        try {

            $financial_year = $request->financial_year;
            $union_id = $request->union_name;

            $development_expense_budget = DB::select("SELECT b.name AS expense_category_name, a.current_year_budget FROM `development_expense_budgets` AS a 
            LEFT JOIN `development_expense_categories` AS b ON a.expense_category_id = b.id WHERE a.financial_year = '" . $financial_year . "' AND a.union_id = " . $union_id);
            // dd($development_expense_budget);
            //Start Chart Data 
            $output_array = "";

            foreach ($development_expense_budget as $value) {
                $output_array .= "['$value->expense_category_name', " . $value->current_year_budget . "],";
            }

            $output_array = rtrim($output_array, ",");
            // //End Chart Data

            return view('frontend.trackingReport.get_development_expense_budget_report', compact('output_array'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
