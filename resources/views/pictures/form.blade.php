<div class="form-group">
	{!! Form::label('image', 'Upload Image:') !!}
	{!! Form::file('image') !!}
</div>


<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control', 'id' => 'add-image']) !!}
</div>






