<?php

namespace App\Http\Controllers;

use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnionController extends Controller
{
    public function index()
    {
        $unions = DB::table('unions')
            ->join('upazilas', 'unions.upazila_id', '=', 'upazilas.id')
            ->join('districts', 'upazilas.district_id', '=', 'districts.id')
            ->join('divisions', 'districts.division_id', '=', 'divisions.id')
            ->select('unions.name', 'upazilas.name as upazila_name', 'districts.name as district_name', 'divisions.name as division_name')
            ->get();

        return view('admin.union.index', compact('unions'));
    }

    public function create(Request $request)
    {
        $upazilas = DB::table('upazilas')->get();

        return view('admin.union.create', compact('upazilas'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'upazila_name' => 'required',
            'name' => 'required|unique:unions'
        ]);

        $unions = new Union();
        $unions->upazila_id = $request->upazila_name;
        $unions->name = $request->name;

        if ($unions->save()) {
            return redirect()->route('district.index')->with('success', 'Union create successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
