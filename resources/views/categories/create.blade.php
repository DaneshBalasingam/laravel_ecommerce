@extends('app')

@section('content')

	{!!  Form::open(['url' => 'categories', 'files' => true]) !!}

		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
			
				<?php 
			   		if (  $errors->has('name') )  {
			   	?>
			   	<div class="alert alert-danger">
		    	   	<?php
						    echo $errors->first('name');
						} 

		    		?>
    			</div>
		</div>

		<div class="form-group">
			{!! Form::label('Parent', 'Parent:') !!}
			<select name="parent">
				<option selected value="none">None</option>

				@unless ($categories->isEmpty())

					@foreach ($categories as $category)

					<option value="{{ $category->id }}">{{ $category->name }}</option>

					@endforeach

				@endunless



			</select>
		</div>

		<div class="form-group">
			{!! Form::submit("Add Category", ['class' => 'btn btn-primary form-control']) !!}
		</div>

    {!!  Form::close() !!}

    @include('errors.list') 


@stop