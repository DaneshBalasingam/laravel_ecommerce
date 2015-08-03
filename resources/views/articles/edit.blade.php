@extends('app')

@include('pictures.lightboxImage')

@include('galleries.lightboxGallery')

@section('content')


	<h2>Edit: {{ $article->title }}</h2>

	<hr/>

	{!!  Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->slug]]) !!}

		@include('articles.formEdit', ['submitButtonText' => "Update Article"])

    {!!  Form::close() !!}

    @include('errors.list') 

	

@stop


