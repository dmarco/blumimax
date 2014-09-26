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
    //return View::make('layouts.main');
});
//Route::get('/', array('uses'=>'StoreController@getIndex')); // Descomentar cuando esté productivo

Route::get('/home', function()
{
    return View::make('layouts.index');
    //return View::make('layouts.main');
});
Route::get('/home/products', array('uses'=>'StoreController@getIndex')); // Sacar cuando esté productivo
Route::get('/home/categories', array('uses'=>'HomeController@getIndex')); // Sacar cuando esté productivo



Route::controller('admin/categories', 'CategoriesController');
Route::controller('admin/products', 'ProductsController');
Route::controller('store', 'StoreController');
Route::controller('users', 'UsersController');