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
Route::get('product/{id}/{name}', 'ProductController@show')
	->where(['id' => '[0-9]+', 'name' => '.*'])
	->name('product.show');


Route::get('back-office', 'BackOfficeController@show')
	->name('backoffice.show');

// Brand
Route::post('back-office/create_brand', 'BackOfficeController@create_brand')
	->name('backoffice.create_brand');
Route::post('back-office/update_brand/{id}', 'BackOfficeController@update_brand')
	->name('backoffice.update_brand');

// Product
Route::post('back-office/create_product', 'BackOfficeController@create_product')
	->name('backoffice.create_product');

Route::get('back-office/edit_product/{id}', 'BackOfficeController@edit_product')
	->name('backoffice.edit_product');
Route::post('back-office/update_product', 'BackOfficeController@update_product')
	->name('backoffice.update_product');

Route::post('back-office/delete_product', 'BackOfficeController@delete_product')
	->name('backoffice.delete_product');

// Product_image
Route::post('back-office/create_product_image', 'BackOfficeController@create_product_image')
	->name('backoffice.create_product_image');

Route::post('back-office/delete_product_image', 'BackOfficeController@delete_product_image')
	->name('backoffice.delete_product_image');

