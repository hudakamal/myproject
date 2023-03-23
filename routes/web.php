<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/invoice', function () {
    return view('invoice');
});


Route::get('/flight', 'FlightController@index');
Route::get('/flights', 'FlightController@index');

Route::get('/flights', function () {
    return view('insert');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//insert data
Route::get('/flight','FlightController@index')->name('flight');//dekat name untuk route yang terletak di blade.php
//edit
Route::post('/flight','FlightController@store')->name('store');//dekat name untuk route yang terletak di blade.php
Route::get('/flight/edit/{id}','FlightController@edit')->name('edit');
Route::post('/flight/edit/{id}','FlightController@update')->name('update');

//delete
Route::get('delete-records','FlightController@index');
Route::get('delete/{id}','FlightController@destroy');

Route::get('/booking','BookingController@index')->name('booking');
Route::post('/booking','BookingController@store')->name('stored');

//insert data customer
Route::get('/customer','CustomerController@index')->name('customer');
Route::post('/customer','CustomerController@store')->name('customer.store');

//insert data flight
Route::post('/customers/flight','BookingController@store_flight')->name('store_flight');

//display data
Route::get('/display/{id}','InvoiceController@display')->name('invoice');

//history data
Route::get('/history','HistoryController@index')->name('history');

//show user profile
Route::match(['get', 'post'], '/profile', 'ProfileController@index')->name('profile');
