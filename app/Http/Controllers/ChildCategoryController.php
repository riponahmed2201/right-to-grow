<?php

namespace App\Http\Controllers;

use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    public function index()
    {
        $childCategoryList = DB::table('child_categories')
            ->join('parent_categories', 'child_categories.parent_category_id', '=', 'parent_categories.id')
            ->select('child_categories.child_category_name', 'child_categories.id as child_category_id', 'child_categories.slug', 'parent_categories.parent_category_name')
            ->get();

        return view('admin.child_category.index', compact('childCategoryList'));
    }

    public function create()
    {
        $parentCategoryList = DB::table('parent_categories')->get();

        return view('admin.child_category.form', compact('parentCategoryList'));
    }

    public function edit($child_category_id)
    {
        $data['childCategory'] = DB::table('child_categories')->where('id',$child_category_id)->first();
        $data['parentCategoryList'] = DB::table('parent_categories')->get();

        return view('admin.child_category.form', $data);
    }

    public function store(Request $request)
    {
        // validate the parent category request input
        $this->validate($request, [
            'parent_category_name' => 'required',
            'child_category_name' => 'required|unique:child_categories'
        ]);

        try {

            $childCategories = new ChildCategory();
            $childCategories->parent_category_id = $request->parent_category_name;
            $childCategories->child_category_name = $request->child_category_name;
            $childCategories->slug = Str::slug($request->child_category_name);

            if ($childCategories->save()) {
                return redirect()->route('childCategory.index')->with('success', 'Child category created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    public function update(Request $request, $child_category_id)
    {
        // validate the parent category request input
        $this->validate($request, [
            'parent_category_name' => 'required',
            'child_category_name' => 'required|unique:child_categories'
        ]);

        try {

            $childCategories = ChildCategory::findOrFail($child_category_id);
            $childCategories->parent_category_id = $request->parent_category_name;
            $childCategories->child_category_name = $request->child_category_name;
            $childCategories->slug = Str::slug($request->child_category_name);

            if ($childCategories->save()) {
                return redirect()->route('childCategory.index')->with('success', 'Child category updated successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
