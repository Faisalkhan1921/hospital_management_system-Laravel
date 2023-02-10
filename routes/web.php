<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class,'index']);

Route::get('/home', [HomeController::class,'redirect'])->middleware('auth','verified');

// add-doctors-view
Route::get('/add_doctors_view', [AdminController::class,'addview']);
Route::post('/upload_doctor', [AdminController::class,'upload_doctor']);

// appointment 
Route::post('/appointment', [HomeController::class,'appointment']);
// show appointment
Route::get('myappointment',[HomeController::class,'myappointment']);
// cancel appointemnt
Route::get('/cancel_appointment/{id}',[HomeController::class,'cancel_appointment']);

//show appointment in admin page
Route::get('/showappointment',[AdminController::class,'showappointmnet']);
// approve appointment 
Route::get('/approve/{id}',[AdminController::class,'approve']);
// cancell appointment
Route::get('/canceled/{id}',[AdminController::class,'canceled']);

// display doctors 
Route::get("/displaydoctors", [AdminController::class,'displaydoctors']);
// remove doctor 
Route::get('/removedoctor/{id}', [AdminController::class,'removedoctor']);

// updatedoctorview
Route::get('/Updatedoctorview/{id}', [AdminController::class,'Updatedoctorview']);
// edit doctor 
Route::post('/editdoctor/{id}', [AdminController::class,'editdoctor']);
// send mail view 
Route::get('/sendmailview/{id}',[AdminController::class,'sendmailview']);
// sending email 
Route::post('/sendemail/{id}', [AdminController::class,'sendemail']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
