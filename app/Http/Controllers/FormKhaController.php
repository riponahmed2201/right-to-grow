<?php

namespace App\Http\Controllers;

use App\Models\PartOneRevenueExpenditureAccount;
use App\Models\PartOneRevenueIncomeAccount;
use App\Models\PartTwoDevelopmentExpenditureAccount;
use App\Models\PartTwoDevelopmentExpenditureChildCategoryAccount;
use App\Models\PartTwoDevelopmentIncomeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
    public function showFormKha()
    {
        $data['partOneRevenueIncomeAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '1')->get();
        $data['partOneRevenueExpenditureAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '2')->get();

        $data['partTwoDevelopmentIncomeAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '3')->get();
        $data['partTwoDevelopmentExpenditureAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '4')->get();

        $data['financialYearList'] = DB::table('financial_years')->orderBy('id', 'DESC')->get();

        return view('frontend.form_kha.show_kha_form', $data);
    }

    public function showKhaFormData()
    {
        $data['partOneRevenueIncomeAccountList'] = DB::select('SELECT DISTINCT b.id AS category_title_id, b.category_title FROM
                                                    `part_one_revenue_income_accounts` AS a
                                                    LEFT JOIN `category_titles` AS b ON a.category_title_id = b.id WHERE a.category_type_id = 1');

        return view('frontend.form_kha.show_kha_form_data', $data);
    }

    // Part One Revenue Income Account Store to Database
    public function partOneRevenueIncomeAccountStore(Request $request)
    {
        try {
            $data_count = sizeof($request->part_one_revenue_income_account_parent_category_id);

            if (isset($data_count) > 0) {

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => 1,
                    'financial_year' => $request->part_one_revenue_income_financial_year,
                    'is_part_one_revenue_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueIncomes = new PartOneRevenueIncomeAccount();
                    $partOneRevenueIncomes->category_type_id = $request->part_one_revenue_income_account_category_type_id[$i];
                    $partOneRevenueIncomes->category_title_id = $request->part_one_revenue_income_account_category_title_id[$i];
                    $partOneRevenueIncomes->parent_category_id = $request->part_one_revenue_income_account_parent_category_id[$i];
                    $partOneRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueIncomes->submit_date = Carbon::now();
                    $partOneRevenueIncomes->save();
                }

                // return back()->with('success', 'Submit');
            }
            return back()->with('success', 'Submit');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    // Part One Revenue Expenditure Account Store to Database
    public function partOneRevenueExpenditureAccountStore(Request $request)
    {
        try {
            $data_count = sizeof($request->part_one_revenue_expenditure_account_parent_category_id);

            if (isset($data_count) > 0) {

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => 1,
                    'financial_year' => $request->part_one_revenue_expenditure_financial_year,
                    'is_part_one_revenue_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueIncomes = new PartOneRevenueExpenditureAccount();
                    $partOneRevenueIncomes->category_type_id = $request->part_one_revenue_expenditure_account_category_type_id[$i];
                    $partOneRevenueIncomes->category_title_id = $request->part_one_revenue_expenditure_account_category_title_id[$i];
                    $partOneRevenueIncomes->parent_category_id = $request->part_one_revenue_expenditure_account_parent_category_id[$i];
                    $partOneRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueIncomes->submit_date = Carbon::now();
                    $partOneRevenueIncomes->save();
                }

                // return back()->with('success', 'Submit');
            }
            return back()->with('success', 'Submit');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    // Part Two Development Income Account Store to Database
    public function partTwoDevelopmentIncomeAccountStore(Request $request)
    {
        try {
            $data_count = sizeof($request->part_two_develpment_income_account_parent_category_id);

            if (isset($data_count) > 0) {

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => 1,
                    'is_part_two_development_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueIncomes = new PartTwoDevelopmentIncomeAccount();
                    $partOneRevenueIncomes->category_type_id = $request->part_two_develpment_income_account_category_type_id[$i];
                    $partOneRevenueIncomes->category_title_id = $request->part_two_develpment_income_account_category_title_id[$i];
                    $partOneRevenueIncomes->parent_category_id = $request->part_two_develpment_income_account_parent_category_id[$i];
                    $partOneRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueIncomes->submit_date = Carbon::now();
                    $partOneRevenueIncomes->save();
                }

                // return back()->with('success', 'Submit');
            }
            return back()->with('success', 'Submit');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    // Part Two Development Expenditure Account Store to Database
    public function partOneDevelopmentExpenditureAccountStore(Request $request)
    {
        try {
            $data_count = sizeof($request->part_two_develpment_expenditure_account_parent_category_id);

            if (isset($data_count) > 0) {

                // store the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => 1,
                    'is_part_two_development_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $partOneRevenueIncomes = new PartTwoDevelopmentExpenditureAccount();
                    $partOneRevenueIncomes->category_type_id = $request->part_two_develpment_expenditure_account_category_type_id[$i];
                    $partOneRevenueIncomes->category_title_id = $request->part_two_develpment_expenditure_account_category_title_id[$i];
                    $partOneRevenueIncomes->parent_category_id = $request->part_two_develpment_expenditure_account_parent_category_id[$i];
                    $partOneRevenueIncomes->last_year_budget = $request->previous_budget[$i];
                    $partOneRevenueIncomes->current_year_budget = $request->current_budget[$i];
                    $partOneRevenueIncomes->next_year_budget = $request->next_budget[$i];
                    $partOneRevenueIncomes->submit_date = Carbon::now();
                    $partOneRevenueIncomes->save();

                    $child_data_count = sizeof($request->part_two_develpment_expenditure_account_parent_category_id);

                    for ($j = 0; $j < $child_data_count; $j++) {

                        $partTwoDevChildExpenditures = new PartTwoDevelopmentExpenditureChildCategoryAccount();
                        $partTwoDevChildExpenditures->category_type_id = $request->part_two_develpment_expenditure_account_category_type_id[$j];
                        $partTwoDevChildExpenditures->parent_category_id = $request->part_two_develpment_expenditure_account_parent_category_id[$j];
                        $partTwoDevChildExpenditures->child_category_id = $request->part_two_develpment_expenditure_account_child_category_id[$j];

                        $partTwoDevChildExpenditures->last_year_budget = $request->previous_budget[$j];
                        $partTwoDevChildExpenditures->current_year_budget = $request->current_budget[$j];
                        $partTwoDevChildExpenditures->next_year_budget = $request->next_budget[$i];
                        $partTwoDevChildExpenditures->submit_date = Carbon::now();
                        $partTwoDevChildExpenditures->save();
                    }
                }

                // return back()->with('success', 'Submit');
            }
            return back()->with('success', 'Submit');
        } catch (\Exception $exception) {
            dd($exception);
        }
    }
}
