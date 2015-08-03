

	<h2>Upload a new Image</h2>

	{!!  Form::open(['upload_image','url' => 'pictures', 'files' => true]) !!}

		 @include('pictures.form', ['submitButtonText' => "Add Image"])

	{!!  Form::close() !!}

	@include('errors.list') 

	<hr>

	<div>
		
		<div id="set_image_button" >
				Set Featured Image
		</div>

	</div>

	<hr/>

	<div id="images_display">

		@unless ($pictures->isEmpty())

		    @foreach ($pictures as $picture)
		    	   
		    	<img class="image" data-filename="{{$picture->filename}}" 
		    	     src="{{ asset('/images/uploads/thumbnail-' . $picture->filename) }}">


		    @endforeach

		@endunless

	</div>





