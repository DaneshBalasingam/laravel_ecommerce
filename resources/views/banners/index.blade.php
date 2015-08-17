@extends('app')

@section('content')

	<h2>MANAGE BANNERS</h2>

	<p>
		<a class='btn btn-danger' href="{{ url('/banners/create') }}">
			Add Banner
		</a>
	</p>

	<div class="table-responsive">
		<table id="checkout-table" class="table table-striped">

			<tr>
				<th>Banner Id</th>
				<th>Banner Title</th>
				<th>Banner Link</th>
				<th></th>
				<th></th>
			</tr>

			@if (!$banners->isEmpty())
				@foreach ($banners as $banner)
				<tr>
					<td>{{ $banner->id }}</td>
					<td>{{ $banner->title }}</td>
					<td>{{ $banner->link }}</td>
					<td>
						<a class='btn btn-danger' href="{{ url('/banners/' . $banner->id . '/edit') }}">
						Edit Banner
						</a>
					</td>
					<td>
						{!!  Form::open(['method' => 'DELETE', 'route' => ['banners.destroy', $banner->id]]) !!}

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