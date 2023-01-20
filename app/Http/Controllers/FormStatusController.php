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

    public function formKhaViewDetials($user_id, $union_id, $financial_year)
    {
        try {

            $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, a.union_id,  c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
            LEFT JOIN `users` AS b ON a.user_id = b.id
            LEFT JOIN `divisions` AS c ON b.division_id = c.id
            LEFT JOIN `districts` AS d ON b.district_id = d.id
            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                        `part_one_revenue_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "'  AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_one_revenue_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");


            $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            return view('admin.form_kha.view_details', $data);
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

    public function declinedFormKhaData($id)
    {
        try {

            $approvedData =  DB::table('form_kha_data_users_info')->where('id', '=', $id)->update(['approved_status' => 6]);

            return back()->with('success', 'Form Kha data declined successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something error found, Please try again');
        }
    }
}
