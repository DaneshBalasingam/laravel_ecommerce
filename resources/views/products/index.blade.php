@extends('app')

@section('content')

	<h2>{{ $category }} Products</h2>

	<hr/>

	

	@foreach ( array_chunk($products->getCollection()->all(), 3) as $row)

		<div class="row">

			@foreach ($row as $product)
				<div class="col-md-4">

					<div class="product_summary thumbnail">

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

						<div class="product_excerpt caption">

							{{ $product->excerpt }}

						</div>

						@if( \Auth::user() && \Auth::user()->hasRole('admin') )
							<div class="clearfix">
								<div class="product_summary_update"> 
									<a class='btn btn-primary' href="{{ url('/products/' . $product->slug . '/edit') }}">
										Update
									</a>

								</div>
								<div class="product_summary_delete"> 
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

	@endforeach

		
		{!! $products->render() !!}

@stop


