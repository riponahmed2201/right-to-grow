<?php

namespace App\Http\Controllers;

use App\Models\PartOneRevenueExpenditureAccount;
use App\Models\PartOneRevenueIncomeAccount;
use App\Models\PartTwoDevelopmentExpenditureAccount;
use App\Models\PartTwoDevelopmentIncomeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaStoreController extends Controller
{
    // PART ONE STORE TO DATABASE
    public function partOneRevenueIncomeAccountStore(Request $request)
    {
        try {

            DB::beginTransaction();

            $data_count = sizeof($request->part_one_revenue_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $userInfo = DB::table('users')->where('id', '=', $user_id)->first();

                $alreadyExists =  DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $userInfo->union_id)
                    ->where('financial_year', '=', $request->part_one_revenue_income_financial_year)
                    ->where('is_part_one_revenue_income_store', '=', 1)
                    ->first();

                if ($alreadyExists) {
                    return back()->with('error', 'This financial year wise union data already saved!');
                }

                DB::table('form_kha_data_users_info')->insert([
                    'user_id' => $user_id,
                    'union_id' => $userInfo->union_id,
                    'financial_year' => $request->part_one_revenue_income_financial_year,
                    'is_part_one_revenue_income_store' => 1,
                ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartOneRevenueIncomeAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $userInfo->union_id;
                    $data->type_id = $request->part_one_revenue_type_id[$i];
                    $data->category_id = $request->part_one_revenue_category_id[$i];
                    $data->subcategory_id = $request->part_one_revenue_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_one_revenue_income_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Revenue income information saved successfully!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // PART TWO STORE TO DATABASE
    public function partOneRevenueExpenditureAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_expenditure_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $userInfo = DB::table('users')->where('id', '=', $user_id)->first();

                $alreadyExists =  DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $userInfo->union_id)
                    ->where('financial_year', '=', $request->part_two_financial_year)
                    ->first();

                if ($alreadyExists && $alreadyExists->is_part_one_revenue_expenditure_store == 1) {
                    return back()->with('error', 'This financial year wise union information already saved.');
                } else if ($alreadyExists && $alreadyExists->is_part_one_revenue_expenditure_store == 0) {
                    DB::table('form_kha_data_users_info')
                        ->where('user_id', '=', $user_id)
                        ->where('union_id', '=', $userInfo->union_id)
                        ->where('financial_year', '=', $request->part_two_financial_year)
                        ->update([
                            'is_part_one_revenue_expenditure_store' => 1,
                        ]);
                } else {
                    DB::table('form_kha_data_users_info')->insert([
                        'user_id' => $user_id,
                        'union_id' => $userInfo->union_id,
                        'financial_year' => $request->part_two_financial_year,
                        'is_part_one_revenue_expenditure_store' => 1,
                    ]);
                }

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartOneRevenueExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $userInfo->union_id;
                    $data->type_id = $request->part_two_expenditure_type_id[$i];
                    $data->category_id = $request->part_two_expenditure_category_id[$i];
                    $data->subcategory_id = $request->part_two_expenditure_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_two_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Revenue expenditure information saved successfully!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // PART THREE STORE TO DATABASE
    public function partTwoDevelopmentIncomeAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_three_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $userInfo = DB::table('users')->where('id', '=', $user_id)->first();

                $alreadyExists =  DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $userInfo->union_id)
                    ->where('financial_year', '=', $request->part_three_financial_year)
                    ->first();

                if ($alreadyExists && $alreadyExists->is_part_two_development_income_store == 1) {
                    return back()->with('error', 'This financial year wise union information already saved.');
                } else if ($alreadyExists && $alreadyExists->is_part_two_development_income_store == 0) {
                    DB::table('form_kha_data_users_info')
                        ->where('user_id', '=', $user_id)
                        ->where('union_id', '=', $userInfo->union_id)
                        ->where('financial_year', '=', $request->part_three_financial_year)
                        ->update([
                            'is_part_two_development_income_store' => 1,
                        ]);
                } else {
                    DB::table('form_kha_data_users_info')->insert([
                        'user_id' => $user_id,
                        'union_id' => $userInfo->union_id,
                        'financial_year' => $request->part_three_financial_year,
                        'is_part_two_development_income_store' => 1,
                    ]);
                }

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentIncomeAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $userInfo->union_id;
                    $data->type_id = $request->part_three_type_id[$i];
                    $data->category_id = $request->part_three_category_id[$i];
                    $data->subcategory_id = $request->part_three_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_three_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Development income information saved successfully!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    // PART FOUR STORE TO DATABASE
    public function partTwoDevelopmentExpenditureAccountStore(Request $request)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_four_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $userInfo = DB::table('users')->where('id', '=', $user_id)->first();

                $alreadyExists =  DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $userInfo->union_id)
                    ->where('financial_year', '=', $request->part_four_financial_year)
                    ->first();

                if ($alreadyExists && $alreadyExists->is_part_two_development_expenditure_store == 1) {
                    return back()->with('error', 'This financial year wise union information already saved.');
                } else if ($alreadyExists && $alreadyExists->is_part_two_development_expenditure_store == 0) {
                    DB::table('form_kha_data_users_info')
                        ->where('user_id', '=', $user_id)
                        ->where('union_id', '=', $userInfo->union_id)
                        ->where('financial_year', '=', $request->part_four_financial_year)
                        ->update([
                            'is_part_two_development_expenditure_store' => 1,
                        ]);
                } else {
                    DB::table('form_kha_data_users_info')->insert([
                        'user_id' => $user_id,
                        'union_id' => $userInfo->union_id,
                        'financial_year' => $request->part_four_financial_year,
                        'is_part_two_development_expenditure_store' => 1,
                    ]);
                }

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $userInfo->union_id;
                    $data->type_id = $request->part_four_type_id[$i];
                    $data->category_id = $request->part_four_category_id[$i];
                    $data->subcategory_id = $request->part_four_subcategory_id[$i];
                    $data->last_year_budget = $request->previous_budget[$i];
                    $data->current_year_budget = $request->current_budget[$i];
                    $data->next_year_budget = $request->next_budget[$i];
                    $data->current_year_actual_income = $request->current_year_actual_income[$i];
                    $data->next_year_actual_income = $request->next_year_actual_income[$i];
                    $data->financial_year = $request->part_four_financial_year;
                    $data->notes = $request->notes[$i];
                    $data->submit_date = Carbon::now();
                    $data->save();
                }

                DB::commit();

                return back()->with('success', 'Development expenditure information saved successfully!');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
