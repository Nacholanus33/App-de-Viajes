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


Route::get('/', 'HomeController@index')->name('home');
Route::post('/trip_requests', 'Trip_requestsController@store');
Auth::routes();
Route::get('/perfil','UsersController@index')->name('perfil');
Route::patch('/perfil_edit','UsersController@update');
Route::post('/perfil_edit','UsersController@edit');
