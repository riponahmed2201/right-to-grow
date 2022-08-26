<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTypeController extends Controller
{
    public function index(Request $request)
    {
        $category_types = DB::table('category_types')->get();

        return view('admin.category_type.index', compact('category_types'));
    }

    public function create()
    {
        return view('admin.category_type.form');
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {

            $categoryTypes = new CategoryType();
            $categoryTypes->name = $request->name;
            $categoryTypes->slug = Str::slug($request->name);

            if ($categoryTypes->save()) {
                return redirect()->route('categoryType.index')->with('success', 'Category type created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
