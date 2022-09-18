<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormKhaController;
use App\Http\Controllers\FrontendController;
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


// FRONTEND HOME ROUTES
Route::get('/', [FrontendController::class, 'index'])->name('front.home');

Route::middleware('user')->group(function () {

    // FORM KHA ROUTES
    Route::get('form-kha', [FormKhaController::class, 'showFormKha'])->name('show.form.kha');
    Route::get('show-form-kha', [FormKhaController::class, 'showKhaFormData'])->name('show_form_kha_data');
    Route::get('list-form-kha', [FormKhaController::class, 'getKhaFormList'])->name('user.getKhaFormList');
});

// User Authentication Process
Route::get('user-login', [AuthController::class, 'userShowLoginForm'])->name('user.showLoginForm');
Route::post('user-login-check', [AuthController::class, 'userLoginCheck'])->name('user.userLoginCheck');
