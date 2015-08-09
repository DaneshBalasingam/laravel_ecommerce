@extends('app')

@section('content')

	<h2>CHECKOUT</h2>

	<hr/>

	<?php 

		$cart = session('cart'); 
		$cart_products = $cart->products;

	?>

	<div class="table-responsive">
	<table id="checkout-table" class="table table-striped">
		<tr>
			<th></th>
			<th>Product SKU</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
		@if (!$cart_products->isEmpty())

    	<?php $cart_total = 0; ?>

	    @foreach ($cart_products as $product)

	    	<?php 
	            $product_total = $product->price * $product->pivot->quantity;
	            $cart_total += $product_total;
	         ?>
	    	   
	    	<tr>
	    		<?php $product_pictures = $product->pictures; ?>

		    	@unless ($product_pictures->isEmpty())

		    		@foreach ($product_pictures as $picture)

		    			<td><img class="cart-pic" src="{{ asset('/images/uploads/small-' . $picture->filename) }}"></td>

		    		@endforeach

		    	@endunless
	    		<td>{{ $product->id }} </td>
	    		<td>{{ $product->slug }} </td>
	            <td>{{ $product->pivot->quantity }}</td>
	            <td><?php echo number_format($product_total,2); ?></td>

	    	</tr>
	    @endforeach

	
	    <tr>
	    	<td></td>
	    	<td></td>
	    	<td></td>
	    	<td>TOTAL : </td>
	        <td>NZD$<?php echo number_format($cart_total, 2); ?></td>
	    </tr>
    </table>

	</div>
   
@else

	<div>There are no items in the cart</div>

@endif

	

	{!!  Form::open(['url' => 'orders']) !!}

		<div class="form-group">
			<input class="form-control" name="cart" value="{{ $cart->id }}" type="hidden" >
		</div>

		<div class="form-group">
			{!! Form::submit('Place Order', ['class' => 'btn btn-primary form-control']) !!}
		</div>

    {!!  Form::close() !!}

    @include('errors.list') 

@stop


