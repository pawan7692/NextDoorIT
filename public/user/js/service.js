$(function() {

	var $form = $('form#user_service_form');
	var error = $('alert-danger', $form);
	var success = $('alert-success', $form);

	$form.validate({
		rules: {
			user_name : {
				required: true,
				minlength: 3
			},
			user_phone : {
				required: true,
				digits:true,
				minlength: 10,
				maxlength: 10
			},
			user_email : {
				required: true,
			},
			user_address : {
				required: true,
				minlength: 6
			},
			service_type : {
				required: true,
			},
			visit_date : {
				required: true,
			},
			visit_time : {
				required: true,
			},
			service_description: {
				required: true,
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

