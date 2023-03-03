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

            $data['output_array'] = rtrim($output_array, ",");
            // //End Chart Data

            $unionName = DB::table('unions')->where('id', '=', $union_id)->first()->name;

            $data['financial_year'] = $financial_year;
            $data['unionName'] = $unionName;

            return view('frontend.trackingReport.get_development_expense_budget_report', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //From Financial to To Financial Year and From Union Name to To Union Name health comparison report
    public function viewHealthComparisonTracking(Request $request)
    {
        try {

            $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();

            $data['unions'] = DB::table('unions')->get();
            $data['categories'] = DB::table('categories')->get();

            return view('frontend.report.filterHealthComparison', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //From Financial to To Financial Year and From Union Name to To Union Name health comparison report
    public function getHealthComparisonTracking(Request $request)
    {
        try {

            $from = $request->from_financial_year;
            $to = $request->to_financial_year;
            $union_id = $request->union_name;

            // $wash_nutritions = DB::select("SELECT * FROM `wash_nutritions` WHERE `financial_year_name` BETWEEN '" . $from . "' AND '" . $to . "' AND `union_id` = " . $union_id);

            $wash_nutritions = DB::select("select financial_year_name, sum(t.total_budget) as total_budget, sum(t.expense_budget) as expense_budget, sum(t.remaining_budget) as remaining_budget
            from(
            SELECT * FROM `wash_nutritions` AS wn
                        WHERE (wn.financial_year_name BETWEEN '" . $from . "' AND '" . $to . "') AND union_id = " . $union_id . ") as t
                            group by t.financial_year_name");

            //Start Chart Data 
            $output_array = "";

            foreach ($wash_nutritions as $value) {
                if ($value) {
                    $output_array .= "['$value->financial_year_name', $value->total_budget, $value->expense_budget, $value->remaining_budget],";
                } else {
                    $output_array .=  "['2014', 1000, 400, 200]";
                }
            }

            $output_array = rtrim($output_array, ",");
            //End Chart Data

            return view('frontend.report.healthComparisonReport', compact('output_array'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function viewWashAndNutritionTracking()
    {
        $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
        $data['unions'] = DB::table('unions')->get();

        return view('frontend.report.washAndNutritionReport', $data);
    }

    public function getWashAndNutritionTracking(Request $request)
    {
        try {

            $this->validate($request, [
                'union_name' => 'required',
                'financial_year_name' => 'required',
            ]);

            $data['wash_data'] = DB::table('wash_nutritions as a')
                ->leftjoin('subcategories as c', 'a.subcategory_id', '=', 'c.id')
                ->leftjoin('unions as d', 'a.union_id', '=', 'd.id')
                ->select(
                    'a.total_budget as total_budget',
                    'a.expense_budget as expense_budget',
                    'a.remaining_budget as remaining_budget',
                    'a.financial_year_name as financial_year_name',
                    'c.name as subcategory_name',
                    'd.name as union_name'
                )
                ->where('a.union_id', '=', $request->union_name)->where('financial_year_name', '=', $request->financial_year_name)
                ->where('a.category_id', '=', 20)
                ->get();

            $data['nutrition_data'] = DB::table('wash_nutritions as a')
                ->leftjoin('subcategories as c', 'a.subcategory_id', '=', 'c.id')
                ->leftjoin('unions as d', 'a.union_id', '=', 'd.id')
                ->select(
                    'a.total_budget as total_budget',
                    'a.expense_budget as expense_budget',
                    'a.remaining_budget as remaining_budget',
                    'a.financial_year_name as financial_year_name',
                    'c.name as subcategory_name',
                    'd.name as union_name'
                )
                ->where('a.union_id', '=', $request->union_name)->where('financial_year_name', '=', $request->financial_year_name)
                ->where('a.category_id', '=', 21)
                ->get();

            //Start Total wash Budget
            $total_wash_budget = 0;
            foreach ($data['wash_data'] as  $wash_value) {
                $total_wash_budget += $wash_value->total_budget;
            }
            //End Total wash Budget

            //Start Total Nutrition Budget
            $total_nutrition_budget = 0;
            foreach ($data['nutrition_data'] as  $nutrition_value) {
                $total_nutrition_budget += $nutrition_value->total_budget;
            }
            //End Total Nutrition Budget

            //Start Chart Data 
            $data['output_array'] = "";

            $data['output_array'] .= "['Total Wash Budget', " . $total_wash_budget . "],";
            $data['output_array'] .= "['Total Nutrition Budget', " . $total_nutrition_budget . "],";
            // $data['output_array'] .= "['Total Health Budget', " . $total_wash_budget + $total_nutrition_budget . "],";

            $data['output_array'] = rtrim($data['output_array'], ",");
            //End Chart Data

            $data['union_name'] = DB::table('unions')->where('id', '=', $request->union_name)->first()->name;

            $data['financial_year_name'] = $request->financial_year_name;

            return view('frontend.report.show_wash_nutrition_data', $data);
        } catch (\Throwable $th) {
            dd($th);
            throw $th;
        }
    }
}
