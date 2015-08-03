<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('about', 'PagesController@showAbout');
Route::get('contact', 'PagesController@showContact');
Route::get('admin', 'PagesController@showAdmin');
Route::get('/', 'PagesController@showAbout');
Route::get('/home', 'PagesController@showAbout');

/*Route::post('carts/{id}', function ($id) {
    return 'Cart '.$id;
});*/

/*Route::get('articles', 'ArticlesController@index');
Route::get('articles/create', 'ArticlesController@create');
Route::get('articles/{id}', 'ArticlesController@show');
Route::post('articles', 'ArticlesController@store');*/

Route::resource('articles','ArticlesController');

Route::resource('pictures','PicturesController');
//Route::get('pictures/JSONList', 'PicturesController@JSONList');


Route::resource('galleries','GalleriesController');

Route::resource('categories','CategoriesController');

Route::get('tags/{tags}', 'TagsController@show');

Route::resource('products','ProductsController');

Route::resource('carts','CartsController');

Route::resource('orders','OrdersController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
