$(document).ready( function () {

	$('#serviceTypeTable').DataTable();
});


$('body').on('click', '.update_status', function() {
	var $form = $('form#updateServiceStatusForm');
	var update_status_route = $('.update_status_modal').data('service-update-status-route');

	$.ajax({
		type: "POST",
		url: update_status_route,
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

});