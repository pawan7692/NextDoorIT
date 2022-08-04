$(document).ready( function () {
	$('#previewImg').hide();

});

function readURL(input) {
	if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        	$('#previewImg').show();
            $('#previewImg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload").change(function(){
    readURL(this);
});