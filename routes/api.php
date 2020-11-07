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
Route::post('/focal_people/login', 'FocalPersonAPIController@login');

Route::get('/locations/districts/{region_id}', 'LocationAPIController@districts');

Route::resource('focal_people', 'FocalPersonAPIController');

Route::resource('implementing_partners', 'ImplementingPartnerAPIController');

Route::resource('actors', 'ActorAPIController');

Route::resource('units', 'UnitAPIController');

Route::resource('locations', 'LocationAPIController');


Route::resource('stock_types', 'StockTypeAPIController');

Route::resource('stock_statuses', 'StockStatusesAPIController');

Route::resource('stock_groups', 'StockGroupAPIController');

Route::resource('stock_group_clusters', 'StockGroupClusterAPIController');

Route::resource('stocks', 'StockAPIController');


Route::resource('initiatives', 'InitiativeAPIController');

Route::resource('actor_types', 'ActorTypeAPIController');

Route::resource('initiative_types', 'InitiativeTypeAPIController');

Route::resource('funding_organisations', 'FundingOrganisationAPIController');


Route::resource('projects', 'ProjectAPIController');

Route::resource('sub_projects', 'SubProjectAPIController');


Route::resource('supervising_agencies', 'SupervisingAgencyAPIController');

Route::resource('implementing_agencies', 'ImplementingAgencyAPIController');

Route::resource('coordinating_agencies', 'CoordinatingAgencyAPIController');

Route::resource('project_details', 'ProjectDetailsAPIController');