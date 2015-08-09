@extends('app')

@section('content')

	<h2>{{ $category }} Products</h2>

	<hr/>

	

	

		<div class="row">

			@foreach ($products->getCollection()->all() as $product)

				<div class="product_thumb_wrap col-md-4 col-sm-6  col-xs-12">

					<div class="product_thumb thumbnail">

						<h2>
			                <a href="{{ url('/products',$product->slug) }}">
								{{ $product->title }}
							</a>
						</h2>

						@unless ($product->pictures->isEmpty())

							@foreach ($product->pictures as $picture)
								<a href="{{ url('/products',$product->slug) }}">
		                        	<img class="img-responsive" src="{{ asset('/images/uploads/thumbnail-' . $picture->filename) }}">
		                    	</a>
							@endforeach

						@endunless

						<div class="product_thumb_excerpt caption">

							{{ $product->excerpt }}

						</div>

						<div class="product_thumb_price">
							<p>PRICE : NZD${{  $product->price }}</p>
						</div>

						<div class="product_thumb_stock">
							<p>STOCK : {{ $product->stock }}</p>
						</div>

						@if( \Auth::user() && \Auth::user()->hasRole('admin') )
							<div class="clearfix">
								<div class="product_thumb_update"> 
									<a class='btn btn-primary' href="{{ url('/products/' . $product->slug . '/edit') }}">
										Update
									</a>

								</div>
								<div class="product_thumb_delete"> 
				 					{!!  Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->slug]]) !!}

										<div class="form-group">
											{!! Form::submit('Delete', ['class' => 'btn btn-danger' , 'onclick' => "return confirm('Are you sure?');"]) !!}
										</div>

				    				{!!  Form::close() !!}
									
								</div>
							</div>
						@endif
						
					</div>

				</div>

			@endforeach

		</div> <!-- closes row-->

		
		<div id="product_pagination_button">{!! $products->render() !!}</div>

@stop


