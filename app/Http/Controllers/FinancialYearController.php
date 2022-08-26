<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FinancialYearController extends Controller
{
    public function index()
    {
        $financialYearList = DB::table('financial_years')->get();

        return view('admin.financial_year.index', compact('financialYearList'));
    }

    public function create()
    {
        return view('admin.financial_year.form');
    }

    public function edit($financial_year_id)
    {
        $financialYear = DB::table('financial_years')->where('','=',$financial_year_id)->first();

        return view('admin.financial_year.form', compact('financialYear'));
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'financial_year_name' => 'required'
        ]);

        try {

            $financialYears = new FinancialYear();
            $financialYears->year_name = $request->financial_year_name;
            $financialYears->slug = Str::slug($request->financial_year_name);

            if ($financialYears->save()) {
                return redirect()->route('financialYear.index')->with('success', 'Financial year created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            dd($exception);
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
