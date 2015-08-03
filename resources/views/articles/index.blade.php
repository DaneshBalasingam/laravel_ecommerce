@extends('app')

@section('content')

	<h2>Articles</h2>

	<hr/>

	

	@foreach ( array_chunk($articles->getCollection()->all(), 3) as $row)

		<div class="row">

			@foreach ($row as $article)
				<article class="col-md-4">

					<h2>
		                <a href="{{ url('/articles',$article->slug) }}">
							{{ $article->title }}
						</a>

					</h2>

					<div class="article_summary">

						@unless ($article->pictures->isEmpty())

							@foreach ($article->pictures as $picture)

		                        <img src="{{ asset('/images/uploads/thumbnail-' . $picture->filename) }}">

							@endforeach

						@endunless

						<div class="article_excerpt">

							{{ $article->excerpt }}

						</div>
						
					</div>

					@if( \Auth::user() && \Auth::user()->hasRole('admin') )

						<p> 
							<a href="{{ url('/articles/' . $article->slug . '/edit') }}">
								Update
							</a>

						</p>
						<p> 
		 					{!!  Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->slug]]) !!}

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

		
		{!! $articles->render() !!}

@stop


