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

Route::auth();
Route::get('admin_login', function () {
	return view('admin.login');
});
Route::group(['middleware'=>'auth'], function(){

	Route::get('/admin/dashboard', function () {
		return view('admin/contents/dashboard/indexcontent');
	});

	Route::get('/admin/materials/view', 'AdminControllers\MaterialsController@index');	
	Route::get('/admin/materials/add', 'AdminControllers\MaterialsController@create_form');
	Route::get('/admin/materials/edit', 'AdminControllers\MaterialsController@edit');
	Route::get('/admin/materials/changestatus', 'AdminControllers\MaterialsController@change_status');
		
	Route::post('/admin/materials/store', 'AdminControllers\MaterialsController@store'); 
	Route::post('/admin/materials/update/{id}', 'AdminControllers\MaterialsController@update'); 


	Route::get('/admin/authors/view', 'AdminControllers\AuthorsController@index');
	Route::get('/admin/authors/changestatus', 'AdminControllers\AuthorsController@change_status');	
	Route::get('/admin/authors/add', 'AdminControllers\AuthorsController@create_form');
	Route::get('/admin/authors/edit', 'AdminControllers\AuthorsController@edit');

	Route::post('/admin/authors/store', 'AdminControllers\AuthorsController@store');
	Route::post('/admin/authors/update/{id}', 'AdminControllers\AuthorsController@update'); 

	
});


