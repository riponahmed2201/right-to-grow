<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevelopmentExpenseCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('development_expense_categories')->get();

        return view('admin.development_expense_category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        return view('admin.development_expense_category.form');
    }

    public function edit($category_id)
    {
        $expense_categories = DB::table('development_expense_categories')->where('id', '=', $category_id)->first();

        return view('admin.development_expense_category.form', compact('expense_categories'));
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {

            $category = new DevelopmentExpenseCategory();
            $category->name = $request->name;

            if ($category->save()) {
                return redirect()->route('development.expense.category.index')->with('success', 'Development expense category created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    public function update(Request $request, $category_id)
    {
        // validate the request input
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {

            $category = DevelopmentExpenseCategory::findOrFail($category_id);
            $category->name = $request->name;

            if ($category->save()) {
                return redirect()->route('development.expense.category.index')->with('success', 'Development expense category updated successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
