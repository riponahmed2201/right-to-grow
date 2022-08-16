<?php

namespace App\Http\Controllers;

use App\Models\CategoryHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryHeadController extends Controller
{
   public function index()
   {
       $category_heads = DB::table('category_heads')
           ->join('categories', 'category_heads.category_id', '=', 'categories.id')
           ->select('category_heads.name', 'categories.name as category_name')
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
        $categoryHeads = new CategoryHead();
        $categoryHeads->category_id = $request->category_name;
        $categoryHeads->name = $request->name;
        $categoryHeads->save();
        return back();
    }
}
