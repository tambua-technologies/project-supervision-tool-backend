<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/locations/regions', 'LocationAPIController@regions');

Route::get('/locations/districts/{region_id}', 'LocationAPIController@districts');

Route::resource('focal_people', 'FocalPersonAPIController');

Route::resource('implementing_partners', 'ImplementingPartnerAPIController');

Route::resource('actors', 'ActorAPIController');

Route::resource('units', 'UnitAPIController');

Route::resource('hr_types', 'HRTypeAPIController');

Route::resource('locations', 'LocationAPIController');


Route::resource('stock_types', 'StockTypeAPIController');

Route::resource('stock_statuses', 'StockStatusesAPIController');

Route::resource('stock_groups', 'StockGroupAPIController');

Route::resource('stock_group_clusters', 'StockGroupClusterAPIController');

Route::resource('emergency_response_themes', 'EmergencyResponseThemeAPIController');

Route::resource('stocks', 'StockAPIController');


Route::resource('human_resources', 'HumanResourceAPIController');


Route::resource('initiatives', 'InitiativeAPIController');