<?php $cart_products = $cart->products; ?>


@if (!$cart_products->isEmpty())

    <?php $cart_total = 0; ?>

    <table class="table table-striped">

        <tr>
            <th></th>
            <th>Item</th>
            <th></th>
            <th>Qty</th>
            <th>Price</th>
        </tr>

    
    @foreach ($cart_products as $product)
        <tr>
            <td>
            	{!!  Form::open(['update_cart','method' => 'PATCH', 'action' => ['CartsController@update', session('cart')->id]]) !!}

        			<div class="form-group">
        				<input class="form-control" name="product" value="{{ $product->id }}" type="hidden" >
        			</div>

        			<div class="form-group">
        				<input class="form-control" name="req_type" value="remove" type="hidden" >
        			</div>

        			<button class="btn btn-warning" type="submit">X</button>
        		{!!  Form::close() !!}
            </td>
            <td>
                <?php $product_pictures = $product->pictures; ?>

                @unless ($product_pictures->isEmpty())

                    @foreach ($product_pictures as $picture)

                        <img class="cart-pic" src="{{ asset('/images/uploads/small-' . $picture->filename) }}">

                    @endforeach

                @endunless
            </td>
        	<?php 
                $product_total = $product->price * $product->pivot->quantity;
                $cart_total += $product_total;
             ?>
        	  
        	<td class="cart_item_info">{{ $product->title }}</td>
            <td class="cart_item_info">{{ $product->pivot->quantity }}</td>
            <td class="cart_item_info">$NZD<?php echo number_format($product->price,2); ?></td>



        </tr>
    @endforeach
        <tr>
            <td></td>
            <td>TOTAL : </td>
            <td></td>
            <td></td>
            <td>NZD$<?php echo number_format($cart_total, 2); ?></td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a id="cart-checkout-button" class='btn btn-primary' href="{{ url('/orders/create') }}">CHECKOUT</a></td>
        </tr>
    </table>
    <div>
        
    </div>
    
    <div>
        
    </div>

@else

	<div>There are no items in the cart</div>

@endif









