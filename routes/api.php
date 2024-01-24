<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user_registration',[Api::class,'user_registration']);
Route::post('user_login',[Api::class,'user_login']);
Route::post('forget_password',[Api::class,'forget_password']);
Route::post('check_otp',[Api::class,'check_otp']);
Route::post('change_password',[Api::class,'change_password']);
Route::get('all_hospital',[Api::class,'all_hospital']);
Route::get('treatment_list',[Api::class,'treatment_list']);
Route::get('specialty_list',[Api::class,'specialty_list']);
Route::get('city_list',[Api::class,'city_list']);
Route::post('hospital_filter',[Api::class,'hospital_filter']);