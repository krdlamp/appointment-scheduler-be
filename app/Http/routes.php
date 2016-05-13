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

Route::get('/', function() {
    return view('index');
});

Route::group(['prefix' => 'api'], function () {
    Route::resource('/agendas', 'v1\AgendasController');
    Route::resource('/employees', 'v1\EmployeesController');
    Route::resource('/departments', 'v1\DepartmentsController');
    Route::resource('/positions', 'v1\PositionsController');
    Route::resource('/levels', 'v1\LevelsController');

    Route::resource('/appointments', 'v1\AppointmentsController');
    Route::resource('/appointment-status', 'v1\AppointmentStatusController');

    Route::resource('/authenticate', 'v1\AuthenticateController',
        ['only' => ['index']]);
    Route::post('/authenticate', 'v1\AuthenticateController@authenticate');
    Route::get('/authenticate/user', 'v1\AuthenticateController@getAuthenticatedUser');
});
