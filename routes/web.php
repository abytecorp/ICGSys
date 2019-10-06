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
//get city by id
Route::get('/api/{city_id}/get-city-by-id','ApiController@getCityById');
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
// get work information by id
Route::get('/api/{work_information}/get-work-information-by-id','ApiController@getWorkInformationById');
//store credit study
Route::post('/api/store-credit-study','ApiController@storeCreditStudy');
///api/store-work-exp-by-credit-study
Route::post('/api/store-work-exp-by-credit-study', 'ApiController@storeWorkExpByCreditStudy');
//api/get-id-types
Route::get('/api/get-only-ids','ApiController@getOnlyIds');
//get cuystomer by id
Route::get('/api/{customer}/get-customer-by-id','ApiController@GetCustomerById');
//get crerdit studies by user
Route::get('/api/{customer}/get-credit-studies-by-customer','ApiController@getCreditStudiesByCustomer');
//get work informations by cutomeri d
Route::get('/api/{customer_id}/get-work-informations-by-customer-id', 'ApiController@getWorkInformationsByCustomerId');
//get only nits
Route::get('/api/get-only-nits','ApiController@getOnlyNits');

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');

Route::get('/customers','CustomersController@index')->name('customers.index');

            //Users
    Route::post('users/store', 'UserController@store')->name('users.store')
            ->middleware('permission_sh:users.create');

    Route::get('users', 'UserController@index')->name('users.index')
            ->middleware('permission_sh:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
            ->middleware('permission_sh:users.create');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
            ->middleware('permission_sh:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
            ->middleware('permission_sh:users.show');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
            ->middleware('permission_sh:users.edit');
    
    Route::put('/estado-usuario/{id}/{st}', 'UserController@estadoUsuario')->name('users.status')
            ->middleware('permission_sh:users.status');
