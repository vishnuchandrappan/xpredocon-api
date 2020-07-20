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


Route::group(['prefix' => 'api'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/forgot-password', 'AuthController@forgot');
});

Route::group([
    'prefix' => 'api',
    'middleware' => 'auth'
], function () {
    Route::post('/logout', 'AuthController@logout');
    Route::get('/me', 'AuthController@me');
    Route::post('/refresh', 'AuthController@refresh');
});


Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index');
    Route::post('/', 'UserController@create');
    Route::get('/{id}', 'UserController@show');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@destroy');
});

Route::group(['prefix' => 'doctors'], function () {
    Route::get('/', 'DoctorController@index');
    Route::post('/', 'DoctorController@create');
    Route::get('/{id}', 'DoctorController@show');
    Route::put('/{id}', 'DoctorController@update');
    Route::delete('/{id}', 'DoctorController@destroy');
});

Route::group(['prefix' => 'diseases'], function () {
    Route::get('/', 'DiseasesController@index');
    Route::post('/', 'DiseasesController@create');
    Route::get('/{id}', 'DiseasesController@show');
    Route::put('/{id}', 'DiseasesController@update');
    Route::delete('/{id}', 'DiseasesController@destroy');
});

Route::group(['prefix' => 'symptoms'], function () {
    Route::get('/', 'SymptomsController@index');
    Route::post('/', 'SymptomsController@create');
    Route::get('/{id}', 'SymptomsController@show');
    Route::put('/{id}', 'SymptomsController@update');
    Route::delete('/{id}', 'SymptomsController@destroy');
});
