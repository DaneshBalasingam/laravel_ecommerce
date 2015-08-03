<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cart;
use App\Order;
//use Illuminate\Http\Request;
use Request;

class OrdersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'success';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (\Auth::user()) {
			return view('orders.create');
		} else {
			return view('auth.login');
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = Request::input('cart');
		$cart = Cart::where('id', $id)->first();

		$cart_products = $cart->products;

		$order = new Order;
		\Auth::user()->orders()->save($order);

		if (!$cart_products->isEmpty()) {

			foreach ($cart_products as $product){
				if($product->stock < $product->pivot->quantity ) {
					$order->delete();
					flash()->error('Cannot fulfill order as insufficient ' . $product->title. ' stock');
					return redirect('orders/create');
				}
			}
			foreach ($cart_products as $product) {
				$order->products()->attach([$product->id], [ 'quantity' => $product->pivot->quantity ]);
			}
		}

		flash()->success('Order successfully created');
		return redirect('orders');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
