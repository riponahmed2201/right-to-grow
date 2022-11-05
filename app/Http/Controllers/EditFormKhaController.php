<?php

namespace App\Http\Controllers;

use App\Models\PartOneRevenueExpenditureAccount;
use App\Models\PartOneRevenueIncomeAccount;
use App\Models\PartTwoDevelopmentExpenditureAccount;
use App\Models\PartTwoDevelopmentIncomeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditFormKhaController extends Controller
{
    // Part One Revenue Income Account Update to Database
    public function partOneRevenueIncomeAccountUpdate(Request $request, $user_id, $financial_year, $union_id)
    {
        try {

            DB::beginTransaction();

            $data_count = sizeof($request->part_one_revenue_income_account_subcategory_id);

            if (isset($data_count) > 0) {

                DB::table('part_one_revenue_income_accounts')
                    ->where('union_id', '=', $union_id)
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->delete();

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->update([
                        'user_id' => $user_id,
                        'financial_year' => $request->part_one_revenue_income_financial_year,
                        'is_part_one_revenue_income_store' => 2, //Data update then set 2
                    ]);

                for ($i = 0; $i < $data_count; $i++) {
                    $data = new PartOneRevenueIncomeAccount();
                    $data->user_id = $user_id;
                    $data->type_id = $request->part_one_revenue_income_account_type_id[$i];
                    $data->category_id = $request->part_one_revenue_income_account_category_id[$i];
                    $data->subcategory_id = $request->part_one_revenue_income_account_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_one_revenue_income_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    // $data->save();
                }

                DB::commit();

                return redirect()->route('show.form.kha')->with('success', 'Revenue income information updated successfully!');
            } else {

                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // Part One Revenue Expenditure Account Update to Database
    public function partOneRevenueExpenditureAccountUpdate(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_one_revenue_expenditure_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_one_revenue_expenditure_financial_year,
                    'is_part_one_revenue_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartOneRevenueExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->type_id = $request->part_one_revenue_expenditure_account_type_id[$i];
                    $data->category_id = $request->part_one_revenue_expenditure_account_category_id[$i];
                    $data->subcategory_id = $request->part_one_revenue_expenditure_account_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_one_revenue_expenditure_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Revenue expenditure information updated successfully!');
            } else {

                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // Part Two Development Income Account Update to Database
    public function partTwoDevelopmentIncomeAccountUpdate(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_development_income_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                //Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_two_development_income_financial_year,
                    'is_part_two_development_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentIncomeAccount();
                    $data->user_id = $user_id;
                    $data->type_id = $request->part_two_development_income_account_type_id[$i];
                    $data->category_id = $request->part_two_development_income_account_category_id[$i];
                    $data->subcategory_id = $request->part_two_development_income_account_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_two_development_income_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Development income information updated successfully!');
            } else {
                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // Part Two Development Expenditure Account Update to Database
    public function partTwoDevelopmentExpenditureAccountUpdate(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_development_expenditure_account_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                //Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')->where('user_id', '=', $user_id)->update([
                    'user_id' => $user_id,
                    'financial_year' => $request->part_two_development_expenditure_financial_year,
                    'is_part_two_development_expenditure_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->type_id = $request->part_two_development_expenditure_account_type_id[$i];
                    $data->category_id = $request->part_two_development_expenditure_account_category_id[$i];
                    $data->subcategory_id = $request->part_two_development_expenditure_account_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_two_development_expenditure_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Development expenditure information updated successfully!');
            } else {
                DB::rollBack();

                return back()->with('error', 'Something Error Found, Please try again!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
