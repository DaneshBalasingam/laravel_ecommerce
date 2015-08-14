@extends('app')

@section('content')

	<h2>Search for "{{ $tag->name }}"</h2>

	<hr/>

			@foreach ($publishables as $publishable)

				<div class="tag_product clearfix">

					@unless ($publishable->pictures->isEmpty())
						<div class="tag_product_picture">

							@foreach ($publishable->pictures as $picture)

								@if (  get_class($publishable) == 'App\Product') 
									<a href="{{ url('/products',$publishable->slug) }}">
								@elseif (  get_class($publishable) == 'App\Article')
									<a href="{{ url('/articles',$publishable->slug) }}">
								@endif
		                        	<img class="img-responsive" src="{{ asset('/images/uploads/small-' . $picture->filename) }}">
		                    	</a>
			                    
							@endforeach
				
						</div>
					@endunless

					<div class="tag_product_info">

						<h2>
							@if (  get_class($publishable) == 'App\Product') 
			                	<a href="{{ url('/products',$publishable->slug) }}">
			                @elseif (  get_class($publishable) == 'App\Article')
								<a href="{{ url('/articles',$publishable->slug) }}">
							@endif
								{{ $publishable->title }}
							</a>
						</h2>



						<div class="tag_product_excerpt">

							{{ $publishable->excerpt }}

						</div>
					</div>
					
				</div>

				<hr/>
			@endforeach

@stop


