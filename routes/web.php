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

Route::get('/','EmployeeController@index');
Route::get('/about','PagesController@getAbout');
Route::get('/contact','PagesController@getContact');

Route::get('/huisartsen','HuisartsController@index')->name('huisartsen.index');
Route::get('/huisartsen/toevoegen', 'HuisartsController@create')->name('huisartsen.create');

Route::post('/contact/submit', 'MessagesController@submit');
Route::post('/huisarts/submit', 'HuisartsController@store')->name('huisarts.store');
Route::resource('werknemers', 'EmployeeController', ['names' => 'werknemers']);
Route::get('werknemer/{id}', 'EmployeeController@getEmployee')->name("werknemer.show");
Route::post('werknemer/inplannen', 'EmployeeController@inplannen')->name("werknemer.inplannen");

Route::get('beschikbaar', 'WorkforceController@getAvailableEmployees')->name('werknemers.beschikbaar');
