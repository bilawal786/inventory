<?php
use Illuminate\Support\Facades\Route;
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
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'web']], function() {
Route::get('/', 'HomeController@index')->name('index');
Route::get('/update/status/{value}/{id}', 'LeadController@updateStatus')->name('update.status');

Route::post('/advance/search', 'LeadController@advancesearch')->name('advance.search');

//category
Route::resource('/categories', 'CategoryController');
//Route::get('category/delete/{id}', 'CategoryController@delete')->name('categories.delete');

//product
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/index', 'ProductController@index')->name('product.index');
Route::delete('product/delete/{id}', 'ProductController@delete')->name('product.delete');
Route::post('product/store', 'ProductController@store')->name('product.store');
Route::get('product/edit/{id}', 'ProductController@edit' )->name('product.edit');
Route::get('product/update/{id}', 'ProductController@update' )->name('product.update');

//purchase
Route::get('purchase/create', 'PurchaseController@create')->name('purchase.create');
Route::get('purchase/index', 'PurchaseController@index')->name('purchase.index');
Route::get('purchase/edit/{id}', 'PurchaseController@edit')->name('purchase.edit');
Route::post('purchase/store', 'PurchaseController@store')->name('purchase.store');
Route::post('purchase/update/{id}', 'PurchaseController@update')->name('purchase.update');
Route::delete('purchase/delete/{id}', 'PurchaseController@delete')->name('purchase.delete');

//Supplier
Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
Route::get('supplier/index', 'SupplierController@index')->name('supplier.index');
Route::delete('supplier/delete/{id}', 'SupplierController@delete')->name('supplier.delete');
Route::post('supplier/store', 'SupplierController@store')->name('supplier.store');
Route::get('supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
Route::post('supplier/update/{id}','SupplierController@update')->name('supplier.update');

//Customer
Route::get('customer/create', 'CustomerController@create')->name('customer.create');
Route::get('customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::get('customer/index', 'CustomerController@index')->name('customer.index');
Route::post('customer/store', 'CustomerController@store')->name('customer.store');
Route::delete('customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');
Route::get('customer/update/{id}', 'CustomerController@update')->name('customer.update');
//Sales
Route::get('sales/create', 'SalesController@create')->name('sales.create');
Route::post('sales/store','SalesController@store')->name('sales.store');
Route::get('sales/view{id}','SalesController@view')->name('sales.view');
Route::get('sales/index', 'SalesController@index')->name('sales.index');
Route::get('sales/update{id}','SalesController@update')->name('sales.update');
Route::get('sales/edit/{id}', 'SalesController@edit')->name('sales.edit');
Route::delete('sales/delete/{id}','SalesController@delete')->name('sales.delete');
//ajex call
Route::get('ajax-request/{id}', 'AjaxController@create')->name('create');
Route::post('ajax-request', [AjaxController::class, 'store']);
//invoice
Route::get('invoice/index','InvoiceController@index')->name('invoice.index');
Route::get('invoice/print','InvoiceController@create')->name('invoice.print');

//expences
    Route::get('expence/index','ExpenceController@index')->name('expence.index');
    Route::get('expence/category','ExpenceController@category')->name('expence.category');
    Route::get('expence/create','ExpenceController@create')->name('expence.create');
    Route::post('expence/store','ExpenceController@store')->name('expence.store');
    Route::get('expence/edit/{id}','ExpenceController@edit')->name('expence.edit');
    Route::delete('expence/delete/{id}','ExpenceController@delete')->name('expence.delete');
    Route::get('expence/update/{id}','ExpenceController@update')->name('expence.update');


    //income
    Route::get('income/index','IncomeController@index')->name('income.index');
    Route::get('income/category','IncomeController@category')->name('income.category');
    Route::get('income/create','IncomeController@create')->name('income.create');
    Route::post('income/store','IncomeController@store')->name('income.store');
    Route::get('income/update/{id}','IncomeController@update')->name('income.update');
    Route::get('income/edit/{id}','IncomeController@edit')->name('income.edit');
    Route::delete('income/delete/{id}','IncomeController@delete')->name('income.delete');

    Route::post('category/store','CategorController@store')->name('categor.store');
    Route::get('categor/category','CategorController@index')->name('categor.index');
    Route::delete('categor/delete/{id}','CategorController@delete')->name('categor.delete');
    Route::get('categor/edit/{id}','CategorController@edit')->name('categor.edit');
    Route::get('categor/update/{id}','CategorController@update')->name('categor.update');

    Route::get('report/index','ReportController@index')->name('report.index');
    Route::get('report/search/','ReportController@search')->name('report.search');












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

Route::delete('/lead/delete/{id}', [
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


