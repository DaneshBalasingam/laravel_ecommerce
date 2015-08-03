@extends('app')

@section('content')

	<h2>Products</h2>

	<hr/>

	

	@foreach ( array_chunk($products->getCollection()->all(), 3) as $row)

		<div class="row">

			@foreach ($row as $product)
				<article class="col-md-4">

					<h2>
		                <a href="{{ url('/products',$product->slug) }}">
							{{ $product->title }}
						</a>

					</h2>

					<div class="product_summary">

						@unless ($product->pictures->isEmpty())

							@foreach ($product->pictures as $picture)

		                        <img src="{{ asset('/images/uploads/thumbnail-' . $picture->filename) }}">

							@endforeach

						@endunless

						<div class="product_excerpt">

							{{ $product->excerpt }}

						</div>
						
					</div>

					@if( \Auth::user() && \Auth::user()->hasRole('admin') )

						<p> 
							<a href="{{ url('/products/' . $product->slug . '/edit') }}">
								Update
							</a>

						</p>
						<p> 
		 					{!!  Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->slug]]) !!}

								<div class="form-group">
									{!! Form::submit('Delete', ['class' => 'btn btn-danger' , 'onclick' => "return confirm('Are you sure?');"]) !!}
								</div>

		    				{!!  Form::close() !!}
							
						</p>
			
					@endif


				</article>

			@endforeach

		</div> <!-- closes row-->

	@endforeach

		
		{!! $products->render() !!}

@stop


