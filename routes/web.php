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

//APÎ
//get cities
Route::get('/api/get-cities/','ApiController@getCities');
//get /api/${this.user.id}/get-study-credits-by-user`
Route::get('/api/{user}/get-study-credits-by-user', 'ApiController@getStudyCreditsByUser');
///api/get-id-types
Route::get('/api/get-id-types', 'ApiController@getIdTypes');
///api/assistants-external
Route::post('/api/assistants-external', 'ApiController@customersNew');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');

Route::get('/customers','CustomersController@index')->name('customers.index');
