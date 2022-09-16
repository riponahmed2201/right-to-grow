<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function index(Request $request)
    {
        $types = DB::table('types')->get();

        return view('admin.type.index', compact('types'));
    }

    public function create()
    {
        return view('admin.type.form');
    }

    public function store(Request $request)
    {
        // validate the request input
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {

            $types = new Type();
            $types->name = $request->name;
            $types->slug = $this->banglaSlugGenerator($request->name);

            if ($types->save()) {
                return redirect()->route('type.index')->with('success', 'Type created successfully!');
            } else {
                return back()->with('error', 'Something Error Found! Please try again.');
            }
        } catch (\Exception $exception) {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }

    public function edit($type_id)
    {
        $typeInfo = Type::findOrFail($type_id);

        return view('admin.type.form', compact('typeInfo'));
    }
    public function update(Request $request, $type_id)
    {
        // validate the request input
        $this->validate($request, [
            'name' => 'required'
        ]);

        try {

            $typeInfo = Type::findOrFail($type_id);

            if (!$typeInfo) {
                return back()->with('error', 'Invalid type');
            }

            $type = Type::findOrFail($type_id);
            $isChanged = false;

            if ($request->name && $typeInfo->name !== $request->name) {
                $isChanged = true;

                $type->name = $request->name;
                $type->slug = $this->banglaSlugGenerator($request->name);
            }

            if ($isChanged) {
                $type->save();
            }

            return redirect()->route('type.index')->with('success', 'Type updated successfully!');
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
