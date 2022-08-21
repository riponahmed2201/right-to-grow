<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = DB::table('divisions')->get();

        return view('admin.division.index', compact('divisions'));
    }

    public function create(Request $request)
    {
        return view('admin.division.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:divisions'
        ]);

        $divisions = new Division();
        $divisions->name = $request->name;

        if ($divisions->save()) {
            return redirect()->route('district.index')->with('success', 'Division create successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
