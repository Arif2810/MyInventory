<?php

// Route::get('/', function(){
//   return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
// =====================================================================
Route::group(['middleware'=>'auth'], function(){

	Route::get('/supplier', 'SupplierController@index')->name('supplier.index');
	Route::get('/supplier/create', 'SupplierController@create');
	Route::post('/supplier', 'SupplierController@store');
	Route::get('/supplier/{id_supplier}/edit', 'SupplierController@edit');
	Route::put('/supplier/{id_supplier}', 'SupplierController@update');
	Route::delete('/supplier/{id_supplier}', 'SupplierController@destroy');
	// =====================================================================
	Route::get('/category', 'CategoryController@index')->name('category.index');
	Route::get('/category/create', 'CategoryController@create');
	Route::post('/category', 'CategoryController@store')->name('category.strore');
	Route::get('/category/{id_category}/edit', 'CategoryController@edit');
	Route::put('/category/{id_category}', 'CategoryController@update');
	Route::delete('/category/{id_category}', 'CategoryController@destroy');
	// =====================================================================
	Route::get('/product', 'ProductController@index')->name('product.index');
	Route::get('/product/create', 'ProductController@create');
	Route::post('/product', 'ProductController@store');
	Route::get('/product/{id_product}/edit', 'ProductController@edit');
	Route::put('/product/{id_product}', 'ProductController@update');
	Route::delete('/product/{id_product}', 'ProductController@destroy');
	// =====================================================================
	Route::get('/customer', 'CustomerController@index')->name('customer.index');
	Route::get('/customer/create', 'CustomerController@create');
	Route::post('/customer', 'CustomerController@store');
	Route::get('/customer/{id_supplier}/edit', 'CustomerController@edit');
	Route::put('/customer/{id_supplier}', 'CustomerController@update');
	Route::delete('/customer/{id_customer}', 'CustomerController@destroy');
	// =====================================================================
	Route::get('/purchase', 'PurchaseController@index')->name('purchase.index');
	Route::post('/purchase', 'PurchaseController@store')->name('purchase.store');
	Route::get('/purchase/update', 'PurchaseController@update')->name('purchase.update');
	Route::delete('/purchase/{id_purchase}', 'PurchaseController@destroy');
	Route::get('/purchase/pdf', 'PurchaseController@report')->name('purchase.report');
	// =====================================================================
	Route::get('/sell', 'SellController@index')->name('sell.index');
	Route::post('/sell', 'SellController@store')->name('sell.store');
	Route::get('/sell/update', 'SellController@update')->name('sell.update');
	Route::delete('/sell/{id_sell}', 'SellController@destroy');
	Route::get('/sell/pdf', 'SellController@report')->name('sell.report');
	// =====================================================================
	// Route::get('setting/app', 'SettingController@application');
	Route::get('setting/user', 'SettingController@user');

});
