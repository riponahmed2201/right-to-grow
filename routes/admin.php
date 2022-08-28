<?php

use App\Http\Controllers\CategoryTitleController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\FinancialYearController;
use App\Http\Controllers\FormKhaController;
use App\Http\Controllers\ParentCategoryController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UnionController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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

    // Category Type Routes
    Route::group(['prefix' => 'category-type'], function () {
        Route::get('/index', [CategoryTypeController::class, 'index'])->name('categoryType.index');
        Route::get('/create', [CategoryTypeController::class, 'create'])->name('categoryType.create');
        Route::post('/store', [CategoryTypeController::class, 'store'])->name('categoryType.store');
    });

    // Category Title Routes
    Route::group(['prefix' => 'category-title'], function () {
        Route::get('/index', [CategoryTitleController::class, 'index'])->name('categoryTitle.index');
        Route::get('/create', [CategoryTitleController::class, 'create'])->name('categoryTitle.create');
        Route::post('/store', [CategoryTitleController::class, 'store'])->name('categoryTitle.store');
    });

    // Parent Category Routes
    Route::group(['prefix' => 'parent-category'], function () {
        Route::get('/index', [ParentCategoryController::class, 'index'])->name('parentCategory.index');
        Route::get('/create', [ParentCategoryController::class, 'create'])->name('parentCategory.create');
        Route::post('/store', [ParentCategoryController::class, 'store'])->name('parentCategory.store');
    });

    // Child Category Routes
    Route::group(['prefix' => 'child-category'], function () {
        Route::get('/index', [ChildCategoryController::class, 'index'])->name('childCategory.index');
        Route::get('/create', [ChildCategoryController::class, 'create'])->name('childCategory.create');
        Route::post('/store', [ChildCategoryController::class, 'store'])->name('childCategory.store');
        Route::get('/edit/{child_category_id}', [ChildCategoryController::class, 'edit'])->name('childCategory.edit');
        Route::put('/update/{child_category_id}', [ChildCategoryController::class, 'update'])->name('childCategory.update');
    });

    // Child Category Routes
    Route::group(['prefix' => 'category_title-subhead'], function () {
        Route::get('/index', [ParentCategoryController::class, 'index'])->name('category_title.subhead.index');
        Route::get('/create', [ParentCategoryController::class, 'create'])->name('category_title.subhead.create');
        Route::post('/store', [ParentCategoryController::class, 'store'])->name('category_title.subhead.store');
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

});

// From Kha Data Store Routes
Route::group(['prefix' => 'form-kha'], function () {
    Route::post('/part-one-revenue-income-account/store', [FormKhaController::class, 'partOneRevenueIncomeAccountStore'])->name('partOneRevenueIncomeAccount.store');
    Route::post('/part-one-revenue-expenditure-account/store', [FormKhaController::class, 'partOneRevenueExpenditureAccountStore'])->name('partOneRevenueExpenditureAccount.store');
    Route::post('/part-two-development-income-account/store', [FormKhaController::class, 'partTwoDevelopmentIncomeAccountStore'])->name('partTwoDevelopmentExpenditureAccount.store');
    Route::post('/part-one-development-expenditure-account/store', [FormKhaController::class, 'partOneDevelopmentExpenditureAccountStore'])->name('partTwoDevelopmentExpenditureAccount.store');
});
