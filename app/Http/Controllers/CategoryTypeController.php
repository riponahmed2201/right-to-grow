<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryTypeController extends Controller
{
    public function index(Request $request)
    {
        $category_types = DB::table('category_types')->get();

        return view('admin.category_type.index', compact('category_types'));
    }
}
