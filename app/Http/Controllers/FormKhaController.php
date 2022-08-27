<?php

namespace App\Http\Controllers;

use App\Models\PartOneRevenueIncomeAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
    public function showFormKha()
    {
        $data['partOneRevenueIncomeAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '1')->get();
        $data['partOneRevenueExpenditureAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=', '2')->get();

//       dd($data['partOneRevenueIncomeAccountCategoryTitleList']);

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
}
