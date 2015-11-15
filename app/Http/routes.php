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
    return redirect('/civil');
});

//coding area
get('coding','Coding\IndexController@index');


//admin area
get('admin', function(){
	return redirect('/admin/article');
});

$router->group([
	'namespace' => 'Admin',
	'middleware' => 'auth'
], function(){
	resource('admin/article','ArticleController');
	resource('admin/menu','MenuController');
});

get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

//civil area
get('civil','Civil\IndexController@index');