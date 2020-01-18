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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add_product', 'Supplier\AddProductController@index')->name('add_product');
Route::post('/add_product', 'Supplier\AddProductController@submit_product')->name('add_product.submit');
Route::get('/send_to_company/{id}', 'HomeController@sendToCompany')->name('sendToCompany');

Route::prefix('company')->group(function(){
	Route::get('/', 'CompanyController@index')->name('company.dashboard');
	Route::get('/login', 'Auth\CompanyLoginController@showLoginForm')->name('company.login');
	Route::post('/login', 'Auth\CompanyLoginController@login')->name('company.login.submit');
	
	Route::get('/register', 'Auth\CompanyRegisterController@showRegistrationForm')->name('company.register');
	Route::post('/register', 'Auth\CompanyRegisterController@register')->name('company.register.submit');

	Route::get('/company_store/{id}', 'CompanyController@companyStore')->name('companyStore');
	Route::get('/store_delete/{id}', 'CompanyController@deleteFromStore')->name('store.delete');
});

