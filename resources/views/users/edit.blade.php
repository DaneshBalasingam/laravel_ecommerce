@extends('app')

@section('content')

	{!!  Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}


		<div class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			<label>Password</label>
			<div>
				<input type="password" class="form-control" name="password">
			</div>
		</div>

		<div class="form-group">
			<label>Confirm Password</label>
			<div>
				<input type="password" class="form-control" name="password_confirmation">
			</div>
		</div>


		<div class="form-group">
			{!! Form::submit("Update User", ['class' => 'btn btn-primary form-control']) !!}
		</div>

    {!!  Form::close() !!}

    @include('errors.list') 


@stop