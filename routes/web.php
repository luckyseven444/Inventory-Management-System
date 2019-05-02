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


Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/logout', 'HomeController@logout');

Route::middleware(['web', 'auth'])->group(function () {

//Supplier table route start here...........................................
Route::get('supplier', 'supplierController@index');
Route::get('supplier/add-supplier', 'supplierController@addsupplier');
Route::post('supplier/supplier-store', 'supplierController@supplierStore');
Route::get('supplier/update-supplier', 'supplierController@updatesupplier');
Route::post('supplier/{id}/update', 'supplierController@supplierRestore');
Route::get('supplier/delete-supplier', 'supplierController@deletesupplier');

//Stock-In table route start here...........................................
//Route::get('stockin', 'stockinController@index');
Route::get('stockin/add-stockin', 'stockinController@addStockin');
Route::post('stockin/stockin-store', 'stockinController@stockinStore');
Route::get('search', 'stockinController@search');
Route::get('check-stock', 'stockinController@checkStock');
Route::get('check-stock-ajax', 'stockinController@checkStockAjax');
Route::get('stockin/update-stockin', 'stockinController@updateStockin');
Route::post('stockin/{id}/update', 'stockinController@stockinRestore');
Route::get('stockin/delete-stockin', 'stockinController@deleteStockin');

//Customer table route start here...........................................
    Route::get('customer', 'customerController@index');
    Route::get('customer/add-customer', 'customerController@addCustomer');
    Route::post('customer/customer-store', 'customerController@customerStore');
    Route::get('customer/update-customer', 'customerController@updateCustomer');
    Route::post('customer/{id}/update', 'customerController@customerRestore');
    Route::get('customer/delete-customer', 'customerController@deleteCustomer');
    
//Stock-Out table route start here...........................................
    //Route::get('stockout', 'stockoutController@index');
    Route::get('stockout/add-stockout', 'stockoutController@addStockout');
    Route::post('stockout/stockout-store', 'stockoutController@stockoutStore');
    Route::get('search_product_id', 'stockoutController@search');

    //Route::get('check-stockout', 'stockoutController@checkStockout');
    //Route::get('check-stock_out-ajax', 'stockoutController@checkStockoutAjax');

    Route::get('product_id_multiselect', 'stockoutController@searchMultiselect');
    Route::get('stockout/update-stockout', 'stockoutController@updateStockout');
    Route::post('stockout/{id}/update', 'stockoutController@stockoutRestore');
    Route::get('stockout/delete-stockout', 'stockoutController@deleteStockout');
});