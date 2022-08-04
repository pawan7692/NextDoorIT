$(document).ready( function () {
	$('#previewImg').hide();

	$('.summernote').summernote({
		height: 300
	});
});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
    	if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).attr('height', 200).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#imageUpload').on('change', function() {
        imagesPreview(this, 'div#previewImg');
    });
});

$(function() {
	
	var $form = $('form#productCreateForm');
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
			var totalImages = $('input[name="product_images[]"]')[0].files.length;
			
			var images = $('input[name="product_images[]"]')[0];
			
			for (var i = 0; i<totalImages; i++) {
				formData.append('product_images'+i, images.files[i])
			}
			
			formData.append('totalImages', totalImages);

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
	            	alert('success');
	            	if(data.status) {
	            		toastr.success(data.message);

		            	if(data.redirect) {
			        		setTimeout(function(){
			        			window.location.href = data.redirect;
			        		}, 1000);
		        		}	
	            	} else {
	            		alert('error');
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
