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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/animal/index', 'AnimalController@index');
Route::get('/animal/getAll', 'AnimalController@getAll')->name('animalgetAll');
Route::get('/animal/add', 'AnimalController@add');
Route::post('/animal/persist', 'AnimalController@persist');
Route::get('/animal/persist', 'AnimalController@persist');
Route::post('/animal/update', 'AnimalController@update');
Route::get('/animal/get/{id}', 'AnimalController@get')->name('animalget');
Route::get('/animal/delete/{id}', 'AnimalController@delete')->name('animaldelete');

Route::get('/veto/index', 'VetoController@index');
Route::get('/veto/getAll', 'VetoController@getAll');
Route::get('/veto/add', 'VetoController@add');
Route::post('/veto/persist', 'VetoController@persist');
Route::post('/veto/update', 'VetoController@update');
Route::get('/veto/get/{id}', 'VetoController@get')->name('vetoget');
Route::get('/veto/delete/{id}', 'VetoController@delete')->name('vetodelete');

Route::get('/consultation/index', 'ConsultationController@index');
Route::get('/consultation/getAll', 'ConsultationController@getAll');
Route::get('/consultation/add', 'ConsultationController@add');
Route::post('/consultation/persist', 'ConsultationController@persist');
Route::post('/consultation/update', 'ConsultationController@update');
Route::get('/consultation/get/{id}', 'ConsultationController@get')->name('consultationget');
Route::get('/consultation/delete/{id}', 'ConsultationController@delete')->name('consultationdelete');
