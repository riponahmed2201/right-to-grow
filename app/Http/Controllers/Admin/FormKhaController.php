<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
    public function getAllKhaFormData()
    {
        try {

            $userInfo = DB::select('SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
                                            LEFT JOIN `users` AS b ON a.user_id = b.id
                                            LEFT JOIN `divisions` AS c ON b.division_id = c.id
                                            LEFT JOIN `districts` AS d ON b.district_id = d.id
                                            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
                                            LEFT JOIN `unions` AS f ON b.union_id = f.id');


            return view('frontend.form_kha.get-all-kha-form-data', compact('userInfo'));

        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
