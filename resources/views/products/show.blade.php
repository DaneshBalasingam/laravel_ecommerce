@extends('app')

@section('content')


	<h2>{{ $product->title }}</h2>

	<hr/>

	<div class="row">

		<div  class="col-md-6">
			<div id="product-picture" data-url="{{ asset('/images/uploads/large-')}}">

				@unless ($product->pictures->isEmpty())

					@foreach ($product->pictures as $picture)

		                <img id="main-pic" src="{{ asset('/images/uploads/large-' . $picture->filename) }}">

					@endforeach

				@endunless
			</div>
			<div id="product-gallery">

				@unless ($product->gallery[0]->pictures->isEmpty())

					@foreach ($product->gallery[0]->pictures as $picture)

						<img src="{{ asset('/images/uploads/small-' . $picture->filename) }}" data-image="{{ $picture->filename }}">

					@endforeach

				@endunless
			
			</div>
		</div>

		<div  class="col-md-6">
			<div id="product_body">

				{{ $product->body }}

			</div>

			<div id="product_price">
				<p>PRICE : NZD${{  $product->price }}</p>
			</div>

			<div id="product_stock">
				<p>STOCK : {{ $product->stock }}</p>
			</div>

			<div id="add-to-cart">		
				{!!  Form::open(['update_cart','method' => 'PATCH', 'action' => ['CartsController@update', session('cart')->id]]) !!}

					<div class="form-group">
						<input class="form-control" name="product" value="{{ $product->id }}" type="hidden" >
					</div>

					<div class="form-group">
						<input class="form-control" name="req_type" value="add" type="hidden" >
					</div>

					<div class="form-group">
						<label>Quantity</label>
						<input class="form-control product_qty" name="quantity" type="number" value="1" >
					</div>

					<button class="btn btn-primary">Add to Cart</button>
				{!!  Form::close() !!}
			</div>

			<div id="product_meta">
			    @unless ($product->tags->isEmpty())
					<p>
						<span class="product_meta_head">Tags :</span>
						@foreach ($product->tags as $tag)
						   <a  href="{{ url('/tags', $tag->name) }}"> {{ $tag->name }} </a> 
						@endforeach
					</p>	

				@endunless

			</div>

		</div>

	</div>

	 @include('errors.list') 

@stop


