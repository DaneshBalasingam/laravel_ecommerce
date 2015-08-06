<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		//$router->model('articles', '\App\Article');

		$router->bind('articles', function($slug){
			return \App\Article::where('slug', $slug)->firstOrFail();
		});

		$router->bind('categories', function($name){
			return \App\Category::where('name', $name)->firstOrFail();
		});

		//$router->model('tags', '\App\Tag');

		$router->bind('tags', function($name){
			return \App\Tag::where('name', $name)->firstOrFail();
		});

		$router->bind('pictures', function($name){
			return \App\Picture::where('filename', $name)->firstOrFail();
		});

		$router->bind('products', function($slug){
			return \App\Product::where('slug', $slug)->firstOrFail();
		});

		$router->bind('categories', function($slug){
			return \App\Category::where('slug', $slug)->firstOrFail();
		});


	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
