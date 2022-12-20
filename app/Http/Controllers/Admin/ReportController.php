<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //From Financial to To Financial Year and From Union Name to To Union Name comparison report
    public function unionComparisonReport()
    {
        try {

            $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
            $data['unions'] = DB::table('unions')->get();
            $data['categories'] = DB::table('categories')->get();

            return view('admin.report.comparisonReport', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function washAndNutritionReport()
    {
        $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
        $data['unions'] = DB::table('unions')->get();

        return view('admin.report.washAndNutritionReport', $data);
    }

    public function getWashAndNutritionReportData(Request $request)
    {
        try {

            $this->validate($request, [
                'union_name' => 'required',
                'financial_year_name' => 'required',
            ]);

            // $wash_nutritions = DB::table('wash_nutritions')->where('union_id', '=', $request->union_name)->where('financial_year_name', '=', $request->financial_year_name)->get();

            // $wash_nutrition_data = DB::table('wash_nutritions as a')
            //     ->leftjoin('categories as b', 'a.category_id', '=', 'b.id')
            //     ->leftjoin('subcategories as c', 'a.subcategory_id', '=', 'c.id')
            //     ->leftjoin('unions as d', 'a.union_id', '=', 'd.id')
            //     ->select('a.*', 'b.name as category_name', 'c.name as subcategory_name', 'd.name as union_name')
            //     ->where('a.union_id', '=', $request->union_name)->where('financial_year_name', '=', $request->financial_year_name)
            //     ->get();

            // $washArray = json_decode(json_encode($wash_nutrition_data), true);

            // $wash_nutritions = [];
            // foreach ($washArray  as $value) {
            //     $wash_nutritions[$value['category_name']][] = $value;
            // }

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


            return view('admin.report.show_wash_nutrition_data', $data);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
        }
    }
}
