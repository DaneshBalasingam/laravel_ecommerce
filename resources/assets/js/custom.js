$("document").ready(function() {

	$('div.alert').delay(3000).slideUp(300);

	/*Code for tag list*/
	$('#tag_list').select2({

		placeholder: 'Choose a tag',
		tags: true
	});

	$("#gallery_selector").imagepicker({
		
	});

	/*tinymce.init({
	    selector: "#article_textarea",
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});*/

	navigation();

	loadCart();

	Imagelightbox();

	gallery();

	products();


	$('#slide_box :nth-child(1)').addClass("active");


});








