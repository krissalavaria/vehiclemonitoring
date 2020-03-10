<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Datatables Testing
Route::get('/users', 'UsersController@getUsers');
Route::delete('/users/{user}/delete', 'UsersController@deleteUser');

// View Composer to pass Data on all Views
View::composer(['*'], function($view) {
  $vales = App\Vale::orderBy('created_at', 'DESC')->paginate(5);
  $view->with('vales', $vales);
});

// Admin Routes
Route::get('admin', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

//Authentication Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

// API ROUTES
Route::get('{any}', function () {
  return view('vehicles.vehiclemain');
})->where('any', '.*')->middleware('is_admin');

Route::get('{any}', function () {
  return view('drivers.drivermain');
})->where('any', '.*')->middleware('is_admin');

Route::get('{any}', function () {
  return view('fuels.fuelmain');
})->where('any', '.*')->middleware('is_admin');
