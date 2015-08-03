@extends('frame')

@section('content')
	<div>
		<a href="{{ url('/pictures/create') }}">Upload an image</a>
	</div>

	<div>
		
		<div id="set_image_button" >
				Set Featured Image
		</div>

		<a id="edit_image_button" href="<?php echo url('/pictures') ?>">
				Edit Image
		</a>
	</div>

	<hr/>

	<div id="images_display">

		@unless ($pictures->isEmpty())

		    @foreach ($pictures as $picture)
		    	   
		    	<img class="image" data-filename="{{$picture->filename}}" 
		    	     src="{{ asset('/images/uploads/thumbnail-' . $picture->filename) }}">


		    @endforeach

		@endunless

	</div>


@stop




