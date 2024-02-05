<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\DestinationController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[AdminController::class,'login']);
Route::get('/admin',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'admin_login']);
Route::middleware(['middleware' => 'prevent-back-history','checkLogin'])->group(function(){

Route::get('/admin/dashboard',[AdminController::class,'dashboard']);

Route::get('/admin/profile/{admin_id}',[AdminController::class,'profile']);

Route::post('/admin/update_profile',[AdminController::class,'update_profile']);

Route::get('/admin/logout',[AdminController::class,'logout']);

Route::get('/admin/banners',[AdminController::class,'banners']);

Route::get('/admin/addBanner',[AdminController::class,'addBanner']);

Route::post('updateBannerOrder',[AdminController::class,'updateBannerOrder']);

Route::post('/admin/insertBanner',[AdminController::class,'insertBanner']);

Route::get('/admin/update_status/{id}/{table}',[AdminController::class,'update_status']);

Route::get('/admin/delete/{id}/{table}',[AdminController::class,'delete']);
//destination
Route::get('/admin/destination',[DestinationController::class,'destination']);
Route::get('/admin/addDistination',[DestinationController::class,'addDistination']);
Route::post('/admin/insertdestination',[DestinationController::class,'insertdestination']);
Route::get('/admin/destinationimage',[DestinationController::class,'destinationimage']);
Route::get('/admin/adddestinationimage',[DestinationController::class,'adddestinationimage']);
Route::post('/admin/insertdestinationimage',[DestinationController::class,'insertdestinationimage']);

Route::get('/admin/magazine',[MagazineController::class,'magazine']);
Route::get('/admin/addMagazine',[MagazineController::class,'addMagazine']);
Route::post('/admin/insert_magazine',[MagazineController::class,'insert_magazine']);
Route::post('/admin/delete_magazine',[MagazineController::class,'delete_magazine']);
Route::post('/admin/change_magazine_status',[MagazineController::class,'change_magazine_status']);
Route::post('/admin/addhomemagazine',[MagazineController::class,'addhomemagazine']);
Route::post('/admin/addbannermagazine',[MagazineController::class,'addbannermagazine']);
});
