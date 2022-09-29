<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public static function index()
    {
        $data['totalCategory'] = DB::table('categories')->count();
        $data['totalsubcategory'] = DB::table('subcategories')->count();
        $data['totalUnion'] = DB::table('unions')->count();
        $data['totalUpazila'] = DB::table('upazilas')->count();

        return view('admin.dashboard', $data);
    }
}
