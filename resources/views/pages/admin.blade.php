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
        <a href="{{ url('/users/') }}">
			Manage User
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
		<a href="{{ url('/banners/') }}">
			Manage Banner
		</a>
	</p>

	<p>
		<a href="{{ url('/categories/') }}">
			Manage Category
		</a>
	</p>


@stop


