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

Route::group(['middleware' => 'auth'], function () {
});
Route::get('/admin', "AdminController@index");
Route::get('/admin/inventory', "InventoryController@index");
Route::get('/admin/catalogs', "CatalogController@index")->name('catalogs');
Route::resource('/admin/catalogs/categories', "Catalogs\CategoriesController", ['as' => 'catalogs']);
Route::resource('/admin/catalogs/suppliers', "Catalogs\SuppliersController", ['as' => 'catalogs']);
Route::resource('/admin/catalogs/measures', "Catalogs\MeasuresController", ['as' => 'catalogs']);
Route::resource('/admin/catalogs/supplies', "Catalogs\SuppliesController", ['as' => 'catalogs']);
Route::resource('/admin/catalogs/products', "Catalogs\ProductsController", ['as' => 'catalogs']);
Route::get('/home', 'HomeController@index')->name('home');
