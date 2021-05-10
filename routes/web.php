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

Auth::routes(['register' => false]);
Route::get('/', "PublicController@index");
Route::get('/about', "HomeController@about");

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', "AdminController@index")->name('admin');
    Route::get('/admin/catalogs', "Catalogs\CatalogController@index")->name('catalogs');
    Route::resource('/admin/catalogs/categories', "Catalogs\CategoriesController", ['as' => 'catalogs']);
    Route::resource('/admin/catalogs/suppliers', "Catalogs\SuppliersController", ['as' => 'catalogs']);
    Route::resource('/admin/catalogs/measures', "Catalogs\MeasuresController", ['as' => 'catalogs']);
    Route::resource('/admin/catalogs/supplies', "Catalogs\SuppliesController", ['as' => 'catalogs']);
    Route::resource('/admin/catalogs/products', "Catalogs\ProductsController", ['as' => 'catalogs']);

    Route::get('/admin/inventory', "Inventory\InventoryController@index", ['as' => 'inventory'])->name('inventory');
    Route::get('/admin/inventory/current', "Inventory\InventoryController@current", ['as' => 'inventory'])->name('inventory.current');
    Route::get('/admin/inventory/kardex', "Inventory\InventoryController@kardex", ['as' => 'inventory']);
    Route::resource('/admin/inventory/entry', "Inventory\EntryController", ['as' => 'inventory'])->only(['create', 'store']);
    Route::resource('/admin/inventory/departure', "Inventory\DepartureController", ['as' => 'inventory'])->only(['create', 'store']);
});
