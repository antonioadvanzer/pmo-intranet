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

Route::get('/login', ['as' => 'login', 'uses' => 'MainController@pmo_getLoginView']);

Route::get('/', ['as' => 'company', 'uses' => 'MainController@index']);

Route::get('/companies', ['as' => 'company', 'uses' => 'MainController@pmo_getCompaniesView']);

Route::get('/advanzer', ['as' => 'ad', 'uses' => 'MainController@pmo_getMenuAdvanzerView']);
Route::get('/entuizer', ['as' => 'en', 'uses' => 'MainController@pmo_getMenuEntuizerView']);

Route::get('/advanzer/projects', ['as' => 'projectsA', 'uses' => 'MainController@pmo_getMenuProjectsAdvanzerView']);
Route::get('/advanzer/projects/project', ['as' => 'project', 'uses' => 'MainController@pmo_getMenuProjectAdvanzerView']);

Route::get('/entuizer/projects', ['as' => 'projectsE', 'uses' => 'MainController@pmo_getMenuProjectsEntuizerView']);