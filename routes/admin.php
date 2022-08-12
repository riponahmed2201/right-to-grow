<?php

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
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login.showLoginForm');

// Dashboard Routes
Route::get('/admin',[DashboardController::class, 'index'])->name('admin.dashboard');
