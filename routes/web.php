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

Route::get('/about', function(){
	return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('vehicle', 'VehicleController');

Route::resource('media', 'MediaController');

Route::resource('brand', 'BrandController');
//Select2
Route::get('/select2Brand', 'BrandController@select2');

Route::resource('province', 'ProvinceController');
Route::resource('city', 'CityController');
Route::resource('district', 'DistrictController');
