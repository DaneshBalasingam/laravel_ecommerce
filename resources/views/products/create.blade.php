@extends('app')

@section('content')

	@include('pictures.lightboxImage')

	@include('galleries.lightboxGallery')

	<h2>Add a Product</h2>

	<hr/>

	{!!  Form::open(['url' => 'products', 'files' => true]) !!}

		 @include('products.form', ['submitButtonText' => "Add Product"])

    {!!  Form::close() !!}

    @include('errors.list') 

@stop


