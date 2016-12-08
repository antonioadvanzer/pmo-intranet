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

    // Access to pmo web, only for customers
    Route::group(['prefix' => 'pmo-web', 'middleware' => 'advent.client'], function(){

        Route::get('/{company}/{slug}', ['as' => 'pmo', 'uses' => 'MainController@pmo_getPMOWeb']);

    });

    // Access to folder and files depending of their permissions
    Route::group(['middleware' => 'advent.employed'], function(){

        /*Route::get('/first', function () {
            return view('construction');
        });*/

        Route::get('/companies', ['as' => 'company', 'uses' => 'MainController@pmo_getCompaniesView']);

        //Route::get('/advanzer', ['as' => 'ad', 'uses' => 'MainController@pmo_getMenuAdvanzerView']);
        //Route::get('/entuizer', ['as' => 'en', 'uses' => 'MainController@pmo_getMenuEntuizerView']);

        // ---- Level 1 : Get view with business unit resources Advanzer/Entuizer
        Route::get('/{company}/businessUnit', ['as' => 'bu', 'uses' => 'MainController@pmo_getMenuBusinessUnitView']);

        Route::get('/{company}/{businessunit}/attribute/{attribute}', ['as' => 'projects', 'uses' => 'MainController@pmo_getBusinessUnitAttribute']);

        //Route::get('/advanzer/projects', ['as' => 'projectsA', 'uses' => 'MainController@pmo_getMenuProjectsAdvanzerView']);
        //Route::get('/{company}/{businessunit}/{category}/projects', ['as' => 'projects', 'uses' => 'MainController@pmo_getMenuProjectsView']);
        Route::get('/{company}/{businessunit}/projects', ['as' => 'projects', 'uses' => 'MainController@pmo_getMenuProjectsView']);

        Route::get('/{company}/{businessunit}/{project}/attribute/{attribute}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProjectAttribute']);

        //Route::get('/advanzer/projects/project', ['as' => 'project', 'uses' => 'MainController@pmo_getMenuProjectAdvanzerView']);
        //Route::get('/entuizer/projects', ['as' => 'projectsE', 'uses' => 'MainController@pmo_getMenuProjectsEntuizerView']);
        //Route::get('/{company}/{businessunit}/{category}/{project}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProject']);
        Route::get('/{company}/{businessunit}/{project}', ['as' => 'projects', 'uses' => 'MainController@pmo_getProject']);

        // Secret route to get array list
        Route::post('foldersAndFiles', ['as' => 'dir', 'uses' => 'MainController@pmo_getFoldersAndFiles']);

    });

    //Access to dashboard admin
    Route::group(['prefix' => 'pmo-admin', 'middleware' => 'advent.admin'], function(){

        Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
        Route::get('/users', ['as' => 'users', 'uses' => 'AdminController@admin_getUsers']);

    });

});