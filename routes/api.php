<?php

use Illuminate\Http\Request;

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

Route::get('vehicles', 'VehiclesController@index');
Route::group([
    'prefix' => 'vehicle',
], function () {
    Route::post('addVehicle', 'VehiclesController@add');
    Route::get('edit/{id}', 'VehiclesController@edit');
    Route::post('update/{id}', 'VehiclesController@update');
    Route::delete('delete/{id}', 'VehiclesController@delete');
});

Route::get('drivers', 'DriversController@index');
Route::group([
    'prefix' => 'driver',
], function () {
    Route::post('addDriver', 'DriversController@add');
    Route::get('edit/{id}', 'DriversController@edit');
    Route::post('update/{id}', 'DriversController@update');
    Route::delete('delete/{id}', 'DriversController@delete');
});

Route::get('fuels', 'FuelsController@index');
Route::group([
    'prefix' => 'fuel'], 
    function () {
    Route::post('add', 'FuelsController@add');
    Route::get('edit/{id}', 'FuelsController@edit');
    Route::post('update/{id}', 'FuelsController@update');
    Route::delete('delete/{id}', 'FuelsController@delete');
});

Route::get('vales', 'ValeController@getArray');