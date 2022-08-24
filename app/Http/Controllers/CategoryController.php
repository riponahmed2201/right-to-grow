<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')
            ->join('category_types', 'categories.category_type_id', '=', 'category_types.id')
            ->select('categories.name', 'categories.slug', 'category_types.name as type')
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $category_types = DB::table('category_types')->get();

        return view('admin.category.create', compact('category_types'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'name' => 'required|unique:categories'
        ]);

        $categories = new Category();
        $categories->category_type_id = $request->type;
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);

        if ($categories->save()) {
            return redirect()->route('category.index')->with('success', 'Category created successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
