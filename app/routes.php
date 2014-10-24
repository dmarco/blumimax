<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Comentar cuando este productivo
Route::get('/', function()
{
    return View::make('layouts.commingsoon');
});
//Route::get('/', array('uses'=>'StoreController@getIndex')); // Descomentar cuando esté productivo
Route::get('/home', array('uses'=>'StoreController@getIndex')); // Sacar cuando esté productivo
// Route::controller('admin/categories', 'CategoriesController');
// Route::controller('admin/products', 'ProductsController');
Route::controller('store', 'StoreController');
Route::controller('users', 'UsersController');
// Route::controller('search', array('uses'=>'SearchController@getIndex'));


Route::get('/{cat_name}', array('uses'=>'StoreController@getCategory'));
Route::get('/{cat_name}/{subcat_name}', array('uses'=>'StoreController@getSubCategory'));


// ADMIN ROUTERS ###################################################################

// Categories
Route::get('/admin/categories', array('uses'=>'CategoriesController@index'));
Route::get('/admin/categories/create', array('uses'=>'CategoriesController@create'));
Route::get('/admin/categories/delete/{id}', array('uses'=>'CategoriesController@destroy'));

// Products
Route::get('/admin/products', array('uses'=>'ProductsController@index'));
Route::post('/admin/products/create','ProductsController@create');
Route::post('/admin/products/destroy','ProductsController@destroy');
Route::post('/admin/products/toggle-availability', array('uses'=>'ProductsController@postToggleAvailability'));


Route::get('/admin/test', array('uses'=>'TestController@index'));






