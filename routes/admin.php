<?php

use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FinancialYearController;
use App\Http\Controllers\FormKhaController;
use App\Http\Controllers\FormKhaStoreController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditFormKhaController;
use App\Http\Controllers\FormStatusController;
use App\Http\Controllers\WashNutritionController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Auth Routes
Route::get('admin-login', [AuthController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('loginCheck', [AuthController::class, 'loginCheck'])->name('loginCheck');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {

    // Dashboard Routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Financial Routes
    Route::group(['prefix' => 'financial-year'], function () {
        Route::get('/index', [FinancialYearController::class, 'index'])->name('financialYear.index');
        Route::get('/create', [FinancialYearController::class, 'create'])->name('financialYear.create');
        Route::get('/edit/{financial_year_id}', [FinancialYearController::class, 'create'])->name('financialYear.edit');
        Route::post('/store', [FinancialYearController::class, 'store'])->name('financialYear.store');
        Route::put('/update/{financial_year_id}', [FinancialYearController::class, 'update'])->name('financialYear.update');
    });

    //Type Routes
    Route::group(['prefix' => 'type'], function () {
        Route::get('/index', [TypeController::class, 'index'])->name('type.index');
        Route::get('/create', [TypeController::class, 'create'])->name('type.create');
        Route::post('/store', [TypeController::class, 'store'])->name('type.store');
        Route::get('/edit/{type_id}', [TypeController::class, 'edit'])->name('type.edit');
        Route::put('/update/{type_id}', [TypeController::class, 'update'])->name('type.update');
    });

    //Category Routes
    Route::group(['prefix' => 'category'], function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{type_id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{category_id}', [CategoryController::class, 'update'])->name('category.update');
    });

    //Subcategory Routes
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/index', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/edit/{type_id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::put('/update/{category_id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    });

    // master data
    // division
    Route::get('division/index', [DivisionController::class, 'index'])->name('division.index');
    Route::get('division/create', [DivisionController::class, 'create'])->name('division.create');
    Route::post('division/store', [DivisionController::class, 'store'])->name('division.store');

    // district
    Route::get('district/index', [DistrictController::class, 'index'])->name('district.index');
    Route::get('district/create', [DistrictController::class, 'create'])->name('district.create');
    Route::post('district/store', [DistrictController::class, 'store'])->name('district.store');

    // upazila
    Route::get('upazila/index', [UpazilaController::class, 'index'])->name('upazila.index');
    Route::get('upazila/create', [UpazilaController::class, 'create'])->name('upazila.create');
    Route::post('upazila/store', [UpazilaController::class, 'store'])->name('upazila.store');

    // union
    Route::get('union/index', [UnionController::class, 'index'])->name('union.index');
    Route::get('union/create', [UnionController::class, 'create'])->name('union.create');
    Route::post('union/store', [UnionController::class, 'store'])->name('union.store');

    // user management
    Route::get('user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');

    // when created the user then call to the js onchange function and return selected data
    Route::get('user_district_select_data', [UserController::class, 'userDistrictSelectData'])->name('user_district_select_data');
    Route::get('user_upazila_select_data', [UserController::class, 'userUpazilaSelectData'])->name('user_upazila_select_data');
    Route::get('user_union_select_data', [UserController::class, 'userUnionSelectData'])->name('user_union_select_data');

    //Wash and nutrition budget
    Route::group(['prefix' => 'wash-and-nutrition'], function () {
        Route::get('/index', [WashNutritionController::class, 'index'])->name('wash_and_nutrition.index');
        Route::get('/create', [WashNutritionController::class, 'create'])->name('wash_and_nutrition.create');
        Route::post('/store', [WashNutritionController::class, 'store'])->name('wash_and_nutrition.store');
        Route::get('/edit/{type_id}', [WashNutritionController::class, 'edit'])->name('wash_and_nutrition.edit');
        Route::put('/update/{category_id}', [WashNutritionController::class, 'update'])->name('wash_and_nutrition.update');
    });

    Route::get('/health-nutrition-subcategory-select-data', [WashNutritionController::class, 'healthNutritionSubcategorySelectData'])->name('healthNutritionSubcategorySelectData');

    //Report Section
    //Health Comparison Report
    Route::get('health-comparison-report', [ReportController::class, 'healthComparisonReport'])->name('admin.healthComparisonReport');
    Route::get('get-health-comparison-report', [ReportController::class, 'getHealthComparisonReport'])->name('admin.getHealthComparisonReport');

    //unionComparisonReport
    Route::get('wash-and-nutrition-report', [ReportController::class, 'washAndNutritionReport'])->name('admin.washAndNutritionReport');
    Route::get('get-wash-and-nutrition-report-data', [ReportController::class, 'getWashAndNutritionReportData'])->name('admin.getWashAndNutritionReportData');

    //Get all form kha list
    Route::get('admin/form-kha/list', [FormStatusController::class, 'getAllFormKhaData'])->name('admin.getAllFormKhaData');
    Route::get('admin/form-kha/view-details/{user_id}/{union_id}/{financial_year}', [FormStatusController::class, 'formKhaViewDetials'])->name('admin.formKhaViewDetials');
    Route::get('admin/form-kha/approved/{id}', [FormStatusController::class, 'approvedFormKhaData'])->name('admin.approvedFormKhaData');
    Route::get('admin/form-kha/declined/{id}', [FormStatusController::class, 'declinedFormKhaData'])->name('admin.declinedFormKhaData');
});

// From Kha Data Store Routes
Route::group(['prefix' => 'form-kha'], function () {
    Route::post('/part-one-revenue-income-account/store', [FormKhaStoreController::class, 'partOneRevenueIncomeAccountStore'])->name('partOneRevenueIncomeAccount.store');
    Route::post('/part-one-revenue-expenditure-account/store', [FormKhaStoreController::class, 'partOneRevenueExpenditureAccountStore'])->name('partOneRevenueExpenditureAccount.store');
    Route::post('/part-two-development-income-account/store', [FormKhaStoreController::class, 'partTwoDevelopmentIncomeAccountStore'])->name('partTwoDevelopmentIncomeAccount.store');
    Route::post('/part-two-development-expenditure-account/store', [FormKhaStoreController::class, 'partTwoDevelopmentExpenditureAccountStore'])->name('partTwoDevelopmentExpenditureAccount.store');
});

// From Kha Data Update Routes
Route::group(['prefix' => 'form-kha'], function () {
    Route::post('/part-one/update/{user_id}/{financial_year}/{union_id}', [EditFormKhaController::class, 'partOneUpdate'])->name('partOneRevenueIncomeAccount.update');
    Route::post('/part-two/update/{user_id}/{financial_year}/{union_id}', [EditFormKhaController::class, 'partTwoUpdate'])->name('partOneRevenueExpenditureAccount.update');
    Route::post('/part-three/update/{user_id}/{financial_year}/{union_id}', [EditFormKhaController::class, 'partThreeUpdate'])->name('partTwoDevelopmentIncomeAccount.update');
    Route::post('/part-four/update/{user_id}/{financial_year}/{union_id}', [EditFormKhaController::class, 'partFourUpdate'])->name('partTwoDevelopmentExpenditureAccount.update');
});
