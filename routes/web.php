<?php

use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', 'FieldController@index')->name('home');
Route::get('/home', 'FieldController@index')->name('home');

// Location
Route::get('/new_location', 'FieldController@create_location_page')->middleware('user:admin');
Route::get('/view_location/{id}', 'FieldController@view_fieldbycategory');
Route::post('/create_location', 'FieldController@create_location')->middleware('user:admin');
Route::delete('/delete_location/{id}', 'FieldController@delete_location')->middleware('user:admin');

// Field
Route::get('/new_field', 'FieldController@create_field_page')->middleware('user:admin');
Route::get('/field/{id}', 'FieldController@view_field_page');
Route::post('/create_field', 'FieldController@create_field')->middleware('user:admin');
Route::delete('/delete_field/{id}', 'FieldController@delete_field')->middleware('user:admin');

// Schedule
Route::get('/new_schedule/{id}', 'ScheduleController@create_schedule_page')->middleware('user:admin');
Route::get('/view_schedule/{id}', 'ScheduleController@view_schedule_page');
Route::post('/create_schedule', 'ScheduleController@create_schedule')->middleware('user:admin');
Route::delete('/delete_schedule/{id}', 'ScheduleController@delete_schedule')->middleware('user:admin');

// Booking
Route::get('/view_booking_page/{id}', 'BookingController@view_booking_page');
Route::post('/create_booking', 'BookingController@create_booking');

// Payment
Route::get('/new_payment', 'PaymentController@create_payment_page')->middleware('user:admin');
Route::post('/create_payment_method', 'PaymentController@create_payment_method')->middleware('user:admin');
Route::post('/create_payment', 'PaymentController@create_payment');
Route::get('/view_payment', 'PaymentController@view_payment');

// Update Profile
Route::get('/updateProfile/{id}', 'UserController@updateProfile');
Route::PUT('/updateProfile/{id}', 'UserController@logicUpdateProfile');
Route::get('change-password', 'UserController@index');
Route::post('change-password', 'UserController@store');

Route::get('/search', 'FieldController@search')->name('search');