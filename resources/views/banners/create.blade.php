@extends('app')

@section('content')

	<h2>Create a banner</h2>

	<hr/>

	{!!  Form::open(['url' => 'banners', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
			
				<?php 
			   		if (  $errors->has('title') )  {
			   	?>
			   	<div class="alert alert-danger">
		    	   	<?php
						    echo $errors->first('title'); 
						} 

		    		?>
		    	</div>
		</div>
		<div class="form-group">
			{!! Form::label('excerpt', 'Excerpt:') !!}
			{!! Form::textarea('excerpt', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('link', 'Link:') !!}
			{!! Form::text('link', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('image', 'Upload Image:') !!}
			{!! Form::file('image') !!}
		</div>

		<div class="form-group">
			{!! Form::label('published_at', 'Publish On:') !!}
			{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
		</div>



		<div class="form-group">
			{!! Form::submit('Add Banner', ['class' => 'btn btn-primary form-control']) !!}
		</div>

    {!!  Form::close() !!}

    @include('errors.list') 

@stop


