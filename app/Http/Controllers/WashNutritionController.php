<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WashNutritionController extends Controller
{
    public function index()
    {
        $wash_nutritions = DB::table('wash_nutritions as a')
            ->leftjoin('categories as b', 'a.category_id', '=', 'b.id')
            ->leftjoin('subcategories as c', 'a.subcategory_id', '=', 'c.id')
            ->leftjoin('unions as d', 'a.union_id', '=', 'd.id')
            ->select('a.*', 'b.name as category_name', 'c.name as subcategory_name', 'd.name as union_name')
            ->get();

        return view('admin.wash_and_nutrition_budget.index', compact('wash_nutritions'));
    }

    public function create()
    {
        $data['categories'] = DB::table('categories')->get();
        $data['unions'] = DB::table('unions')->get();
        $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();

        return view('admin.wash_and_nutrition_budget.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'financial_year_name' => 'required',
                'union_name' => 'required',
                'category_name' => 'required',
                'subcategory_name' => 'required',
                'total_budget' => 'required'
            ]);

            $expense_budget = $request->expense_budget ? $request->expense_budget : 0;

            $data = DB::table('wash_nutritions')->insert([
                'financial_year_name' => $request->financial_year_name,
                'union_id' => $request->union_name,
                'category_id' => $request->category_name,
                'subcategory_id' => $request->subcategory_name,
                'total_budget' => $request->total_budget,
                'expense_budget' => $expense_budget,
                'remaining_budget' => $request->total_budget - $expense_budget
            ]);

            if ($data) {
                return back()->with('success', 'Health and nutrition budget created successfully!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            return back()->with('error', 'Something error found. Please try again');
        }
    }

    public function healthNutritionSubcategorySelectData(Request $request)
    {

        $subcategories = DB::table('subcategories')->where('category_id', $request->category_name)->get();

        return response()->json($subcategories);
    }
}
