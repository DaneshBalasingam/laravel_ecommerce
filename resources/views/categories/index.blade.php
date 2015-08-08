@extends('app')

@section('content')

	<h2>MANAGE CATEGORIES</h2>

	<p>
		<a class='btn btn-danger' href="{{ url('/categories/create') }}">
			Add Category
		</a>
	</p>

	<div class="table-responsive">
		<table id="checkout-table" class="table table-striped">

			<tr>
				<th>Category Id</th>
				<th>Category Name</th>
				<th>Parent</th>
				<th>Category Type</th>
				<th></th>
				<th></th>
			</tr>

			@if (!$categories->isEmpty())
				@foreach ($categories as $category)
				<tr>
					<td>{{ $category->id}}</td>
					<td>{{ $category->name}}</td>
					<td>
						@if( !$category->parentCategories->isEmpty())
							{{ $category->parentCategories[0]->name }}
						@endif
					</td>
					<td>{{ $category->type}}</td>
					<td>
						<a class='btn btn-danger' href="{{ url('/categories/' . $category->slug . '/edit') }}">
						Edit Category
						</a>
					</td>
					<td>
						{!!  Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->slug]]) !!}

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