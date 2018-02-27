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

	Route::get('/admin/dashboard', 'AdminControllers\MainController@index');
	Route::get('/admin/dashboard/users', 'AdminControllers\MainController@users');
	Route::get('/admin/dashboard/adduser', 'AdminControllers\MainController@adduser');

	Route::post('/admin/dashboard/register', 'AdminControllers\MainController@register');


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


	Route::get('/admin/subjects/view', 'AdminControllers\SubjectsController@index');
	Route::get('/admin/subjects/changestatus', 'AdminControllers\SubjectsController@change_status');	
	Route::get('/admin/subjects/add', 'AdminControllers\SubjectsController@create_form');
	Route::get('/admin/subjects/edit', 'AdminControllers\SubjectsController@edit');

	Route::post('/admin/subjects/store', 'AdminControllers\SubjectsController@store');
	Route::post('/admin/subjects/update/{id}', 'AdminControllers\SubjectsController@update'); 


	Route::get('/admin/containertypes/view', 'AdminControllers\ContainertypesController@index');
	Route::get('/admin/containertypes/changestatus', 'AdminControllers\ContainertypesController@change_status');	
	Route::get('/admin/containertypes/add', 'AdminControllers\ContainertypesController@create_form');
	Route::get('/admin/containertypes/edit', 'AdminControllers\ContainertypesController@edit');

	Route::post('/admin/containertypes/store', 'AdminControllers\ContainertypesController@store');
	Route::post('/admin/containertypes/update/{id}', 'AdminControllers\ContainertypesController@update'); 


	Route::get('/admin/materialcategories/view', 'AdminControllers\MaterialcategoriesController@index');
	Route::get('/admin/materialcategories/changestatus', 'AdminControllers\MaterialcategoriesController@change_status');	
	Route::get('/admin/materialcategories/add', 'AdminControllers\MaterialcategoriesController@create_form');
	Route::get('/admin/materialcategories/edit', 'AdminControllers\MaterialcategoriesController@edit');

	Route::post('/admin/materialcategories/store', 'AdminControllers\MaterialcategoriesController@store');
	Route::post('/admin/materialcategories/update/{id}', 'AdminControllers\MaterialcategoriesController@update');


	Route::get('/admin/backupreports/view_reports', 'AdminControllers\BackupController@index');
	Route::get('/admin/backupreports/database_backup', 'AdminControllers\BackupController@database');
	Route::get('/admin/backupreports/all_artist', 'AdminControllers\BackupController@report_all_artists');
	Route::post('/admin/backupreports/specific_artist', 'AdminControllers\BackupController@report_specific_artists');

	
});


