<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Cart;
use App\Product;
use App\Picture;

//use Illuminate\Http\Request;

class CartsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cart = Cart::where('id', $id)->first();

		return view('carts.show')->with('cart',$cart);

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$cart = Cart::where('id', $id)->first();

		if (Request::input('req_type') == 'add') {

			$product_match = 0;

			$add_product = Product::where('id', Request::input('product'))->first();
			$product_in_cart = 0;

			foreach ( $cart->products as $product) {
				if ($add_product->id == $product->pivot->product_id ) {
					$product_in_cart = $product->pivot->quantity;
				}

			}

			if ( $add_product->stock >=  (Request::input('quantity') + $product_in_cart )  ) {


				foreach ( $cart->products as $product) {

					if ( $product->pivot->product_id == Request::input('product')) {

						$new_quantity = $product->pivot->quantity + Request::input('quantity');
						
						$cart->products()->updateExistingPivot([Request::input('product')], [ 'quantity' => $new_quantity ]);

						$product_match++;

						flash()->success( Request::input('quantity') . ' X ' . $product->title . ' has been added to your Cart');

					}


				}

				if ( $product_match == 0 ) {

					$cart->products()->attach([Request::input('product')], [ 'quantity' => Request::input('quantity') ]);

					flash()->success('Product has been added to your Cart');
				}
			
			} else {

				flash()->error('Insufficient stock. Could not add to Cart');

			}
				
		}  else {

			$cart->products()->detach([Request::input('product')]);

			flash()->error('Product has been removed from your Cart');
		}

		
		
		return $cart->id;
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
