@extends('app')

@section('content')

	
	<h2>{{ $category }} Articles</h2>

	<hr/>

	

		<div>

			@foreach ($articles->getCollection()->all() as $article)
				<div class="article_item clearfix">

					<div class="article_thumb_picture">
						@unless ($article->pictures->isEmpty())

							@foreach ($article->pictures as $picture)

		                        <img src="{{ asset('/images/uploads/small-' . $picture->filename) }}">

							@endforeach

						@endunless
					</div>

					<div class="article_thumb_info">

						<h2>
			                <a href="{{ url('/articles',$article->slug) }}">
								{{ $article->title }}
							</a>

						</h2>

						<div class="article_summary">

							

							<div class="article_excerpt">

								{{ $article->excerpt }}

							</div>
							
						</div>

					
						
						@if( \Auth::user() && \Auth::user()->hasRole('admin') )
						<div class="article_admin clearfix">
							<div class="article_thumb_update"> 
								<a class='btn btn-primary' href="{{ url('/articles/' . $article->slug . '/edit') }}">
									Update
								</a>

							</div>
							<div class="article_thumb_delete"> 
			 					{!!  Form::open(['method' => 'DELETE', 'route' => ['articles.destroy', $article->slug]]) !!}

									<div class="form-group">
										{!! Form::submit('Delete', ['class' => 'btn btn-danger admin_delete' , 'onclick' => "return confirm('Are you sure?');"]) !!}
									</div>

			    				{!!  Form::close() !!}
								
							</div>
						</div>
						@endif
						

					</div>
				</div>

				<hr/>
			@endforeach

		</div>

		
		<div id="article_pagination_button">{!! $articles->render() !!}</div>

@stop


