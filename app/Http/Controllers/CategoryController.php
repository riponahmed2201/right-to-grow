<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->join('types', 'categories.type_id', '=', 'types.id')
            ->select('categories.name', 'categories.slug', 'categories.id as category_id', 'types.name as type')
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $types = DB::table('types')->get();

        return view('admin.category.form', compact('types'));
    }

    public function edit($category_id)
    {
        $data['types'] = DB::table('types')->get();
        $data['category'] = DB::table('categories')->where('id', '=', $category_id)->first();

        return view('admin.category.form', $data);
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required'
        ]);

        $categoryAlreadyIsNotExists = Category::where('type_id', '=', $request->type)->where('name', '=', $request->name)->first();

        if ($categoryAlreadyIsNotExists) {
            return back()->with('error', 'Category already exists.');
        }

        try {

            $category = new Category();
            $category->type_id = $request->type;
            $category->name = $request->name;
            $category->slug = $this->banglaSlugGenerator($request->name);

            if ($category->save()) {
                return redirect()->route('category.index')->with('success', 'Category created successfully!');
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
            'type' => 'required',
            'name' => 'required'
        ]);

        try {

            $category = Category::findOrFail($category_id);
            $category->type_id = $request->type;
            $category->name = $request->name;
            $category->slug = $this->banglaSlugGenerator($request->name);

            if ($category->save()) {
                return redirect()->route('category.index')->with('success', 'Category updated successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    //make bangla unicode slug generator
    public function banglaSlugGenerator($string, $delimiter = '-')
    {
        $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
        $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);

        return $string;
    }
}
