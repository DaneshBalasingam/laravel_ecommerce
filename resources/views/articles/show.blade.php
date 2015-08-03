@extends('app')

@section('content')


	<h2>{{ $article->title }}</h2>

	<hr/>

	<div>

		@unless ($article->pictures->isEmpty())

			@foreach ($article->pictures as $picture)

                <img src="{{ asset('/images/uploads/' . $picture->filename) }}">

			@endforeach

		@endunless
	</div>
	<article>

		{{ $article->body }}

	</article>

	<div>

		@unless ($article->gallery[0]->pictures->isEmpty())

			@foreach ($article->gallery[0]->pictures as $picture)

				<img src="{{ asset('/images/uploads/' . $picture->filename) }}">

			@endforeach

		@endunless
	
	</div>

    @unless ($article->tags->isEmpty())
		<h5>Tags: </h5>

		<p>
			@foreach ($article->tags as $tag)
			   <a  href="{{ url('/tags', $tag->name) }}"> {{ $tag->name }} </a> ,
			@endforeach
		</p>	

	@endunless

	 @unless ($article->categories->isEmpty())
		<h5>Categories: </h5>

		<p>
			@foreach ($article->categories as $category)
			   <a  href="{{ url('/categories', $category->name) }}"> {{ $category->name }} </a> ,
			@endforeach
		</p>	

	@endunless



@stop


