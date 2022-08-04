$(function() {
	
	var $form = $('form#memberDiscountFeatureCreateForm');
	var error = $('alert-danger', $form);
	var success = $('alert-success', $form);

	$form.validate({
		rules: {
			category_name : {
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
			var singleFeaturesList = [];
			var dictionaryValue = {};
			//var singleFeaturesList = $.map()

			var other_data = $form.serializeArray();
			$.each(other_data, function(key, input) {

				formData.append(input.name, input.value);
			});

			$(".single-feature").each(function() {
				
				dictionaryValue['a'] = 1;
				singleFeaturesList.push(dictionaryValue);

			});
			
			formData.append('singleFeaturesLists', JSON.stringify(singleFeaturesList));

			console.log(singleFeaturesList);

			//return;

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


$( "#addNewFeatureBtn" ).click(function() {

	$('#featuresWrapper').append('<div class="single-feature mt-3">'
						+'<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">'
						+'<input type="checkbox" class="form-check-input" id="memberDiscountStatus" name="member_discount_status">'
						+'<label class="form-check-label" for="memberDiscountStatus">Is Valid</label>'
					+'</div>');
});

