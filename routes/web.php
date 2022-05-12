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

 

Route::get('/', 'ProductController@allcatogery');
Route::get('/product/catogery/{id}', 'ProductController@catogery');

Route::get('/product', 'ProductController@index');





//for demo
Route::get('/product/{id}', 'ProductController@store');
Route::post('/product/review', 'ProductController@createstore');




Route::post('/product/cart', 'ProductController@createcart');




Route::get('/cart', 'CartController@index');
Route::delete('/cart/{id}', 'CartController@delete');
Route::get('/cart/submit', 'CartController@create');



Route::get('/adminview', 'AdminController@index');
Route::get('/adminview/{id}', 'AdminController@aview');
Route::delete('/adminview/{id}', 'AdminController@delete');
Route::post('/admin/update', 'AdminController@update');
Route::post('/admin', 'AdminController@store');
Route::get('/admin', 'AdminController@create');

 
Route::get('/supplierview', 'SupplierController@index');
Route::get('/supplierview/{id}', 'SupplierController@supplierview');
Route::delete('/supplierview/{id}', 'SupplierController@delete1');
Route::post('/supplier/update', 'SupplierController@update1');
Route::post('/supplier', 'SupplierController@store1');
Route::get('/supplier', 'SupplierController@create');

 

Route::get('/register', 'RegistraionController@create');
Route::post('/register', 'RegistraionController@store');
 
Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::post('/suppliermanager', 'SuppliermanagerController@store');
Route::post('/suppliermanager/update', 'SuppliermanagerController@update');
Route::delete('/suppliermanager/{id}', 'SuppliermanagerController@delete');
Route::get('/suppliermanager', 'SuppliermanagerController@create');
Route::get('/suppliermanagerview', 'SuppliermanagerController@index');
Route::get('/suppliermanagerview/{id}', 'SuppliermanagerController@suview');

 


