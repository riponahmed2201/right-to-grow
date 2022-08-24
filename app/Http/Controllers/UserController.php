<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        $data['divisions'] = DB::table('divisions')->get();
        $data['districts'] = DB::table('districts')->get();
        $data['upazilas'] = DB::table('upazilas')->get();
        $data['unions'] = DB::table('unions')->get();

        return view('admin.user.create', $data);
    }

    public function index()
    {
//        $users = DB::table('users')->get();
        $users = DB::select('SELECT a.name AS user_name, a.email, a.designation, a.phone, a.photo,
                                    b.name AS division_name, c.name AS district_name, d.name AS upazila_name, e.name AS union_name FROM users AS a
                                    LEFT JOIN divisions AS b ON a.division_id = b.id
                                    LEFT JOIN districts AS c ON a.district_id = c.id
                                    LEFT JOIN upazilas AS d ON a.upazila_id = d.id
                                    LEFT JOIN unions AS e ON a.union_id = e.id');

        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'designation' => 'required',
            'division_name' => 'required',
            'district_name' => 'required',
            'upazila_name' => 'required',
            'union_name' => 'required',
        ]);

        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->designation = $request->designation;
        $users->password = Hash::make($request->password);
        $users->division_id = $request->division_name;
        $users->district_id = $request->district_name;
        $users->upazila_id = $request->upazila_name;
        $users->union_id = $request->union_name;
        $users->photo = $request->name;
        $users->role = 'user';
        $users->role_id = 1;
//dd($users);
        if ($users->save()) {
            return redirect()->route('user.index')->with('success', 'User created successfully!');
        } else {
            return back()->with('error', 'Something Error Found! Please try again.');
        }
    }
}
