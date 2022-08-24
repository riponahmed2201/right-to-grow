<?php

namespace App\Http\Controllers;

use App\Models\CategoryHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryHeadController extends Controller
{
   public function index()
   {
       $category_heads = DB::table('category_heads')
           ->join('categories', 'category_heads.category_id', '=', 'categories.id')
           ->select('category_heads.name', 'category_heads.slug', 'categories.name as category_name')
           ->get();

        return view('admin.category_head.index', compact('category_heads'));
   }

    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.category_head.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
            'name' => 'required|unique:category_heads'
        ]);

        $categoryHeads = new CategoryHead();
        $categoryHeads->category_id = $request->category_name;
        $categoryHeads->name = $request->name;
        $categoryHeads->slug = Str::slug($request->name);

        if ($categoryHeads->save()) {
            return redirect()->route('category.head.index')->with('success', 'Category head created successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
