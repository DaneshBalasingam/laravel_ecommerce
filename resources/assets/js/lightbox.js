function Imagelightbox () {


	/*****************************************************

					Single Image Lightbox

	********************************************************/

	var image_filename = "";

	$('#set_featured_image').click(function() {
  		$('#lightbox_image').toggle();
	});

	$('#close_image_lightbox').click(function() {
  		$('#lightbox_image').toggle();
	});

	var image_form_url = $('#lightbox_image_form').attr('data-imagelightbox');

	$('#lightbox_image_form').load(image_form_url, function(){

		sync_featured();

	});


	$(document).on('submit', 'form[upload_image]', function(e) {
		e.preventDefault();

		var imageUpload = document.querySelector("#image");
		var token = document.querySelector('input[name="_token"]');

		var file= imageUpload.files[0];

	    var formdata = new FormData();
	    formdata.append("image",file, file.name);
	   	formdata.append("_token",token.value);

		var form = $(this);

		var url = form.prop('action');
        
		$.ajax({
			url: url,
			data: formdata,
			method: 'POST',
			cache: false,
			processData: false,
			contentType: false,
			success: function(res){	 
				
				$('#lightbox_image_form').load(image_form_url, function(){
					sync_featured();
				});

				$('#lightbox_gallery_form').load(gallery_form_url, function(){
					$("#gallery_selector").imagepicker();
					set_gallery();
					sync_gallery();
				});
				
				
			}	

		});
		

	});

	$(document).on('submit', 'form[upload_image_2]', function(e) {
		e.preventDefault();

		var imageUpload = document.querySelector("#image_2");
		var token = document.querySelector('input[name="_token"]');

		var file= imageUpload.files[0];

	    var formdata = new FormData();
	    formdata.append("image",file, file.name);
	   	formdata.append("_token",token.value);

		var form = $(this);

		var url = form.prop('action');
        
		$.ajax({
			url: url,
			data: formdata,
			method: 'POST',
			cache: false,
			processData: false,
			contentType: false,
			success: function(res){	 
				
				$('#lightbox_image_form').load(image_form_url, function(){
					sync_featured();
				});

				$('#lightbox_gallery_form').load(gallery_form_url, function(){
					$("#gallery_selector").imagepicker();
					set_gallery();
					sync_gallery();
				});
				
				
			}	

		});
		

	});



	//add selected image
	$(document).on('click', '.image', function(e) {
	
		//show selected image
		$(".image").removeClass("image_selected");

		$(this).addClass("image_selected");

		//add to form
		image_filename = $(this).attr('data-filename');

		
         
     });

	$(document).on("click", '#set_image_button', function(evt) {

		$('#featured_image').val(image_filename);

		image_uploads_folder = $('#featured_thumbnail').attr('data-url');

		featured_image_src = image_uploads_folder + image_filename;

		$('#featured_thumbnail').attr('src', featured_image_src);

		$('#lightbox_image').toggle();
		

	});

	//Sync selected image in form with image list after image upload ajax call
	function sync_featured() {

		$(".image").removeClass("image_selected");

		$( ".image" ).each(function() {
  			if( $( this ).attr('data-filename') == $('#featured_image').val() ) {
  				$(this).addClass("image_selected");
  			}
		});

	}


	/*****************************************************

					Gallery Lightbox

	********************************************************/

	$('#set_gallery').click(function() {
  		$('#lightbox_gallery').toggle();
	});

	$('#close_gallery_lightbox').click(function() {
  		$('#lightbox_gallery').toggle();
	});

	var gallery_form_url = $('#lightbox_gallery_form').attr('data-gallerylightbox');

	$('#lightbox_gallery_form').load(gallery_form_url, function(){
		$("#gallery_selector").imagepicker();
		set_gallery();
		sync_gallery();
	});

	function set_gallery() {		

		$('#set_gallery_button').on("click", function(evt){

			set_gallery_form();

			$('#lightbox_gallery').toggle();

		});

	}

	function set_gallery_form() {

			image_uploads_folder = document.getElementById('gallery_images').getAttribute('data-url');

			document.getElementById("gallery_form").innerHTML = "";

			document.getElementById("gallery_images").innerHTML = "";

			$( "#gallery_selector option:selected" ).each(function() {

				var node = document.createElement("option");
				var textnode = document.createTextNode($( this ).val());
				node.appendChild(textnode);
				node.setAttribute("value", $( this ).val());
				node.setAttribute("selected", "true");
				document.getElementById("gallery_form").appendChild(node);

				var myNewElement = document.createElement("img");
				myNewElement.src = image_uploads_folder + $( this ).text();
				document.getElementById("gallery_images").appendChild(myNewElement);

			});

	}


	function sync_gallery() {

		var gallery_selected = document.getElementById('gallery_form');

		for (i = 0; i < gallery_selected.length; i++) {

	        document.getElementById(gallery_selected.options[i].value).selected = "true";

		}

		var gallery_selector = document.getElementById('gallery_selector');

		for ( i=0; i < gallery_selector.length; i++ ) {			

			if (gallery_selector.options[i].selected == true) {

				var thumbs = document.getElementsByClassName('image_picker_image');

				for ( j=0; j < thumbs.length; j++ ) {

					if (thumbs[j].src == gallery_selector.options[i].getAttribute('data-img-src')) {

						thumbs[j].parentNode.className += " selected";
					}
				}


			}
		}


	}
	


}