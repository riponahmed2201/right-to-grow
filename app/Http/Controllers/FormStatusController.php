<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormStatusController extends Controller
{
    public function getAllFormKhaData()
    {
        try {

            $getAllFormKhaList = DB::select('SELECT b.*, a.*, a.id as form_kha_id, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name, f.id as union_id FROM `form_kha_data_users_info` AS a
                                            LEFT JOIN `users` AS b ON a.user_id = b.id
                                            LEFT JOIN `divisions` AS c ON b.division_id = c.id
                                            LEFT JOIN `districts` AS d ON b.district_id = d.id
                                            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
                                            LEFT JOIN `unions` AS f ON b.union_id = f.id');

            return view('admin.form_kha.index', compact('getAllFormKhaList'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function approvedFormKhaData($id)
    {
        try {

            $approvedData =  DB::table('form_kha_data_users_info')->where('id', '=', $id)->update(['approved_status' => 5]);

            return back()->with('success', 'Form Kha data approved successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something error found, Please try again');
        }
    }
}
