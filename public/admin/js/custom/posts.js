$(document).ready( function () {
	$('#previewImg').hide();

	$('.summernote').summernote({
		height: 300
	});
});



$("#postBanner").change(function(){
    readURL(this);
});

$(function() {
	
	var $form = $('form#postCreateForm');
	var error = $('alert-danger', $form);
	var success = $('alert-success', $form);

	$form.validate({
		rules: {
			post_title : {
				required: true,
				minlength: 3
			}
		},
		errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    },
		submitHandler: function(form) {
			
			var formData = new FormData();
			var post_banner = $('input[name="post_banner"]').val();

			if(post_banner)
			{
				var file_data = $('input[name="post_banner"]')[0].files[0];
				formData.append("post_banner", file_data);
			}

			var other_data = $form.serializeArray();
			$.each(other_data, function(key, input) {

				formData.append(input.name, input.value);

			});

			$.ajax({
	            type: "POST",
	            url: $form.attr('action'),
	            data: formData,
	            timeout: 3000,
	            processData: false,
	            contentType: false,
	            success: function(data) {

	            	if(data.status) {
	            		toastr.success(data.message);

		            	if(data.redirect) {
			        		setTimeout(function(){
			        			window.location.href = data.redirect;
			        		}, 1000);
		        		}	
	            	} else {
	            		
	            		if(data.errors) {
	            			
	            			errorMessage = '<ul>';
		            		
		            		$.each(data.errors, function( index, value ) {
							  errorMessage += '<li>'+value+'</li>';
							});
							
							errorMessage += '</ul>';
							
							toastr.error(errorMessage, {
		            			escapeHtml:false
		            		});	
	            		}

	            		if(data.message) {
	            			console.log("1");
	            			toastr.error(data.message);
	            		}
	            	}
	            	
	            },
	            error: function(data) {

	            	toastr.error("Error Occurred at Server Side");
	            }
          	});
          return false;
   			
  		}
	});

	
});



$('body').on('click', '.post_delete', function() {
	var $form = $('form#postDeleteForm');

	var delete_btn_url = $('.delete_btn').data('delete-route');
	
	$.ajax({
		type: "DELETE",
		url: delete_btn_url,
		data: $form.serializeArray(),
		timeout: 3000,
		success: function(data) {

			if(data.status) {
				

				if(data.redirect) {
					setTimeout(function(){
						window.location.href = data.redirect;
					}, 1000);
				}	
			}

			if(data.message) {

				toastr.success(data.message);
			}
			
			
		},
		error: function(data) {

			toastr.error("Error Occurred at Server Side");
		}
	});

});