<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.name as subcategory_name', 'subcategories.id as subcategory_id', 'subcategories.slug', 'categories.name as category_name')
            ->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.subcategory.form', compact('categories'));
    }

    public function edit($subcategory_id)
    {
        $data['categories'] = DB::table('categories')->get();
        $data['subcategory'] = DB::table('subcategories')->where('id', '=', $subcategory_id)->first();

        return view('admin.subcategory.form', $data);
    }

    public function store(Request $request)
    {
        // validate the sub category request input
        $this->validate($request, [
            'category_name' => 'required',
            'name' => 'required'
        ]);

        $subcategoryAlreadyIsNotExists = Subcategory::where('category_id', '=', $request->category_name)->where('name', '=', $request->name)->first();

        if ($subcategoryAlreadyIsNotExists) {
            return back()->with('error', 'Subcategory already exists.');
        }

        try {

            $subcategory = new Subcategory();
            $subcategory->category_id = $request->category_name;
            $subcategory->name = $request->name;
            $subcategory->slug = $this->banglaSlugGenerator($request->name);

            if ($subcategory->save()) {
                return redirect()->route('subcategory.index')->with('success', 'Subcategory created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    public function update(Request $request, $subcategory_id)
    {
        // validate the sub category request input
        $this->validate($request, [
            'category_name' => 'required',
            'name' => 'required'
        ]);

        try {

            $subcategory = Subcategory::findOrFail($subcategory_id);
            $subcategory->category_id = $request->category_name;
            $subcategory->name = $request->name;
            $subcategory->slug = $this->banglaSlugGenerator($request->name);

            if ($subcategory->save()) {
                return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully!');
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
