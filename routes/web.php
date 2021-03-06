<?php

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

Route::get('/','PagesController@getIndex');

Route::get('about','PagesController@getAbout');

Route::get('contact','PagesController@getContact');

Route::get('dash','Dash\DashController@index');

Route::resource('users', 'Dash\UsersController');

Route::resource('roles', 'Dash\RolesController');

Route::get('groups/autocomplete',[
	'as' 		=> 'groups.autocomplete',
	'uses' 	=> 'Dash\GroupsController@autocomplete'
	]);
Route::resource('groups', 'Dash\GroupsController');

Route::resource('comps', 'Dash\CompsController');



