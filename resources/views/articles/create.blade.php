@extends('app')

@include('pictures.lightboxImage')

@include('galleries.lightboxGallery')



@section('content')

	<h2>Write a new Article</h2>

	<hr/>

	{!!  Form::open(['url' => 'articles', 'files' => true]) !!}

		 @include('articles.form', ['submitButtonText' => "Add Article"])

    {!!  Form::close() !!}

    @include('errors.list') 

@stop


