@extends('app')

@section('content')


	<h2>{{ $product->title }}</h2>

	<hr/>

	<div>

		@unless ($product->pictures->isEmpty())

			@foreach ($product->pictures as $picture)

                <img src="{{ asset('/images/uploads/' . $picture->filename) }}">

			@endforeach

		@endunless
	</div>
	<article>

		{{ $product->body }}

	</article>

	<div>

		@unless ($product->gallery[0]->pictures->isEmpty())

			@foreach ($product->gallery[0]->pictures as $picture)

				<img src="{{ asset('/images/uploads/' . $picture->filename) }}">

			@endforeach

		@endunless
	
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
				<input class="form-control" name="quantity" type="number" value="1" >
			</div>

			<button class="btn btn-primary">Add to Cart</button>
		{!!  Form::close() !!}
	</div>

    @unless ($product->tags->isEmpty())
		<h5>Tags: </h5>

		<p>
			@foreach ($product->tags as $tag)
			   <a  href="{{ url('/tags', $tag->name) }}"> {{ $tag->name }} </a> ,
			@endforeach
		</p>	

	@endunless

	 @unless ($product->categories->isEmpty())
		<h5>Categories: </h5>

		<p>
			@foreach ($product->categories as $category)
			   <a  href="{{ url('/categories', $category->name) }}"> {{ $category->name }} </a> ,
			@endforeach
		</p>	

	@endunless

	 @include('errors.list') 

@stop


