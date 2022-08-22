<?php

use App\Http\Controllers\FormKhaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('master');
});


// FORM KHA ROUTES
Route::get('/form-kha',[FormKhaController::class,'showFormKha'])->name('show.form.kha');
Route::get('/view-form-kha',[FormKhaController::class,'viewFormKhaData'])->name('show_form_kha_data');
