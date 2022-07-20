$(document).ready( function () {

	$('#serviceTypeTable').DataTable();

	$('.summernote').summernote({
		height: 300
	});

	lc_switch('input[name="tag_status"]');
});

$(function() {
	
	var $form = $('form#tagCreateForm');
	var error = $('alert-danger', $form);
	var success = $('alert-success', $form);

	$form.validate({
		rules: {
			tag_name : {
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
			
			$.ajax({
	            type: "POST",
	            url: $form.attr('action'),
	            data: $form.serializeArray(),
	            timeout: 3000,
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



$('body').on('click', '.tag_delete', function() {
	var $form = $('form#tagDeleteForm');

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