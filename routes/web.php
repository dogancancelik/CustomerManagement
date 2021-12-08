<?php

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


Route::get('/customers', 'CustomerController@index')->name('customer.list');

Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer/create', 'CustomerController@store')->name('customer.store');

Route::get('/customer/{customerId}/edit', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer/{customerId}/edit', 'CustomerController@update')->name('customer.update');

Route::get('/customer/{customerId}/delete', 'CustomerController@destroy')->name('customer.destroy');
