<?php

use App\Http\Controllers\api\v1\CalendarController;
use App\Http\Controllers\api\v1\LotteryController;
use App\Http\Controllers\api\v1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('TokenAuth','CheckCalendar')->group(function() {
    Route::get('/lottery/{type}', [LotteryController::class,'numbers']);
    Route::get('/points/{device_id}', [LotteryController::class,'get_points']);
    Route::get('/points/decrease/{device_id}',[LotteryController::class,'decrease_points']);
    Route::post('/points', [LotteryController::class,'set_points']);

    Route::get('/posts',[PostController::class,'index']);
    Route::get('/calendar',[CalendarController::class,'calendar']);
});