@extends('admin.layout.master')

@section('head-section')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Brand</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.brands.store')}}" method="post" id="brandCreateForm">
			@csrf
			<div class="mb-3">
				<label for="brandName" class="form-label">Title</label>
				<input type="text" class="form-control" id="categoryTitle" aria-describedby="brandName" name="brand_name">
			</div>

			<div class="form-group mb-3">
			  <label for="formFile" class="form-label">Brand Logo</label>
			  <input class="form-control" type="file" id="imageUpload" name="brand_image">
			  <img id="previewImg" src="#" height="300" class="mt-3">
			</div>
			
			<div class="form-group">
				<label for="categoryDescription">Brand Description</label>
				<textarea class="summernote" name="brand_description" id="brandDescription"></textarea>
			</div>
			<br/>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="brandStatus" name="brand_status">
				<label class="form-check-label" for="brandStatus">Status</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('footer-section')


<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{asset('admin/js/toggle-switch/lc_switch.js')}}"></script>

<script>
	$(function() {
			$('.summernote').summernote({
		height: 300
	});

	lc_switch('input[name="brand_status"]');
	});
</script>

<script src="{{asset('admin/js/custom/brands.js')}}"></script>
@endsection