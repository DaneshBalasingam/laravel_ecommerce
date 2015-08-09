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

	gallery();

	$('.product_thumb_wrap:nth-child(3n)').after('<div class="clearfix visible-lg visible-md"></div>');

	

	//loadFeaturedLightbox();

	//loadGalleryLightbox();

	//loadEditLightbox();


});








