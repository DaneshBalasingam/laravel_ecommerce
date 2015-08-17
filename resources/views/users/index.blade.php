@extends('app')

@section('content')

	<h2>MANAGE USERS</h2>

	<p>
		<a class='btn btn-danger' href="{{ url('/auth/register-admin') }}">
			Add User
		</a>
	</p>

	<div class="table-responsive">
		<table id="checkout-table" class="table table-striped">

			<tr>
				<th>User Id</th>
				<th>User Name</th>
				<th>Email</th>
				<th>Type</th>
				<th></th>
				<th></th>
			</tr>

			@if (!$users->isEmpty())
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<a class='btn btn-danger' href="{{ url('/users/' . $user->id . '/edit') }}">
						Edit User
						</a>
					</td>
					<td>
						{!!  Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}

							<div class="form-group">
								{!! Form::submit('Delete', ['class' => 'btn btn-danger' , 'onclick' => "return confirm('Are you sure?');"]) !!}
							</div>

		    			{!!  Form::close() !!}
					</td>
				</tr>
				@endforeach
			@endif

		</table>
	</div>


@stop