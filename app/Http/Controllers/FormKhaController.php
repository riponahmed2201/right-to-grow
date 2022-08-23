<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormKhaController extends Controller
{
   public function showFormKha()
   {
       return view('frontend.form_kha.show_kha_form');
   }

   public function showKhaFormData()
   {
       return view('frontend.form_kha.show_kha_form_data');
   }
}
