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
Route::group(['namespace' => 'Coding'], function()
{
	get('coding','IndexController@index'); 
});

//admin area
get('admin', function(){
	return redirect('/admin/menu');
});

$router->group([
	'namespace' => 'Admin',
	'middleware' => 'auth'
], function(){
	
	resource('admin/menu','MenuController');
	Route::post('admin/menu/{slug}', function($slug){
    	$app = app();
    	$controller = $app->make('\App\Http\Controllers\Admin\MenuController');
    	return $controller->callAction($slug.'Menu', $parameters = array());
	})->where('slug', '^(add|edit|delete)');

	get('/admin/topic', ['uses' =>'TopicController@index']);
	get('/admin/topic/{topic}', ['uses' =>'TopicController@index']);

	resource('admin/article','ArticleController');

});

get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

//civil area
Route::group(['namespace' => 'Civil'], function()
{
	//Input::merge(array('namespace' => 'civil'));

	get('civil','IndexController@index'); 
});