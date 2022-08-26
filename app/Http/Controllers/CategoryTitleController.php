<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTitleController extends Controller
{
    public function index()
    {
        $categoryTitleList = DB::table('category_titles')
            ->join('category_types', 'category_titles.category_type_id', '=', 'category_types.id')
            ->select('category_titles.category_title', 'category_titles.slug', 'category_types.name as type')
            ->get();

        return view('admin.category_title.index', compact('categoryTitleList'));
    }

    public function create(Request $request)
    {
        $category_types = DB::table('category_types')->get();

        return view('admin.category_title.create', compact('category_types'));
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'category_type' => 'required',
            'category_title' => 'required|unique:category_titles'
        ]);

        try {

            $categoryTitles = new CategoryTitle();
            $categoryTitles->category_type_id = $request->category_type;
            $categoryTitles->category_title = $request->category_title;
            $categoryTitles->slug = Str::slug($request->category_title);

            if ($categoryTitles->save()) {
                return redirect()->route('categoryTitle.index')->with('success', 'Category title created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }

        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
