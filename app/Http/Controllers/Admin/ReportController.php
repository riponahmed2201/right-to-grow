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

            $data['financialYears'] = DB::table('financial_years')->get();
            $data['unions'] = DB::table('unions')->get();
            $data['categories'] = DB::table('categories')->get();

            return view('admin.report.comparisonReport', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function washAndNutritionReport()
    {
        $data['financialYears'] = DB::table('financial_years')->get();
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

            $wash_nutritions = DB::table('wash_nutritions')->where('union_id', '=', $request->union_name)->where('financial_year_name', '=', $request->financial_year_name)->get();

           return view('admin.report.show_wash_nutrition_data', compact('wash_nutritions'));
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
        }
    }
}
