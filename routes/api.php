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


Route::post('/focal_people/login', 'FocalPersonAPIController@login');


// Public Routes
// TODO: figure out why cors happen when routes are in auth:api middleware
Route::middleware('auth:api')
    ->group(function () {


        // file uploading  routes
        Route::post('sub_projects/{subProject}/upload_photo', 'SubProjectFilesAPIController@upload');

        // Ticket(issues ) routes
        Route::post('projects/create_ticket', 'ProjectAPIController@createTicket');

        Route::get('/locations/regions', 'LocationAPIController@regions');
        Route::get('/locations/regions/projects_overview', 'LocationAPIController@projectsOverviewPerRegion');
        Route::get('/locations/regions/sub_projects_overview', 'LocationAPIController@subProjectsOverviewPerRegion');
        Route::get('/locations/districts/sub_projects_overview', 'LocationAPIController@subProjectsOverviewPerDistrict');
        Route::get('/locations/districts/{region_id}', 'LocationAPIController@districts');
        Route::get('/locations/region/{id}', 'LocationAPIController@getRegion');
        Route::get('/locations/region/{id}/project_statistics', 'LocationAPIController@project_statistics');
        Route::get('/locations/region/{id}/sub_project_statistics', 'LocationAPIController@sub_project_statistics');
        Route::get('/locations/regions/{region_id}/projects', 'LocationAPIController@getProjectsByRegion');
        Route::get('/locations/districts/{district_id}/sub_projects', 'LocationAPIController@getSubProjectsByDistrict');
        Route::get('/projects/statistics', 'ProjectAPIController@statistics');
        Route::get('/sub_projects/statistics', 'SubProjectAPIController@statistics');
        Route::get('/locations/sub_projects_overview_by_region/{region_id}', 'LocationAPIController@subProjectsOverViewByRegion');
        Route::get('/users/auth_user', 'UserAPIController@auth_user');
        Route::get('/users/{id}/assign_role/{role}', 'UserAPIController@assign_role');
        Route::post('/roles/assign_permission', 'RoleAPIController@assign_permission');

        // resource routes
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
        Route::resource('project_status', 'ProjectStatusAPIController');
        Route::resource('projects', 'ProjectAPIController');
        Route::resource('sub_projects', 'SubProjectAPIController');
        Route::resource('supervising_agencies', 'SupervisingAgencyAPIController');
        Route::resource('implementing_agencies', 'ImplementingAgencyAPIController');
        Route::resource('coordinating_agencies', 'CoordinatingAgencyAPIController');
        Route::resource('project_details', 'ProjectDetailsAPIController');
        Route::resource('currencies', 'CurrencyAPIController');
        Route::resource('money', 'MoneyAPIController');
        Route::resource('environmental_categories', 'EnvironmentalCategoryAPIController');
        Route::resource('borrowers', 'BorrowerAPIController');
        Route::resource('sectors', 'SectorAPIController');
        Route::resource('roles', 'RoleAPIController');
        Route::resource('permissions', 'PermissionAPIController');
        Route::resource('themes', 'ThemeAPIController');
        Route::resource('project_sectors', 'ProjectSectorsAPIController');
        Route::resource('project_themes', 'ProjectThemeAPIController');
        Route::resource('users', 'UserAPIController');
        Route::resource('phases', 'PhaseAPIController');
        Route::resource('contractors', 'ContractorAPIController');
        Route::resource('sub_project_details', 'SubProjectDetailAPIController');
        Route::resource('sub_project_items', 'SubProjectItemsAPIController');
        Route::resource('items', 'ItemAPIController');
        Route::resource('sub_project_equipments', 'SubProjectEquipmentAPIController');
        Route::resource('progress', 'ProgressAPIController');
        Route::resource('human_resources', 'HumanResourceAPIController');
        Route::resource('positions', 'PositionAPIController');
        Route::resource('sub_project_milestones', 'SubProjectMilestonesAPIController');
        Route::resource('contract_times', 'ContractTimeAPIController');
        Route::resource('contract_costs', 'ContractCostAPIController');
        Route::resource('sub_project_contracts', 'SubProjectContractAPIController');
        Route::resource('sub_project_surveys', 'SubProjectSurveyController');
        Route::resource('sub_project_types', 'SubProjectTypeAPIController');
        Route::resource('sub_project_status', 'SubProjectStatusAPIController');
        Route::resource('procuring_entity_packages', 'ProcuringEntityPackageAPIController');
        Route::resource('project_sub_components', 'ProjectSubComponentAPIController');
        Route::resource('project_components', 'ProjectComponentAPIController');
        Route::resource('procuring_entities', 'ProcuringEntityAPIController');
    });
