<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
    public function showFormKha()
    {
        try {

            //START PART ONE CATEGORY AND SUBCATEGORY
            $getPartOneDataFromDatabase = DB::table('subcategories as b')
                ->leftjoin('categories as a', 'a.id', '=', 'b.category_id')
                ->select('a.id as category_id', 'a.type_id as type_id', 'a.name as category_name',  'b.id as subcategory_id', 'b.name as subcategory_name')
                ->where('type_id', '=', 1)
                ->get();

            $partOneToArray = json_decode(json_encode($getPartOneDataFromDatabase), true);

            $partOneDataFormat = [];

            foreach ($partOneToArray  as $partOneValue) {
                $partOneDataFormat[$partOneValue['category_name']][] = $partOneValue;
            }
            //END PART ONE CATEGORY AND SUBCATEGORY

            //START PART TWO CATEGORY AND SUBCATEGORY
            $getPartTwoDataFromDatabase = DB::table('subcategories as b')
                ->leftjoin('categories as a', 'a.id', '=', 'b.category_id')
                ->select('a.id as category_id', 'a.type_id as type_id', 'a.name as category_name',  'b.id as subcategory_id', 'b.name as subcategory_name')
                ->where('type_id', '=', 2)
                ->get();

            $partTwoToArray = json_decode(json_encode($getPartTwoDataFromDatabase), true);

            $partTwoDataFormat = [];

            foreach ($partTwoToArray  as $partTwoValue) {
                $partTwoDataFormat[$partTwoValue['category_name']][] = $partTwoValue;
            }
            //END PART TWO CATEGORY AND SUBCATEGORY


            //START PART THREE CATEGORY AND SUBCATEGORY
            $getPartThreeDataFromDatabase = DB::table('subcategories as b')
                ->leftjoin('categories as a', 'a.id', '=', 'b.category_id')
                ->select('a.id as category_id', 'a.type_id as type_id', 'a.name as category_name',  'b.id as subcategory_id', 'b.name as subcategory_name')
                ->where('type_id', '=', 3)
                ->get();

            $partThreeToArray = json_decode(json_encode($getPartThreeDataFromDatabase), true);

            $partThreeDataFormat = [];

            foreach ($partThreeToArray  as $partThreeValue) {
                $partThreeDataFormat[$partThreeValue['category_name']][] = $partThreeValue;
            }
            //END PART THREE CATEGORY AND SUBCATEGORY


            //START PART FOUR CATEGORY AND SUBCATEGORY
            $getPartFourDataFromDatabase = DB::table('subcategories as b')
                ->leftjoin('categories as a', 'a.id', '=', 'b.category_id')
                ->select('a.id as category_id', 'a.type_id as type_id', 'a.name as category_name',  'b.id as subcategory_id', 'b.name as subcategory_name')
                ->where('type_id', '=', 4)
                ->get();

            $partFourToArray = json_decode(json_encode($getPartFourDataFromDatabase), true);

            $partFourDataFormat = [];

            foreach ($partFourToArray  as $partFourValue) {
                $partFourDataFormat[$partFourValue['category_name']][] = $partFourValue;
            }
            //END PART FOUR CATEGORY AND SUBCATEGORY

            $financialYearList = DB::table('financial_years')->orderBy('slug', 'desc')->get();

            $dataFormat = [
                'financialYearList' => $financialYearList,
                'partOneDataFormat' => $partOneDataFormat,
                'partTwoDataFormat' => $partTwoDataFormat,
                'partThreeDataFormat' => $partThreeDataFormat,
                'partFourDataFormat' => $partFourDataFormat,
            ];

            return view('frontend.form_kha.show_kha_form', $dataFormat);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function showKhaFormData($user_id, $union_id, $financial_year)
    {

        try {
            $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
            LEFT JOIN `users` AS b ON a.user_id = b.id
            LEFT JOIN `divisions` AS c ON b.division_id = c.id
            LEFT JOIN `districts` AS d ON b.district_id = d.id
            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "'  AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                        `part_one_revenue_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_one_revenue_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");


            $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            return view('frontend.form_kha.show_kha_form_data', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getKhaFormList()
    {
        try {
            $user_id = session('user_id');

            $userInfo = DB::select('SELECT b.*, a.financial_year, a.approved_status as approved_status, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
                                            LEFT JOIN `users` AS b ON a.user_id = b.id
                                            LEFT JOIN `divisions` AS c ON b.division_id = c.id
                                            LEFT JOIN `districts` AS d ON b.district_id = d.id
                                            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
                                            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id=' . $user_id);

            return view('frontend.form_kha.kha-form-list', compact('userInfo'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Get All Data Show public
    public function getAllKhaFormData($union_id)
    {
        try {
            $query = "SELECT b.*, a.financial_year, a.union_id, a.user_id as user_id, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
                    LEFT JOIN `users` AS b ON a.user_id = b.id
                    LEFT JOIN `divisions` AS c ON b.division_id = c.id
                    LEFT JOIN `districts` AS d ON b.district_id = d.id
                    LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
                    LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.union_id=" . $union_id;

            $userInfo = DB::select($query);

            return view('frontend.form_kha.get-all-kha-form-data', compact('userInfo'));
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Union vittik data show
    public function getAllUnionVittikData(Request $request)
    {
        try {

            // $unions = DB::table('unions')
            //     ->join('upazilas', 'unions.upazila_id', '=', 'upazilas.id')
            //     ->join('districts', 'upazilas.district_id', '=', 'districts.id')
            //     ->join('divisions', 'districts.division_id', '=', 'divisions.id')
            //     ->select('unions.id as union_id', 'unions.name', 'upazilas.name as upazila_name', 'districts.name as district_name', 'divisions.name as division_name')
            //     ->get();

            $query = "SELECT a.id AS union_id, a.name AS union_name, b.name AS upazila_name, c.name AS district_name, d.name AS division_name 
                FROM unions AS a
                LEFT JOIN upazilas AS b ON a.upazila_id = b.id
                LEFT JOIN districts AS c ON b.district_id = c.id
                LEFT JOIN divisions AS d ON c.division_id = d.id";

            if ($request->isMethod('post')) {

                $unionName = $request->union_name;

                if ($unionName == '-1') {
                    return back()->with('error', 'Please select union name!');
                } else {
                    $query = $query . " where 1=1 ";

                    if ($unionName != '-1') {
                        $query = $query . " AND a.`id` = '" . $unionName . "'";
                    }

                    $unions = DB::select($query);

                    return view('frontend.form_kha.union-vittik-data', compact('unions'));
                }
            } else {

                $unions = DB::select($query);

                return view('frontend.form_kha.union-vittik-data', compact('unions'));
            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function getKhaFormDataDetails(Request $request)
    {
        $user_id = $request->user_id;
        $union_id = $request->union_id;
        $financial_year = $request->financial_year;

        try {
            $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, a.union_id, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
            LEFT JOIN `users` AS b ON a.user_id = b.id
            LEFT JOIN `divisions` AS c ON b.division_id = c.id
            LEFT JOIN `districts` AS d ON b.district_id = d.id
            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.union_id = '" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                        `part_one_revenue_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_one_revenue_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");


            $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.union_id='" . $union_id . "' AND a.financial_year = '" . $financial_year . "' ");

            return view('frontend.form_kha.show_kha_form_data_details', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
