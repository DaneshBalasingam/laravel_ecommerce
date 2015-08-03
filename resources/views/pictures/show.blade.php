@extends('app')

@section('content')

	<div>

		<img src="{{ asset('/images/uploads/' . $picture->filename) }}">
	
	</div>

		<h2>{{ $picture->filename }}</h2>
@stop


