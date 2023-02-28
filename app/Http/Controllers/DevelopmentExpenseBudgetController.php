<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentExpenseBudget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevelopmentExpenseBudgetController extends Controller
{
    public function index()
    {
        $budgets = DB::table('development_expense_budgets')
            ->join('unions', 'development_expense_budgets.union_id', '=', 'unions.id')
            ->join('development_expense_categories', 'development_expense_budgets.expense_category_id', '=', 'development_expense_categories.id')
            ->select('unions.name as union_name', 'development_expense_budgets.financial_year', 'development_expense_budgets.current_year_budget', 'development_expense_budgets.id as budget_id', 'development_expense_categories.name as expense_category_name')
            ->get();

        return view('admin.development_expense_budget.index', compact('budgets'));
    }

    public function create(Request $request)
    {
        $data['financialYearList'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
        $data['expense_categories'] = DB::table('development_expense_categories')->get();
        $data['unions'] = DB::table('unions')->get();

        return view('admin.development_expense_budget.form', $data);
    }

    public function edit($budget_id)
    {
        $data['budget'] = DB::table('development_expense_budgets')->where('id', '=', $budget_id)->first();
        $data['expense_categories'] = DB::table('development_expense_categories')->get();
        $data['financialYearList'] = DB::table('financial_years')->orderBy('slug', 'desc')->get();
        $data['unions'] = DB::table('unions')->get();

        return view('admin.development_expense_budget.form', $data);
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'financial_year' => 'required',
            'expense_category' => 'required',
            'current_year_budget' => 'required',
            'union_name' => 'required',
        ]);

        try {

            $budget = new DevelopmentExpenseBudget();
            $budget->financial_year = $request->financial_year;
            $budget->expense_category_id = $request->expense_category;
            $budget->current_year_budget = $request->current_year_budget;
            $budget->union_id = $request->union_name;

            if ($budget->save()) {
                return redirect()->route('development.expense.budget.index')->with('success', 'Development expense budget created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    public function update(Request $request, $budget_id)
    {
        dd($request->all());

        // validate the request input
        $this->validate($request, [
            'financial_year' => 'required',
            'expense_category' => 'required',
            'current_year_budget' => 'required',
            'union_name' => 'required',
        ]);

        try {

            $budget = DevelopmentExpenseBudget::findOrFail($budget_id);
            $budget->financial_year = $request->financial_year;
            $budget->expense_category_id = $request->expense_category;
            $budget->current_year_budget = $request->current_year_budget;
            $budget->union_id = $request->union_name;

            if ($budget->save()) {
                return redirect()->route('development.expense.budget.index')->with('success', 'Development expense budget updated successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            dd($exception);
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
