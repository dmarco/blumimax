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
Route::controller('admin/products', 'ProductsController');
Route::controller('store', 'StoreController');
Route::controller('users', 'UsersController');
// Route::controller('search', array('uses'=>'SearchController@getIndex'));

// Route::get('/create/{parent_id}/{name}', array('uses'=>'CategoriesController@create'));
// Route::get('/getdepth/{id}', array('uses'=>'CategoriesController@store'));
Route::get('/admin/categories', array('uses'=>'CategoriesController@index'));
Route::get('/admin/categories/create', array('uses'=>'CategoriesController@create'));
Route::get('/admin/categories/delete/{id}', array('uses'=>'CategoriesController@destroy'));







