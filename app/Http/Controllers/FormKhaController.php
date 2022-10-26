<?php

namespace App\Http\Controllers;

use App\Models\PartOneRevenueExpenditureAccount;
use App\Models\PartOneRevenueIncomeAccount;
use App\Models\PartTwoDevelopmentExpenditureAccount;
use App\Models\PartTwoDevelopmentIncomeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
    public function showFormKha()
    {
        $data['partOneRevenueIncomeAccountCategories'] = DB::table('categories')->where('type_id', '=', '1')->get();
        $data['partOneRevenueExpenditureAccountCategories'] = DB::table('categories')->where('type_id', '=', '2')->get();

        $data['partTwoDevelopmentIncomeAccountCategories'] = DB::table('categories')->where('type_id', '=', '3')->get();
        $data['partTwoDevelopmentExpenditureAccountCategories'] = DB::table('categories')->where('type_id', '=', '4')->get();

        $data['financialYearList'] = DB::table('financial_years')->orderBy('id', 'DESC')->get();

        return view('frontend.form_kha.show_kha_form', $data);
    }

    public function showKhaFormData($user_id, $financial_year)
    {

        $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
        LEFT JOIN `users` AS b ON a.user_id = b.id
        LEFT JOIN `divisions` AS c ON b.division_id = c.id
        LEFT JOIN `districts` AS d ON b.district_id = d.id
        LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
        LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                    `part_one_revenue_income_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_one_revenue_expenditure_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_two_development_income_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");


        $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_two_development_expenditure_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        return view('frontend.form_kha.show_kha_form_data', $data);
    }

    public function editFormKha($user_id, $financial_year)
    {
        $data['financialYearList'] = DB::table('financial_years')->get();
        $data['partOneRevenueIncomeAccountCategories'] = DB::table('categories')->where('type_id', '=', '1')->get();
        $data['partOneRevenueExpenditureAccountCategories'] = DB::table('categories')->where('type_id', '=', '2')->get();

        $data['partTwoDevelopmentIncomeAccountCategories'] = DB::table('categories')->where('type_id', '=', '3')->get();
        $data['partTwoDevelopmentExpenditureAccountCategories'] = DB::table('categories')->where('type_id', '=', '4')->get();

        $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
        LEFT JOIN `users` AS b ON a.user_id = b.id
        LEFT JOIN `divisions` AS c ON b.division_id = c.id
        LEFT JOIN `districts` AS d ON b.district_id = d.id
        LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
        LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                    `part_one_revenue_income_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_one_revenue_expenditure_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

        $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_two_development_income_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");


        $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                    `part_two_development_expenditure_accounts` AS a
                                                    LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");


        return view('frontend.form_kha.edit.edit_kha_form', $data);
    }

    public function getKhaFormList()
    {
        $user_id = session('user_id');

        $userInfo = DB::select('SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
                                            LEFT JOIN `users` AS b ON a.user_id = b.id
                                            LEFT JOIN `divisions` AS c ON b.division_id = c.id
                                            LEFT JOIN `districts` AS d ON b.district_id = d.id
                                            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
                                            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id=' . $user_id);


        return view('frontend.form_kha.kha-form-list', compact('userInfo'));
    }

    // Get All Data Show public
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

    public function getKhaFormDataDetails($user_id, $financial_year)
    {
        try {
            $data['userInfo'] = DB::select("SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
            LEFT JOIN `users` AS b ON a.user_id = b.id
            LEFT JOIN `divisions` AS c ON b.division_id = c.id
            LEFT JOIN `districts` AS d ON b.district_id = d.id
            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name  FROM
                                                        `part_one_revenue_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 1 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partOneRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_one_revenue_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 2 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

            $data['partTwoDevRevenueIncomeAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_income_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 3 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");


            $data['partTwoDevRevenueExpenditureAccountList'] = DB::select("SELECT DISTINCT b.id AS category_id, b.name as category_name FROM
                                                        `part_two_development_expenditure_accounts` AS a
                                                        LEFT JOIN `categories` AS b ON a.category_id = b.id WHERE a.type_id = 4 AND a.user_id='" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

            return view('frontend.form_kha.show_kha_form_data_details', $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Part One Revenue Income Account Store to Database
    public function partOneRevenueIncomeAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {

            $data_count = sizeof($request->part_one_revenue_income_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_one_revenue_income_financial_year,
                    'is_part_one_revenue_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueIncomes = new PartOneRevenueIncomeAccount();
                    $partOneRevenueIncomes->user_id = $user_id;
                    $partOneRevenueIncomes->type_id = $request->part_one_revenue_income_account_type_id[$i];
                    $partOneRevenueIncomes->category_id = $request->part_one_revenue_income_account_category_id[$i];
                    $partOneRevenueIncomes->subcategory_id = $request->part_one_revenue_income_account_subcategory_id[$i];
                    $partOneRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueIncomes->current_year_actual_income = $request->current_year_actual_income[$i];
                    $partOneRevenueIncomes->next_year_actual_income = $request->next_year_actual_income[$i];
                    $partOneRevenueIncomes->financial_year = $request->part_one_revenue_income_financial_year;
                    $partOneRevenueIncomes->notes = $request->notes[$i];
                    $partOneRevenueIncomes->submit_date = Carbon::now();
                    $partOneRevenueIncomes->save();
                }

                DB::commit();

                return back()->with('success', 'Part one revenue income account information saved successfully!');
            } else {

                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            return back()->with('error', 'Something Error Found, Please try again!');
        }
    }

    // Part One Revenue Expenditure Account Store to Database
    public function partOneRevenueExpenditureAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_one_revenue_expenditure_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_one_revenue_expenditure_financial_year,
                    'is_part_one_revenue_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueExpenditures = new PartOneRevenueExpenditureAccount();
                    $partOneRevenueExpenditures->user_id = $user_id;
                    $partOneRevenueExpenditures->type_id = $request->part_one_revenue_expenditure_account_type_id[$i];
                    $partOneRevenueExpenditures->category_id = $request->part_one_revenue_expenditure_account_category_id[$i];
                    $partOneRevenueExpenditures->subcategory_id = $request->part_one_revenue_expenditure_account_subcategory_id[$i];
                    $partOneRevenueExpenditures->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueExpenditures->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueExpenditures->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueExpenditures->current_year_actual_income = $request->current_year_actual_income[$i];
                    $partOneRevenueExpenditures->next_year_actual_income = $request->next_year_actual_income[$i];
                    $partOneRevenueExpenditures->financial_year = $request->part_one_revenue_expenditure_financial_year;
                    $partOneRevenueExpenditures->notes = $request->notes[$i];
                    $partOneRevenueExpenditures->submit_date = Carbon::now();
                    $partOneRevenueExpenditures->save();
                }

                DB::commit();

                return back()->with('success', 'Part one revenue expenditure account information saved successfully!');
            } else {

                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            return back()->with('error', 'Something Error Found, Please try again!');
        }
    }

    // Part Two Development Income Account Store to Database
    public function partTwoDevelopmentIncomeAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_development_income_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_two_development_income_financial_year,
                    'is_part_two_development_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partTwoDevRevenueIncomes = new PartTwoDevelopmentIncomeAccount();
                    $partTwoDevRevenueIncomes->user_id = $user_id;
                    $partTwoDevRevenueIncomes->type_id = $request->part_two_development_income_account_type_id[$i];
                    $partTwoDevRevenueIncomes->category_id = $request->part_two_development_income_account_category_id[$i];
                    $partTwoDevRevenueIncomes->subcategory_id = $request->part_two_development_income_account_subcategory_id[$i];
                    $partTwoDevRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partTwoDevRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partTwoDevRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partTwoDevRevenueIncomes->current_year_actual_income = $request->current_year_actual_income[$i];
                    $partTwoDevRevenueIncomes->next_year_actual_income = $request->next_year_actual_income[$i];
                    $partTwoDevRevenueIncomes->financial_year = $request->part_two_development_income_financial_year;
                    $partTwoDevRevenueIncomes->notes = $request->notes[$i];
                    $partTwoDevRevenueIncomes->submit_date = Carbon::now();
                    $partTwoDevRevenueIncomes->save();
                }

                DB::commit();

                return back()->with('success', 'Part two development income account information saved successfully!');
            } else {
                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            dd($exception);

            DB::rollBack();
            return back()->with('error', 'Something Error Found, Please try again!');
        }
    }

    // Part Two Development Expenditure Account Store to Database
    public function partTwoDevelopmentExpenditureAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_development_expenditure_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_two_development_expenditure_financial_year,
                    'is_part_two_development_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partTowDevRevenueExps = new PartTwoDevelopmentExpenditureAccount();
                    $partTowDevRevenueExps->user_id = $user_id;
                    $partTowDevRevenueExps->type_id = $request->part_two_development_expenditure_account_type_id[$i];
                    $partTowDevRevenueExps->category_id = $request->part_two_development_expenditure_account_category_id[$i];
                    $partTowDevRevenueExps->subcategory_id = $request->part_two_development_expenditure_account_subcategory_id[$i];
                    $partTowDevRevenueExps->last_year_budget = $request->previous_budget[$i];
                    $partTowDevRevenueExps->current_year_budget = $request->current_budget[$i];
                    $partTowDevRevenueExps->next_year_budget = $request->next_budget[$i];
                    $partTowDevRevenueExps->current_year_actual_income = $request->current_year_actual_income[$i];
                    $partTowDevRevenueExps->next_year_actual_income = $request->next_year_actual_income[$i];
                    $partTowDevRevenueExps->financial_year = $request->part_two_development_expenditure_financial_year;
                    $partTowDevRevenueExps->notes = $request->notes[$i];
                    $partTowDevRevenueExps->submit_date = Carbon::now();
                    $partTowDevRevenueExps->save();
                }

                DB::commit();

                return back()->with('success', 'Part two development expenditure account information saved successfully!');
            } else {
                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
            return back()->with('error', 'Something Error Found, Please try again!');
        }
    }

    public function showSummaryReport($user_id, $financial_year)
    {
        return view('frontend.form_kha.report.summary_report');
    }
}
