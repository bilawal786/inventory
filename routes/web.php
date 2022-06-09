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

Route::group(['middleware' => ['auth', 'web']], function() {
Route::get('/', 'HomeController@index')->name('index');
Route::get('/update/status/{value}/{id}', 'LeadController@updateStatus')->name('update.status');

Route::post('/advance/search', 'LeadController@advancesearch')->name('advance.search');

//category
Route::resource('/categories', 'CategoryController');
Route::get('category/delete/{id}', 'CategoryController@delete')->name('categories.delete');

//product
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/index', 'ProductController@index')->name('product.index');
Route::get('product/delete/{id}', 'ProductController@delete')->name('product.delete');
Route::post('product/store', 'ProductController@store')->name('product.store');
Route::get('product/edit/{id}', 'ProductController@edit' )->name('product.edit');
Route::get('product/update/{id}', 'ProductController@update' )->name('product.update');

//purchase
Route::get('purchase/create', 'PurchaseController@create')->name('purchase.create');
Route::get('purchase/index', 'PurchaseController@index')->name('purchase.index');
Route::get('purchase/edit/{id}', 'PurchaseController@edit')->name('purchase.edit');
Route::post('purchase/store', 'PurchaseController@store')->name('purchase.store');
Route::post('purchase/update/{id}', 'PurchaseController@update')->name('purchase.update');

//Supplier
Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
Route::get('supplier/index', 'SupplierController@index')->name('supplier.index');
Route::get('supplier/delete/{id}', 'SupplierController@delete')->name('supplier.delete');
Route::post('supplier/store', 'SupplierController@store')->name('supplier.store');
Route::get('supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
Route::post('supplier/update/{id}','SupplierController@update')->name('supplier.update');

//Customer 
Route::get('Customer/create' ,'CustomerController@create')->name('Customer.create');
Route::get('Customer/edit/{id}', 'CustomerController@edit')->name('Customer.edit');
Route::get('Customer/index', 'CustomerController@index')->name('Customer.index');
Route::post('Customer/store', 'CustomerController@store')->name('Customer.store');
Route::get('Customer/delete/{id}', 'CustomerController@delete')->name('Customer.delete');
Route::get('Customer/update/{id}', 'CustomerController@update')->name('Customer.update');
//Sales 
Route::get('Sales/create', 'SalesController@create')->name('Sales.create');
Route::get('Sales/store','SalesController@store')->name('Sales.store');
Route::get('Sales/index', 'SalesController@index')->name('Sales.index');
Route::get('Sales/delete/{id}','SalesController@delete')->name('Sales.delete');
//Ajex call
Route::get('ajax-request/{id}', 'AjaxController@create')->name('create');
Route::post('ajax-request', [AjaxController::class, 'store']);

Route::get('/profile', [
    'uses' => 'ProfileController@profile',
    'as' => 'profile'
]);

Route::post('/profile/Update', [
    'uses' => 'ProfileController@profile_update',
    'as' => 'profile.update'
]);

Route::get('/update-Password', [
    'uses' => 'ProfileController@password_change',
    'as' => 'change.password'
]);

Route::post('/update-password/store', [
    'uses' => 'ProfileController@password_update',
    'as' => 'update.password'
]);

Route::get('/apperance', [
    'uses' => 'HomeController@apperance',
    'as' => 'apperance'
]);

Route::post('/app/store', [
    'uses' => 'HomeController@app_update',
    'as' => 'app.update'
]);

Route::get('/lead', [
    'uses' => 'LeadController@index',
    'as' => 'lead.index'
]);

Route::get('/lead/create', [
    'uses' => 'LeadController@create',
    'as' => 'lead.create'
]);

Route::post('/lead/store', [
    'uses' => 'LeadController@store',
    'as' => 'lead.store'
]);

Route::get('/lead/delete/{id}', [
    'uses' => 'LeadController@delete',
    'as' => 'lead.delete'
]);

Route::get('/lead/edit/{id}', [
    'uses' => 'LeadController@edit',
    'as' => 'lead.edit'
]);

Route::post('/lead/update', [
    'uses' => 'LeadController@update',
    'as' => 'lead.update'
]);

Route::get('/lead/comment/{id}', [
    'uses' => 'LeadController@comment',
    'as' => 'lead.comment'
]);

Route::post('/lead/comment/store', [
    'uses' => 'LeadController@comment_store',
    'as' => 'comment.store'
]);

Route::get('/lead/export', [
    'uses' => 'LeadController@export',
    'as' => 'lead.export'
]);

Route::post('/lead/import', [
    'uses' => 'LeadController@import',
    'as' => 'lead.import'
]);
Route::post('/comment/import', [
    'uses' => 'LeadController@commentimport',
    'as' => 'comment.import'
]);

Route::post('/lead/search', [
    'uses' => 'LeadController@search',
    'as' => 'lead.search'
]);


});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
