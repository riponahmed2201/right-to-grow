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
}
