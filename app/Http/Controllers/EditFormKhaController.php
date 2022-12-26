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

    public function editFormKha($user_id, $financial_year)
    {
        try {
            $financialYearList = DB::table('financial_years')->orderBy('slug', 'desc')->get();

            $userInfo = DB::select("SELECT b.*, a.financial_year, c.name AS division_name, d.name AS district_name, e.name AS upazila_name, f.name AS union_name FROM `form_kha_data_users_info` AS a
            LEFT JOIN `users` AS b ON a.user_id = b.id
            LEFT JOIN `divisions` AS c ON b.division_id = c.id
            LEFT JOIN `districts` AS d ON b.district_id = d.id
            LEFT JOIN `upazilas` AS e ON b.upazila_id = e.id
            LEFT JOIN `unions` AS f ON b.union_id = f.id WHERE a.user_id = '" . $user_id . "' AND a.financial_year = '" . $financial_year . "' ");

            // START GET PART ONE DATA FROM DATABASE
            $partOne = DB::table('part_one_revenue_income_accounts as a')
                ->leftjoin('categories as cat', 'cat.id', '=', 'a.category_id')
                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                ->select('b.id AS subcategory_id', 'cat.name as category_name', 'b.name as subcategory_name', 'a.id', 'a.type_id',  'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                ->where('a.type_id', '=', 1)
                ->where('a.user_id', '=', $userInfo[0]->id)
                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                ->get();

            $partOneArray = json_decode(json_encode($partOne), true);

            $partOneDataFormat = [];
            foreach ($partOneArray  as $value) {
                $partOneDataFormat[$value['category_name']][] = $value;
            }
            // END GET PART ONE DATA FROM DATABASE

            // START GET PART TWO DATA FROM DATABASE
            $partTwo = DB::table('part_one_revenue_expenditure_accounts as a')
                ->leftjoin('categories as cat', 'cat.id', '=', 'a.category_id')
                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                ->select('b.id AS subcategory_id', 'cat.name as category_name', 'b.name as subcategory_name', 'a.id', 'a.type_id',  'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                ->where('a.type_id', '=', 2)
                ->where('a.user_id', '=', $userInfo[0]->id)
                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                ->get();

            $partTwoArray = json_decode(json_encode($partTwo), true);

            $partTwoDataFormat = [];
            foreach ($partTwoArray  as $partTwoValue) {
                $partTwoDataFormat[$partTwoValue['category_name']][] = $partTwoValue;
            }
            // END GET PART TWO DATA FROM DATABASE

            // START GET PART THREE DATA FROM DATABASE
            $partThree = DB::table('part_two_development_income_accounts as a')
                ->leftjoin('categories as cat', 'cat.id', '=', 'a.category_id')
                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                ->select('b.id AS subcategory_id', 'cat.name as category_name', 'b.name as subcategory_name', 'a.id', 'a.type_id',  'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                ->where('a.type_id', '=', 3)
                ->where('a.user_id', '=', $userInfo[0]->id)
                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                ->get();

            $partThreeArray = json_decode(json_encode($partThree), true);

            $partThreeDataFormat = [];
            foreach ($partThreeArray  as $partThreeValue) {
                $partThreeDataFormat[$partThreeValue['category_name']][] = $partThreeValue;
            }
            // END GET PART THREE DATA FROM DATABASE

            // START GET PART FOUR DATA FROM DATABASE
            $partFour = DB::table('part_two_development_expenditure_accounts as a')
                ->leftjoin('categories as cat', 'cat.id', '=', 'a.category_id')
                ->leftjoin('subcategories as b', 'b.id', '=', 'a.subcategory_id')
                ->select('b.id AS subcategory_id', 'cat.name as category_name', 'b.name as subcategory_name', 'a.id', 'a.type_id',  'a.category_id', 'a.subcategory_id', 'a.notes', 'a.last_year_budget', 'a.current_year_budget', 'a.next_year_budget', 'a.current_year_actual_income', 'a.next_year_actual_income')
                ->where('a.type_id', '=', 4)
                ->where('a.user_id', '=', $userInfo[0]->id)
                ->where('a.financial_year', '=', $userInfo[0]->financial_year)
                ->get();

            $partFourArray = json_decode(json_encode($partFour), true);

            $partFourDataFormat = [];
            foreach ($partFourArray  as $partFourValue) {
                $partFourDataFormat[$partFourValue['category_name']][] = $partFourValue;
            }
            // END GET PART FOUR DATA FROM DATABASE

            $dataArray =  [
                'financialYearList' =>  $financialYearList,
                'userInfo' =>  $userInfo,
                'partOneDataFormat' => $partOneDataFormat,
                'partTwoDataFormat' => $partTwoDataFormat,
                'partThreeDataFormat' => $partThreeDataFormat,
                'partFourDataFormat' => $partFourDataFormat
            ];

            return view('frontend.form_kha.edit.edit_kha_form', $dataArray);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // PART ONE STORE TO DATABASE
    public function partOneUpdate(Request $request, $user_id, $financial_year, $union_id)
    {
        try {

            DB::beginTransaction();

            $data_count = sizeof($request->part_one_revenue_subcategory_id);

            if (isset($data_count) > 0) {

                $partOneOldDataDelete = DB::table('part_one_revenue_income_accounts')->where('union_id', '=', $union_id)
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->delete();

                if (!$partOneOldDataDelete) {
                    return back()->with('error', 'Something Error Found, Please try again! Does not update to the information');
                }

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $union_id)
                    ->where('financial_year', '=', $financial_year)
                    ->update([
                        'financial_year' => $request->part_one_revenue_income_financial_year,
                        'is_part_one_revenue_income_store' => 2, //Data update then set 2
                    ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartOneRevenueIncomeAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $union_id;
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

    // PART TWO STORE TO DATABASE
    public function partTwoUpdate(Request $request, $user_id, $financial_year, $union_id)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_two_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                // dd("union_id: ", $union_id, "user_id: ", $user_id, "financial_year: ", $financial_year );

                $partTwoOldDataDelete = DB::table('part_one_revenue_expenditure_accounts')
                    ->where('union_id', '=', $union_id)
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->delete();

                if (!$partTwoOldDataDelete) {
                    return back()->with('error', 'Something Error Found, Please try again! Does not update to the information');
                }

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $union_id)
                    ->where('financial_year', '=', $financial_year)
                    ->update([
                        'financial_year' => $request->part_two_financial_year,
                        'is_part_one_revenue_expenditure_store' => 2, //Data update then set 2
                    ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartOneRevenueExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $union_id;
                    $data->type_id = $request->part_two_type_id[$i];
                    $data->category_id = $request->part_two_category_id[$i];
                    $data->subcategory_id = $request->part_two_subcategory_id[$i];
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

    // PART THREE STORE TO DATABASE
    public function partThreeUpdate(Request $request, $user_id, $financial_year, $union_id)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_three_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $partThreeOldDataDelete = DB::table('part_two_development_income_accounts')
                    ->where('union_id', '=', $union_id)
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->delete();

                if (!$partThreeOldDataDelete) {
                    return back()->with('error', 'Something Error Found, Please try again! Does not update to the information');
                }

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $union_id)
                    ->where('financial_year', '=', $financial_year)
                    ->update([
                        'financial_year' => $request->part_three_financial_year,
                        'is_part_two_development_income_store' => 2, //Data update then set 2
                    ]);


                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentIncomeAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $union_id;
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

    // PART FOUR STORE TO DATABASE
    public function partFourUpdate(Request $request, $user_id, $financial_year, $union_id)
    {
        DB::beginTransaction();

        try {
            $data_count = sizeof($request->part_four_subcategory_id);

            if (isset($data_count) > 0) {

                $user_id = session('user_id');

                $partThreeOldDataDelete = DB::table('part_two_development_expenditure_accounts')
                    ->where('union_id', '=', $union_id)
                    ->where('user_id', '=', $user_id)
                    ->where('financial_year', '=', $financial_year)
                    ->delete();

                if (!$partThreeOldDataDelete) {
                    return back()->with('error', 'Something Error Found, Please try again! Does not update to the information');
                }

                // Update the form_kha_data_users_info table info
                DB::table('form_kha_data_users_info')
                    ->where('user_id', '=', $user_id)
                    ->where('union_id', '=', $union_id)
                    ->where('financial_year', '=', $financial_year)
                    ->update([
                        'financial_year' => $request->part_four_financial_year,
                        'is_part_two_development_expenditure_store' => 2, //Data update then set 2
                    ]);

                for ($i = 0; $i < $data_count; $i++) {

                    $data = new PartTwoDevelopmentExpenditureAccount();
                    $data->user_id = $user_id;
                    $data->union_id = $union_id;
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
