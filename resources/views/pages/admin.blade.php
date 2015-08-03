@extends('app')

@section('content')

	<h2>Admin Page</h2>

	<hr/>

	<p>
        <a href="{{ url('/auth/register-admin') }}">
			Add User
		</a>
	</p>

	<p>
		<a href="{{ url('/articles/create') }}">
			Add Article
		</a>
	</p>

	<p>
		<a href="{{ url('/products/create') }}">
			Add Product
		</a>
	</p>

	<p>
		<a href="{{ url('/pictures/create') }}">
			Add Image
		</a>
	</p>

	<p>
		<a href="{{ url('/categories/create') }}">
			Add Category
		</a>
	</p>


@stop


