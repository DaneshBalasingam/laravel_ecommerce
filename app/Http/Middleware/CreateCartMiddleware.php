<?php namespace App\Http\Middleware;

use Closure;
use App\Cart;

class createCartMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!\Auth::user()) {
			if(!session('cart')) {
				$newCart = Cart::create([]);
				session(['cart' => $newCart]);
			}				
		} else {
			if( $user_cart = \Auth::user()->cart) {
				session(['cart' => $user_cart]);
			} else {
				\Auth::user()->cart()->save(session('cart'));
			}

		}

		
		return $next($request);
	}

}
