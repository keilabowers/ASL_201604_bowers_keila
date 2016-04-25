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


	Route::get('/', function () {
		return view('welcome');	
	});	

	Route::auth();

	Route::get('/home', 'HomeController@index');


	/* Bookshelf Routes */
	Route::get('/bookshelf', 'BookshelfController@index');
	Route::post('/bookshelf', 'BookshelfController@store');
	Route::get('/bookshelf/{userbook}/edit', 'BookshelfController@edit');
	Route::patch('/bookshelf/{userbook}', 'BookshelfController@update');
	Route::delete('/bookshelf/{userbook}', 'BookshelfController@delete');
 
 	/* Library Routes */
	Route::get('/library', 'LibraryController@index');
	Route::post('/search', 'LibraryController@search');
	Route::get('/library/{userbook}', 'LibraryController@show');
	Route::post('/library/{userbook}', 'LibraryController@store');
	Route::get('/library/{loan}/return', 'LibraryController@return');
