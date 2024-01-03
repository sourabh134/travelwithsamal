<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\TreatmeantController;
use App\Http\Controllers\HospitalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth-login',[AdminController::class,'login']);
Route::post('/adminLogin',[AdminController::class,'adminLogin']);
Route::get('/createpassword', [AdminController::class, 'createpassword']);
Route::middleware(['middleware' => 'prevent-back-history','checkLogin'])->group(function(){
Route::get('/dashboard',[AdminController::class,'dashboard']);
Route::get('/specialization',[SpecializationController::class,'specialization']);
Route::get('/addSpecialization',[SpecializationController::class,'addSpecialization']);
Route::post('/insert_specialization',[SpecializationController::class,'insert_specialization']);
Route::post('/delete_specialization',[SpecializationController::class,'delete_specialization']);
Route::get('/treatments',[TreatmeantController::class,'treatmeants']);
Route::get('/addTreatments',[TreatmeantController::class,'addTreatmeants']);
Route::post('/insert_treatmeants',[TreatmeantController::class,'insert_treatmeants']);
Route::post('/delete_treatmeants',[TreatmeantController::class,'delete_treatmeants']);
Route::get('/hospitals',[HospitalController::class,'hospital']);
Route::get('/addHospital',[HospitalController::class,'addHospital']);
Route::post('/insert_hospital',[HospitalController::class,'insert_hospital']);
Route::post('/delete_hospital',[HospitalController::class,'delete_hospital']);
Route::post('/getState',[HospitalController::class,'getState']);
Route::post('/getCity',[HospitalController::class,'getCity']);
});
