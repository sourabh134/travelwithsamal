<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\TreatmeantController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\PatientContactController;
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
Route::get('/adminProfile',[AdminController::class,'adminProfile']);
Route::post('/updateAdmin',[AdminController::class,'updateAdmin']);
Route::get('/changPassword',[AdminController::class,'changPassword']);
Route::post('/savePassword',[AdminController::class,'savePassword']);
Route::get('/logout',[AdminController::class,'logout']);

Route::get('/specialization',[SpecializationController::class,'specialization']);
Route::get('/addSpecialization',[SpecializationController::class,'addSpecialization']);
Route::post('/insert_specialization',[SpecializationController::class,'insert_specialization']);
Route::post('/delete_specialization',[SpecializationController::class,'delete_specialization']);
Route::get('/specialization_status',[SpecializationController::class,'specialization_status']);

Route::get('/treatments',[TreatmeantController::class,'treatmeants']);
Route::get('/addTreatments',[TreatmeantController::class,'addTreatmeants']);
Route::post('/insert_treatmeants',[TreatmeantController::class,'insert_treatmeants']);
Route::post('/delete_treatmeants',[TreatmeantController::class,'delete_treatmeants']);
Route::get('/treatmeant_status',[TreatmeantController::class,'treatmeant_status']);

Route::get('/hospitals',[HospitalController::class,'hospital']);
Route::get('/addHospital',[HospitalController::class,'addHospital']);
Route::post('/insert_hospital',[HospitalController::class,'insert_hospital']);
Route::post('/delete_hospital',[HospitalController::class,'delete_hospital']);
Route::post('/getState',[HospitalController::class,'getState']);
Route::post('/getCity',[HospitalController::class,'getCity']);
Route::post('/insert_hospital',[HospitalController::class,'insert_hospital']);
Route::get('/hosp_status',[HospitalController::class,'hosp_status']);
Route::get('/hospitalDetail',[HospitalController::class,'hospitalDetail']);
Route::post('/delete_hospitalImage',[HospitalController::class,'delete_hospitalImage']);

Route::get('/doctors',[DoctorController::class,'doctors']);
Route::get('/addDoctor',[DoctorController::class,'addDoctor']);
Route::post('/insert_doctor',[DoctorController::class,'insert_doctor']);
Route::get('/doctor_status',[DoctorController::class,'doctor_status']);
Route::post('/delete_doctor',[DoctorController::class,'delete_doctor']);
Route::get('/doctorDetail',[DoctorController::class,'doctorDetail']);

Route::get('/tearmCondition',[Controller::class,'tearmCondition']);
Route::post('/saveTearmCondition',[Controller::class,'saveTearmCondition']);
Route::get('/privacyPolicy',[Controller::class,'privacyPolicy']);
Route::post('/savePrivacyPolicy',[Controller::class,'savePrivacyPolicy']);

Route::get('/blogs',[BlogController::class,'blogs']);
Route::get('/addBlog',[BlogController::class,'addBlog']);
Route::post('/insert_blog',[BlogController::class,'insert_blog']);
Route::get('/blog_status',[BlogController::class,'blog_status']);
Route::get('/blogDetail',[BlogController::class,'blogDetail']);
Route::post('/delete_blog',[BlogController::class,'delete_blog']);

Route::get('/patients',[UserController::class,'patients']);
Route::get('/patientsDetail',[UserController::class,'patientsDetail']);
Route::get('/patients_status',[UserController::class,'patients_status']);
Route::post('/delete_patient',[UserController::class,'delete_patient']);

Route::get('/complaints',[ComplaintController::class,'complaints']);
Route::get('/complaint_status',[ComplaintController::class,'complaint_status']);
Route::post('/delete_complaint',[ComplaintController::class,'delete_complaint']);
Route::get('/complaintDetail',[ComplaintController::class,'complaintDetail']);

Route::get('/testimonials',[TestimonialController::class,'testimonials']);
Route::get('/addTestimonial',[TestimonialController::class,'addTestimonial']);
Route::post('/insert_testimonials',[TestimonialController::class,'insert_testimonials']);
Route::get('/testimonial_status',[TestimonialController::class,'testimonial_status']);
Route::post('/delete_testimonial',[TestimonialController::class,'delete_testimonial']);
Route::get('/testimonialDetail',[TestimonialController::class,'testimonialDetail']);

Route::get('/patientContact',[PatientContactController::class,'patientContact']);
Route::get('/patientcontact_status',[PatientContactController::class,'patientcontact_status']);
Route::post('/delete_patientcontact',[PatientContactController::class,'delete_patientcontact']);
Route::get('/patientcontactDetail',[PatientContactController::class,'patientcontactDetail']);

Route::get('/Notification',[NotificationController::class,'Notification']);
Route::get('/addNotification',[NotificationController::class,'addNotification']);
Route::post('/insert_notification',[NotificationController::class,'insert_notification']);
Route::post('/filterUserType',[NotificationController::class,'filterUserType']);
Route::get('/notification_status',[NotificationController::class,'notification_status']);
Route::post('/delete_notification',[NotificationController::class,'delete_notification']);
Route::get('/notificationDetail',[NotificationController::class,'notificationDetail']);
});