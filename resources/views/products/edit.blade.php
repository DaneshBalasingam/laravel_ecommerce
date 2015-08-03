@extends('app')

@include('pictures.lightboxImage')

@include('galleries.lightboxGallery')

@section('content')


	<h2>Edit: {{ $product->title }}</h2>

	<hr/>

	{!!  Form::model($product, ['method' => 'PATCH', 'action' => ['ProductsController@update', $product->slug]]) !!}

		@include('products.formEdit', ['submitButtonText' => "Update Product"])

    {!!  Form::close() !!}

    @include('errors.list') 

	

@stop


