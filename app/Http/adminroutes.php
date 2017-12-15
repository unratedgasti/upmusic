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
	Route::get('/admin/materials/edit/{id}', 'AdminControllers\MaterialsController@edit');
	Route::get('/admin/materials/changestatus', 'AdminControllers\MaterialsController@change_status');

		
	Route::post('/admin/materials/store', 'AdminControllers\MaterialsController@store'); 

	
});


