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

Route::get('/', '\App\Http\Controllers\DonationsController@index');
//Route::resource('donations', '\App\Http\Controllers\DonationsController');
Route::get('/create', '\App\Http\Controllers\DonationsController@create');
Route::post('/store', '\App\Http\Controllers\DonationsController@store');
Route::get('/apply/{id}', '\App\Http\Controllers\DonationsController@show');
Route::post('/updateResolved/{id}', '\App\Http\Controllers\DonationsController@updateResolved');



Route::resource('requests', '\App\Http\Controllers\RequestsController');

Auth::routes();

Route::get('/donations', '\App\Http\Controllers\DonationsController@showForUser');
