<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
   public function showFormKha()
   {
       $data['partOneRevenueIncomeAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=','1')->get();
       $data['partOneRevenueExpenditureAccountCategoryTitleList'] = DB::table('category_titles')->where('category_type_id', '=','2')->get();

//       dd($data['partOneRevenueIncomeAccountCategoryTitleList']);

       return view('frontend.form_kha.show_kha_form', $data);
   }

   public function showKhaFormData()
   {
       return view('frontend.form_kha.show_kha_form_data');
   }
}
