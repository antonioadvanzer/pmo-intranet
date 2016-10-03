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

Route::get('/', ['as' => 'company', 'uses' => 'MainController@index']);

Route::get('/companies', ['as' => 'company', 'uses' => 'MainController@companies']);
