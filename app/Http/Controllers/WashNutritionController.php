<?php

namespace App\Http\Controllers;

use App\Models\WashAndNutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class WashNutritionController extends Controller
{
    public function index()
    {
        $wash_nutritions = DB::table('wash_nutritions as a')
            ->leftjoin('categories as b', 'a.category_id', '=', 'b.id')
            ->leftjoin('subcategories as c', 'a.subcategory_id', '=', 'c.id')
            ->leftjoin('unions as d', 'a.union_id', '=', 'd.id')
            ->select('a.*', 'a.id as wash_nutrition_id', 'b.name as category_name', 'c.name as subcategory_name', 'd.name as union_name')
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

            $budget_already_is_not_exists = DB::table('wash_nutritions')->where('financial_year_name', '=', $request->financial_year_name)
                ->where('union_id', '=', $request->union_name)
                ->where('subcategory_id', '=', $request->subcategory_name)->first();

            if ($budget_already_is_not_exists) {
                return back()->with('error', 'Already exists');
            }

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

    public function edit($id)
    {
        $data['categories'] = DB::table('categories')->get();
        $data['unions'] = DB::table('unions')->get();
        $data['financialYears'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
        $data['wash_nutrition'] = DB::table('wash_nutritions as a')->where('id', '=', $id)->first();

        return view('admin.wash_and_nutrition_budget.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'financial_year_name' => 'required',
                'union_name' => 'required',
                'category_name' => 'required',
                'subcategory_name' => 'required',
                'total_budget' => 'required'
            ]);

            $budget_already_is_not_exists = DB::table('wash_nutritions')
                ->whereNotIn('id', [$id])
                ->where('financial_year_name', '=', $request->financial_year_name)
                ->where('union_id', '=', $request->union_name)
                ->where('subcategory_id', '=', $request->subcategory_name)->first();

            if ($budget_already_is_not_exists) {
                return back()->with('error', 'Already exists');
            }

            $expense_budget = $request->expense_budget ? $request->expense_budget : 0;

            // $data = DB::table('wash_nutritions')->where('id', $id)->update([
            //     'financial_year_name' => $request->financial_year_name,
            //     'union_id' => $request->union_name,
            //     'category_id' => $request->category_name,
            //     'subcategory_id' => $request->subcategory_name,
            //     'total_budget' => $request->total_budget,
            //     'expense_budget' => $expense_budget,
            //     'remaining_budget' => $request->total_budget - $expense_budget
            // ]);

            $data = WashAndNutrition::findOrFail($id);
            $data->financial_year_name = $request->financial_year_name;
            $data->union_id = $request->union_name;
            $data->category_id = $request->category_name;
            $data->subcategory_id = $request->subcategory_name;
            $data->total_budget = $request->total_budget;
            $data->expense_budget = $request->expense_budget;
            $data->remaining_budget = $request->total_budget - $expense_budget;

            if ($data->save()) {
                return redirect()->route('wash_and_nutrition.index')->with('success', 'Health and nutrition budget updated successfully!');
            } else {
                return back()->with('error', 'Something error found. Please try again');
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
