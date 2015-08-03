var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.less('app.less','resources/assets/css');
    //mix.sass('app.scss');

    mix.styles([

		'libs/normalize.css',
		'app.css',
        'libs/select2.css',
        'libs/image-picker.css',
        'libs/jquery.Jcrop.css',
        'custom.css'

	]);

    mix.scripts([
    	'libs/jquery.min.js',
    	'libs/bootstrap.js',
        'libs/angular.min.js',
        'libs/select2.js',
        'libs/image-picker.js',
        'libs/jquery.color.js',
        'libs/jquery.Jcrop.js',
        'cart.js',
        'lightbox.js',
        'custom.js'

    ]);

});
