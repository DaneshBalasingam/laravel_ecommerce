<?php $cart_products = $cart->products; ?>


@if (!$cart_products->isEmpty())

    <?php $cart_total = 0; ?>

    @foreach ($cart_products as $product)

    	{!!  Form::open(['update_cart','method' => 'PATCH', 'action' => ['CartsController@update', session('cart')->id]]) !!}

			<div class="form-group">
				<input class="form-control" name="product" value="{{ $product->id }}" type="hidden" >
			</div>

			<div class="form-group">
				<input class="form-control" name="req_type" value="remove" type="hidden" >
			</div>

			<button class="btn btn-warning" type="submit">X</button>
		{!!  Form::close() !!}

    	<?php 
            $product_total = $product->price * $product->pivot->quantity;
            $cart_total += $product_total;
         ?>
    	   
    	<div>
    		{{ $product->id }} <br>
    		{{ $product->slug }} <br>
            {{ $product->pivot->quantity }}
            <?php echo number_format($product_total,2); ?>
    	</div>

        <?php $product_pictures = $product->pictures; ?>

    	@unless ($product_pictures->isEmpty())

    		@foreach ($product_pictures as $picture)

    			{{ $picture->filename }}

    		@endforeach

    	@endunless


    @endforeach

    <div>
        TOTAL : NZD$<?php echo number_format($cart_total, 2); ?>
    </div>

    <div>
        <a href="{{ url('/orders/create') }}">CHECKOUT</a>
    </div>

@else

	<div>There are no items in the cart</div>

@endif









