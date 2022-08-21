<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpazilaController extends Controller
{
    public function index()
    {
//        $upazilas = DB::table('upazilas')->get();

        $upazilas = DB::table('upazilas')
            ->join('districts', 'upazilas.district_id', '=', 'districts.id')
            ->join('divisions', 'districts.division_id', '=', 'divisions.id')
            ->select('upazilas.name as upazila_name', 'districts.name as district_name', 'divisions.name as division_name')
            ->get();

        return view('admin.upazila.index', compact('upazilas'));
    }

    public function create(Request $request)
    {
        $districts = DB::table('districts')->get();

        return view('admin.upazila.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'district_name' => 'required',
            'name' => 'required|unique:upazilas'
        ]);

        $upazilas = new Upazila();
        $upazilas->district_id = $request->district_name;
        $upazilas->name = $request->name;

        if ($upazilas->save()) {
            return redirect()->route('district.index')->with('success', 'Upazila create successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
