<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormKaController;
use App\Http\Controllers\FormKhaController;
use App\Http\Controllers\EditFormKhaController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MapTrackingController;
use App\Http\Controllers\SummaryReportController;
use App\Http\Controllers\TrackingReportController;
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
    Route::get('show-form-kha/{user_id}/{union_id}/{financial_year}', [FormKhaController::class, 'showKhaFormData'])->name('show_form_kha_data');
    Route::get('list-form-kha', [FormKhaController::class, 'getKhaFormList'])->name('user.getKhaFormList');

    // FORM KHA EDIT DATA SHOW
    Route::get('edit-form-kha/{user_id}/{union_id}/{financial_year}', [EditFormKhaController::class, 'editFormKha'])->name('user.editFormKha');

    //Form Ka
    Route::get('form-ka-list', [FormKaController::class, 'getKaFormList'])->name('show.getKaFormList');

    //Summary Report
    Route::get('show-summary-report/{user_id}/{union_id}/{financial_year}', [SummaryReportController::class, 'showSummaryReport'])->name('user.summary_report');
});

//Public Kha Form Data show
Route::get('all-form-kha-data/{union_id}', [FormKhaController::class, 'getAllKhaFormData'])->name('user.getAllKhaFormData');
Route::get('form-kha/details', [FormKhaController::class, 'getKhaFormDataDetails'])->name('getKhaFormDataDetails');

//Union vittik data show
Route::match(['get', 'post'], 'all-union-vittik-data', [FormKhaController::class, 'getAllUnionVittikData'])->name('user.getAllUnionVittikData');

// User Authentication Process
Route::get('user-login', [AuthController::class, 'userShowLoginForm'])->name('user.showLoginForm');
Route::post('user-login-check', [AuthController::class, 'userLoginCheck'])->name('user.userLoginCheck');


// show_map_tracking
Route::get('show-map-tracking', [MapTrackingController::class, 'showMapTracking'])->name('user.showMapTracking');
Route::get('upazila-map-tracking', [MapTrackingController::class, 'showUpazilaMapTracking'])->name('user.showUpazilaMapTracking');

//Report Tracking
Route::get('view-development-expense-budget-tracking', [TrackingReportController::class, 'viewDevelopmentExpenseBudgetTracking'])->name('user.viewDevelopmentExpenseBudgetTracking');
Route::get('get-development-expense-budget-tracking', [TrackingReportController::class, 'getDevelopmentExpenseBudgetTracking'])->name('user.getDevelopmentExpenseBudgetTracking');