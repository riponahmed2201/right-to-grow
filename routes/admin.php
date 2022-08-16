<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryHeadController;
use App\Http\Controllers\CategoryTypeController;
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
Route::get('login',[AuthController::class, 'showLoginForm'])->name('login.showLoginForm');

// Dashboard Routes
Route::get('dashboard',[DashboardController::class, 'index'])->name('admin.dashboard');

// category type
Route::get('category-type/index',[CategoryTypeController::class, 'index'])->name('category.type.index');

// category
Route::get('category/index',[CategoryController::class, 'index'])->name('category.index');
Route::get('category/create',[CategoryController::class, 'create'])->name('category.create');
Route::post('category/store',[CategoryController::class, 'store'])->name('category.store');

// category head
Route::get('category-head/index',[CategoryHeadController::class, 'index'])->name('category.head.index');
Route::get('category-head/create',[CategoryHeadController::class, 'create'])->name('category.head.create');
Route::post('category-head/store',[CategoryHeadController::class, 'store'])->name('category.head.store');
