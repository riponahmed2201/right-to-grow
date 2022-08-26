<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormKhaController extends Controller
{
   public function showFormKha()
   {
       $parentList = DB::table('test_category')->where('type_id', 1)->get();
       dd($testData);
       return view('frontend.form_kha.show_kha_form');
   }

   public function showKhaFormData()
   {
       return view('frontend.form_kha.show_kha_form_data');
   }
}
