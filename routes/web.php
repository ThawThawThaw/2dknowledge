<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

// Login
//=========================
Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::get('/login',[LoginController::class,'index']);
Route::get('/boot',[LoginController::class,'loginForm'])->name('login.form');
Route::post('/login',[LoginController::class,'login'])->name('login.login');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout')->middleware('AuthAdmin');
Route::get('/change-password',[LoginController::class,'changePasswordForm'])->name('change.password.form')->middleware('AuthAdmin');
Route::post('/change-password',[LoginController::class,'changePassword'])->name('change.password')->middleware('AuthAdmin');

// Lottery Dashboard
//=========================
Route::middleware('AuthAdmin','CheckCalendar')->group(function() {
    Route::get('/edit/{content}',[DashboardController::class,'edit'])->name('dashboard.edit');
    Route::put('/update/{id}',[DashboardController::class,'update'])->name('dashboard.update');
    Route::get('/show/{content}',[DashboardController::class,'show'])->name('dashboard.show');
    Route::resource('posts', PostController::class);
    Route::resource('calendar',CalendarController::class);
});
