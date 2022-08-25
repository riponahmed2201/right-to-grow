<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryHeadController;
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
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.showLoginForm');
Route::post('loginCheck', [AuthController::class, 'loginCheck'])->name('loginCheck');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->group(function () {

    // Dashboard Routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // category type
    Route::get('category-type/index', [CategoryTypeController::class, 'index'])->name('category.type.index');

    // category
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');

    // category head
    Route::get('category-head/index', [CategoryHeadController::class, 'index'])->name('category.head.index');
    Route::get('category-head/create', [CategoryHeadController::class, 'create'])->name('category.head.create');
    Route::post('category-head/store', [CategoryHeadController::class, 'store'])->name('category.head.store');

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
