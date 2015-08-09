@extends('app')

@section('content')

	<h2>Search for "{{ $tag->name }}"</h2>

	<hr/>

			@foreach ($products as $product)

				<div class="tag_product clearfix">

					@unless ($product->pictures->isEmpty())
						<div class="tag_product_picture">

							@foreach ($product->pictures as $picture)
								
								<a href="{{ url('/products',$product->slug) }}">
		                        	<img class="img-responsive" src="{{ asset('/images/uploads/small-' . $picture->filename) }}">
		                    	</a>
			                    
							@endforeach
				
						</div>
					@endunless

					<div class="tag_product_info">

						<h2>
			                <a href="{{ url('/products',$product->slug) }}">
								{{ $product->title }}
							</a>
						</h2>



						<div class="tag_product_excerpt">

							{{ $product->excerpt }}

						</div>
					</div>
					
				</div>

			@endforeach


@stop


