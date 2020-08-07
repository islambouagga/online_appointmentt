<?php

use App\Doctor;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/about', function () {
    return view('about');
})->name('about');
//Route::get('/doctors', function () use ($dcotors) {
//    return view('doctors')->with('dcotors',$dcotors);
//})->name('doctors');

Auth::routes();

Route::get('/dashbord', 'HomeController@index')->name('home');


Route::resource('/establishment', 'Admin\EstablishmentController');
Route::resource('/doctor', 'Admin\DoctorController');
Route::get('/bedoctor','Admin\DoctorController@bedoctor')->name('bedoctor');
Route::patch('rateDoc/{doctor}','Admin\DoctorController@rateDoc')->name('rateDoc');
Route::resource('/patient', 'Admin\PatientController');
Route::resource('/appointment', 'Admin\AppointmentController');
Route::get('/getappointments/{id}','Admin\AppointmentController@getappointments');
Route::post('/postappointment','Admin\AppointmentController@postappointment');
Route::get('/appointment/getdays/{id}/{day}','Admin\AppointmentController@getdays');

Route::get('myappointment','Admin\AppointmentController@myappointment');
