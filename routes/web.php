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


Route::get('/flight', 'FlightController@index');
Route::get('/flights', 'FlightController@index');

Route::get('/about',function () {
    $nama = "Hello";
    return view('about',compact('nama'));
});

Route::get('/flights', function () {
    return view('insert');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/loginprocess','Auth\LoginController@loginproses')->name('loginproses');
//insert data
Route::get('/register','Auth\RegisterController@register')->name('register');
Route::get('/flight','FlightController@index')->name('flight');//dekat name untuk route yang terletak di blade.php
//edit
Route::post('/flight','FlightController@store')->name('store');//dekat name untuk route yang terletak di blade.php
Route::get('/flight/edit/{id}','FlightController@edit')->name('edit');
Route::post('/flight/edit/{id}','FlightController@update')->name('update');

//delete
Route::get('delete-records','FlightController@index');
Route::get('delete/{id}','FlightController@destroy');

Route::get('/booking','BookingController@index')->name('booking');
Route::post('/loginprocess','BookingController@store')->name('stored');

//insert data customer
Route::get('/customer','CustomerController@index')->name('customer');
Route::post('/customers','CustomerController@store')->name('stores');

//insert data flight
Route::post('/customers/flight','BookingController@store_flight')->name('store_flight');
