<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = DB::table('districts')
            ->join('divisions', 'districts.division_id', '=', 'divisions.id')
            ->select('districts.name', 'divisions.name as division_name')
            ->get();

        return view('admin.district.index', compact('districts'));
    }

    public function create(Request $request)
    {
        $divisions = DB::table('divisions')->get();

        return view('admin.district.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'division_name' => 'required',
            'name' => 'required|unique:districts'
        ]);

        $districts = new District();
        $districts->division_id = $request->division_name;
        $districts->name = $request->name;

        if ($districts->save()) {
            return redirect()->route('district.index')->with('success', 'District created successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
