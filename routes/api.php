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

Route::get('admins', 'ValesController@indexarray');
Route::get('vales', 'ValeController@indexarray');
Route::group(['prefix' => 'vale'], function () {
    Route::post('addAdmin', 'ValeController@addarray');
    Route::get('edit/{id}', 'ValeController@editarray');
    Route::post('update/{id}', 'ValeController@updatearray');
    Route::delete('delete/{id}', 'ValeController@deletearray');
});

Route::get('reports', 'ValeController@indexarray');
Route::group(['prefix' => 'vale'], function () {
    Route::get('edit/{id}', 'ValeController@editarray');
    Route::post('update/{id}', 'ValeController@updatearray');
    Route::delete('delete/{id}', 'ValeController@deletearray');
});

// API REQUESTS TO GET EXPENSES  TOTAL
Route::get('totalamount', 'ValeController@totalamount');

// FILTER REQUESTS
// VEHICLES
Route::get('getallvehicles', 'VehiclesController@getallVehicles');
Route::get('getvehicle/{registration_number}', 'VehiclesController@getVehicle');
// REQUEST FORMS
Route::get('getallrequests', 'ValeController@getallRequests');
Route::get('getstatus/{form_status}', 'ValeController@getStatus');
Route::get('requestbydate/{date}', 'ValeController@getRequestbyDate');
Route::get('getcustomer/{customer_name}', 'ValeController@getRequestbyCustomer');
Route::get('reportstotal', 'ValeController@getReportsTotal');
Route::get('reportsvehicle/{plate_number}', 'ValeController@getVehicleReports');

/** MONTHLY EXPENSES CHART */
Route::get('january', 'ValeController@JanuaryExpense');
Route::get('february', 'ValeController@FebruaryExpense');
Route::get('march', 'ValeController@MarchExpense');
Route::get('april', 'ValeController@AprilExpense');
Route::get('may', 'ValeController@MayExpense');
Route::get('june', 'ValeController@JuneExpense');
Route::get('july', 'ValeController@JulyExpense');
Route::get('august', 'ValeController@AugustExpense');
Route::get('september', 'ValeController@SeptemberExpense');
Route::get('october', 'ValeController@OctoberExpense');
Route::get('november', 'ValeController@NovemberExpense');
Route::get('december', 'ValeController@DecemberExpense');

/** MONTHLY REQUESTS */
Route::get('janrequest', 'ValeController@JanRequests');
Route::get('febrequest', 'ValeController@FebRequests');
Route::get('marrequest', 'ValeController@MarRequests');
Route::get('aprrequest', 'ValeController@AprRequests');
Route::get('mayrequest', 'ValeController@MayRequests');
Route::get('junrequest', 'ValeController@JunRequests');
Route::get('julrequest', 'ValeController@JulRequests');
Route::get('augrequest', 'ValeController@AugRequests');
Route::get('seprequest', 'ValeController@SepRequests');
Route::get('octrequest', 'ValeController@OctRequests');
Route::get('novrequest', 'ValeController@NovRequests');
Route::get('decrequest', 'ValeController@DecRequests');
