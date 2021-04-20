<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', "PublicController@index");
Route::get('/about', "HomeController@about");

Route::group(['middleware' => 'auth'],function() {  

});
Route::get('/admin', "AdminController@index");
Route::get('/admin/inventory', "InventoryController@index");
Route::get('/admin/catalogs', "CatalogController@index");
Route::resource('/admin/catalogs/suppliers', "Catalogs\SuppliersController");
Route::get('/home', 'HomeController@index')->name('home');
