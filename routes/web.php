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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::resource('focalPeople', 'FocalPersonController');

Route::resource('agencyTypes', 'AgencyTypeController');

Route::resource('agencies', 'AgencyController');

Route::resource('units', 'UnitController');

Route::resource('items', 'ItemController');

Route::resource('locations', 'LocationController');

Route::resource('stockTypes', 'StockTypeController');

Route::resource('stockStatuses', 'StockStatusesController');