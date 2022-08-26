<?php

namespace App\Http\Controllers;

use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParentCategoryController extends Controller
{
    public function index()
    {
        $parentCategoryList = DB::table('parent_categories')
            ->join('category_titles', 'parent_categories.category_title_id', '=', 'category_titles.id')
            ->select('parent_categories.parent_category_name', 'parent_categories.slug', 'category_titles.category_title as category_title')
            ->get();

        return view('admin.parent_category.index', compact('parentCategoryList'));
    }

    public function create()
    {
        $categoryList = DB::table('category_titles')->get();

        return view('admin.parent_category.create', compact('categoryList'));
    }

    public function store(Request $request)
    {
        // validate the parent category request input
        $this->validate($request, [
            'category_title' => 'required',
            'parent_category_name' => 'required|unique:parent_categories'
        ]);

        try {

            $parentCategories = new ParentCategory();
            $parentCategories->category_title_id = $request->category_title;
            $parentCategories->parent_category_name = $request->parent_category_name;
            $parentCategories->slug = Str::slug($request->parent_category_name);

            if ($parentCategories->save()) {
                return redirect()->route('parentCategory.index')->with('success', 'Parent category created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
