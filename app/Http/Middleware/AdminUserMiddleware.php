<?php namespace App\Http\Middleware;

use Closure;

class AdminUserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( !\Auth::user()->hasRole('admin') ) {

			return redirect ('home');

		}
		return $next($request);
	}

}
