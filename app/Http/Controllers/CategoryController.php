<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();

        $categories = DB::table('categories')
            ->join('category_types', 'categories.category_type_id', '=', 'category_types.id')
            ->select('categories.name', 'category_types.name as type')
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

        $categories = new Category();
        $categories->category_type_id = $request->type;
        $categories->name = $request->name;
        $categories->save();

        return back();
    }
}
