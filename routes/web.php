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
Route::get('product/{id}/{name}', 'ProductController@show')->where(['id' => '[0-9]+', 'name' => '[a-z]+']);


Route::get('back-office', 'BackOfficeController@show')
	->name('backoffice.show');
Route::post('back-office/create_brand', 'BackOfficeController@create_brand')
	->name('backoffice.create_brand');
Route::post('back-office/update_brand/{id}', 'BackOfficeController@update_brand')
	->name('backoffice.update_brand');

Route::post('back-office/create_product', 'BackOfficeController@create_product')
	->name('backoffice.create_product');
Route::post('back-office/update_product/{id}', 'BackOfficeController@update_product')
	->name('backoffice.update_product');

Route::post('back-office/create_image', 'BackOfficeController@create_image')
	->name('backoffice.create_image');