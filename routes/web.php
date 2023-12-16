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
Route::get('/treatments',[TreatmeantController::class,'treatmeants']);
Route::get('/addTreatments',[TreatmeantController::class,'addTreatmeants']);
Route::get('/treatmentstype',[TreatmeantController::class,'treatmentstype']);
Route::get('/addTreatmentsType',[TreatmeantController::class,'addTreatmentsType']);
Route::get('/hospital',[HospitalController::class,'hospital']);
});
