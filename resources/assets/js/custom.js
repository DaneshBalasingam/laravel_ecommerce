$("document").ready(function() {

	$('div.alert').delay(3000).slideUp(300);

	/*Code for tag list*/
	$('#tag_list').select2({

		placeholder: 'Choose a tag',
		tags: true
	});

	$("#gallery_selector").imagepicker({
		
	});

	navigation();

	loadCart();

	Imagelightbox();

	

	//loadFeaturedLightbox();

	//loadGalleryLightbox();

	//loadEditLightbox();

	/*$('#open_add_image').click(function() {

  		$( "#add_image_section" ).toggle( "slow" );
	});*/


});








