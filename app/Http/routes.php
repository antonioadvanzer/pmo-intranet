<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('construction');
});*/

Route::group(['middleware' => 'advent.unknown'], function(){
    // Get login form
    Route::get('/login', ['as' => 'login', 'uses' => 'MainController@pmo_getLoginView']);
    // Do log in
    Route::post('/login', ['as' => 'startsession', 'uses' => 'MainController@pmo_startSession']);
});

// Web site
Route::group(['middleware' => 'advent.partner'], function(){

    // Do log out
    Route::get('/logout', ['as' => 'closesession', 'uses' => 'MainController@pmo_closeSession']);

    Route::get('/', ['as' => 'index', 'uses' => 'MainController@index']);

    /*Route::get('/', function () {

    });*/

     //Access to dashboard admin
    Route::group(['prefix' => 'pmo-admin', 'middleware' => 'advent.admin'], function(){

        Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
        
        // Users managment
        Route::get('/users', ['as' => 'users', 'uses' => 'AdminController@admin_getUsers']);
        Route::get('/newUser', ['as' => 'users', 'uses' => 'AdminController@admin_getFormNewUser']);
        Route::post('/saveNewUser', ['as' => 'users', 'uses' => 'AdminController@admin_storeNewUser']);
        Route::get('/showUser/{id}', ['as' => 'users', 'uses' => 'AdminController@admin_showUser']);
        Route::get('/editUser/{id}', ['as' => 'users', 'uses' => 'AdminController@admin_editUser']);
        Route::post('/updateUser/{id}', ['as' => 'users', 'uses' => 'AdminController@admin_updateUser']);

        // Roles and permissions managment
        Route::get('/roles', ['as' => 'roles', 'uses' => 'AdminController@admin_getRoles']);
        Route::get('/newRol', ['as' => 'roles', 'uses' => 'AdminController@admin_getFormNewRol']);
        Route::post('/saveNewRol', ['as' => 'roles', 'uses' => 'AdminController@admin_storeNewRol']);
        Route::get('/showRol/{id}', ['as' => 'roles', 'uses' => 'AdminController@admin_showRol']);

        // Business Units managment
        Route::get('/business_units', ['as' => 'businesunit', 'uses' => 'AdminController@admin_getBusinesUnit']);
        Route::get('/newBusinessUnit', ['as' => 'businesunit', 'uses' => 'AdminController@admin_getFormNewBusinessUnit']);
        Route::post('/saveNewBusinessUnit', ['as' => 'businesunit', 'uses' => 'AdminController@admin_storeNewBusinessUnit']);
        Route::get('/business_units_attributes', ['as' => 'businesunitAttr', 'uses' => 'AdminController@admin_getBusinesUnitAttributes']);
        Route::get('/newBusinessUnitAttribute', ['as' => 'businesunitAttr', 'uses' => 'AdminController@admin_getFormNewBusinessUnitAttribute']);
        Route::post('/saveNewBusinessUnitAttribute', ['as' => 'businesunitAttr', 'uses' => 'AdminController@admin_storeNewBusinessUnitAttribute']);
        Route::get('/showBusinessUnit/{id}', ['as' => 'businesunitAttr', 'uses' => 'AdminController@admin_showBusinessUnit']);
        Route::get('/editBusinessUnit/{id}', ['as' => 'businesunit', 'uses' => 'AdminController@admin_editBusinessUnit']);
        Route::post('/updateBusinessUnit/{id}', ['as' => 'businesunit', 'uses' => 'AdminController@admin_updateBusinessUnit']);

        // Projects managment
        Route::get('/projects', ['as' => 'project', 'uses' => 'AdminController@admin_getProjects']);
        Route::get('/newProject', ['as' => 'project', 'uses' => 'AdminController@admin_getFormNewProject']);
        Route::post('/saveNewProject', ['as' => 'project', 'uses' => 'AdminController@admin_storeNewProject']);
        Route::get('/projects_attributes', ['as' => 'projectsAttr', 'uses' => 'AdminController@admin_getprojectsAttributes']);
        Route::get('/newProjectAttribute', ['as' => 'projectAttr', 'uses' => 'AdminController@admin_getFormNewProjectAttribute']);
        Route::post('/saveNewProjectAttribute', ['as' => 'projectAttr', 'uses' => 'AdminController@admin_storeNewProjectAttribute']);
        Route::get('/showProject/{id}', ['as' => 'projectAttr', 'uses' => 'AdminController@admin_showProject']);

        // PMO's Templeates
        Route::get('/pmo_templates', ['as' => 'pmoTempleate', 'uses' => 'AdminController@admin_getPMOTemplate']);
        Route::get('/newPMOTemplate', ['as' => 'pmoTempleate', 'uses' => 'AdminController@admin_getFormNewPMO']);
        Route::post('/saveNewPMOTemplate', ['as' => 'pmoTempleate', 'uses' => 'AdminController@admin_storeNewPMOTemplate']);
        Route::get('/showPMO/{id}', ['as' => 'pmoTempleate', 'uses' => 'AdminController@admin_showPMOTemplate']);

        // Helpers
        Route::post('/get_companies', ['as' => 'com', 'uses' => 'AdminController@admin_getCompanies']);
        Route::post('/get_business_units', ['as' => 'bu', 'uses' => 'AdminController@admin_getArrayBusinessUnits']);
        Route::post('/get_projects', ['as' => 'pro', 'uses' => 'AdminController@admin_getArrayProjects']);
        
    });

    // Access to pmo web, only for customers
    Route::group(['prefix' => 'pmo-web', 'middleware' => 'advent.client'], function(){

        Route::get('/{company}/{slug}', ['as' => 'pmo', 'uses' => 'MainController@pmo_getPMOWeb']);

    });

    // Access to folder and files depending of their permissions
    Route::group(['middleware' => 'advent.employed'], function(){

        /*Route::get('/first', function () {
            return view('construction');
        });*/

        Route::get('/cannotAccess', ['as' => 'access', 'uses' => 'MainController@pmo_getCannotAccess']);

        Route::get('/companies', ['as' => 'company', 'uses' => 'MainController@pmo_getCompaniesView']);

        //Route::get('/advanzer', ['as' => 'ad', 'uses' => 'MainController@pmo_getMenuAdvanzerView']);
        //Route::get('/entuizer', ['as' => 'en', 'uses' => 'MainController@pmo_getMenuEntuizerView']);

        // ---- Level 1 : Get view with business unit resources Advanzer/Entuizer
        Route::get('/{company}/businessunit', ['as' => 'bu', 'uses' => 'MainController@pmo_getMenuBusinessUnitView']);

        Route::get('/{company}/{businessunit}/attribute/{attribute}', ['as' => 'projects', 'uses' => 'MainController@pmo_getBusinessUnitAttribute']);

        //Route::get('/advanzer/projects', ['as' => 'projectsA', 'uses' => 'MainController@pmo_getMenuProjectsAdvanzerView']);
        //Route::get('/{company}/{businessunit}/{category}/projects', ['as' => 'projects', 'uses' => 'MainController@pmo_getMenuProjectsView']);
        Route::get('/{company}/{businessunit}/projects', ['as' => 'projects', 'uses' => 'MainController@pmo_getMenuProjectsView']);

        Route::get('/{company}/{businessunit}/{project}/attribute/{attribute}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProjectAttribute']);

        //Route::get('/advanzer/projects/project', ['as' => 'project', 'uses' => 'MainController@pmo_getMenuProjectAdvanzerView']);
        //Route::get('/entuizer/projects', ['as' => 'projectsE', 'uses' => 'MainController@pmo_getMenuProjectsEntuizerView']);
        //Route::get('/{company}/{businessunit}/{category}/{project}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProject']);
        Route::get('/{company}/{businessunit}/{project}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProject']);


    });

    // Secret route to get array list
    Route::post('foldersAndFiles', ['as' => 'dir', 'uses' => 'MainController@pmo_getFoldersAndFiles']);

});