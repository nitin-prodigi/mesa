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
    return redirect('/coding');
});


//admin area
	get('admin', function(){
		return redirect('/admin/menu');
	});

	get('/admin/topic', function(){
		return redirect('/admin/topic/economics');
	});

	$router->group([
		'namespace' => 'Admin',
		'middleware' => 'auth'
	], function(){
		\View::share ( 'namespace', 'admin');
		// menu
			resource('admin/menu','MenuController');
			Route::post('admin/menu/{slug}', function($slug){
		    	$app = app();
		    	$controller = $app->make('\App\Http\Controllers\Admin\MenuController');
		    	return $controller->callAction($slug.'Menu', $parameters = array());
			})->where('slug', '^(add|edit|delete)');

		// topic
			get('/admin/topic/{topic}', ['uses' =>'TopicController@index']);
			Route::post('admin/topic/{slug}', function($slug){
		    	$app = app();
		    	$controller = $app->make('\App\Http\Controllers\Admin\TopicController');
		    	return $controller->callAction($slug.'Topic', $parameters = array());
			});

		// article
			get('/admin/article', function(){
				return redirect('/admin/article/listing');
			});
			get('/admin/article/listing', ['uses' =>'ArticleController@index']);

			// other routes
			Route::any('admin/article/{slug}', function($slug){
		    	$app = app();
		    	$controller = $app->make('\App\Http\Controllers\Admin\ArticleController');
		    	return $controller->callAction($slug.'Article', $parameters = array());
			});

		// media
			get('/admin/media/json', 'MediaController@jsonMedia');
			resource('admin/media','MediaController@index');
			Route::post('admin/media/{slug}', function($slug){
		    	$app = app();
		    	$controller = $app->make('\App\Http\Controllers\Admin\MediaController');
		    	return $controller->callAction($slug.'Media', $parameters = array());
			})->where('slug', '^(add|rmdir|delete|upload)');

		// remaining 
		Route::get('admin/{controller?}/{action?}', ['as' =>'admin',function($controller = 'index', $action = 'index'){
			$app = app();
			$controller_path = '\App\Http\Controllers\Admin\\'.(ucfirst($controller)).'Controller';
			
			$createdController = $app->make($controller_path);
			return $createdController->callAction($action.'Action', $parameters = array());
		}])->where(array(
			'controller' => '^(definitions)',
			'action' => '^(index|topic)',
		));
	});

// auth area
	get('/auth/login', 'Auth\AuthController@getLogin');
	post('/auth/login', 'Auth\AuthController@postLogin');
	get('/auth/logout', 'Auth\AuthController@getLogout');

//civil area
	Route::group(['namespace' => 'Civil'], function()
	{
		get('/civil', function(){
			return redirect()->route('civil',array(
				'action' => 'menu'
			));
		});

		\View::share ( 'namespace', 'civil');
		Route::get('civil/{action?}', ['as' =>'civil',function($action = 'article'){
			$app = app();
			$controller_path = '\App\Http\Controllers\Civil\IndexController';
			
			$controller = $app->make($controller_path);
			return $controller->callAction($action.'Action', $parameters = array());
		}])->where(array(
			'action' => '^(article|topic|menu|reference)',
		));
	});

//coding area
	Route::group(['namespace' => 'coding'], function()
	{
		get('/coding', function(){
			return redirect()->route('coding',array(
				'action' => 'menu'
			));
		});

		\View::share ( 'namespace', 'coding');
		Route::get('coding/{action?}', ['as' =>'coding',function($action = 'article'){
			$app = app();
			$controller_path = '\App\Http\Controllers\Coding\IndexController';
			
			$controller = $app->make($controller_path);
			return $controller->callAction($action.'Action', $parameters = array());
		}])->where(array(
			'action' => '^(article|topic|menu|reference)',
		));
	});