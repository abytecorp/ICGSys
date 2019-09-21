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
///api/address/get-nomenclatures
Route::get('/api/address/get-nomenclatures', 'ApiController@getNomenclatures');
// get customers from api
Route::get('/api/get-customers','ApiController@getCustomers');
// get companies
Route::get('/api/get-companies-api','ApiController@getCompaniesApi');
// company by post
Route::post('/api/company','ApiController@companyStore');
// get company by id
Route::get('/api/{company}/get-company-by-id','ApiController@getCompanyById');
// new activity
Route::post('/api/store-new-activity','ApiController@storeNewActivity');
// get activities
Route::get('/api/get-activities', 'ApiController@getActivities');
// get positions
Route::get('/api/get-positions', 'ApiController@getPositions');
// new position
Route::post('/api/store-new-position','ApiController@storeNewPosition');
// new work xp
Route::post('/api/store-new-work-xp', 'ApiController@storeNewWorkXp');
// get work informatiopns by custyomer
Route::get('/api/{customer}/get-work-informations-by-customer','ApiController@getWorkInformationsByCustomer');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');

Route::get('/customers','CustomersController@index')->name('customers.index');
