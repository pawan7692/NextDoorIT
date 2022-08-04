@extends('admin.layout.master')

@section('head-section')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Post</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.posts.store')}}" method="post" id="postCreateForm">
			@csrf
			<div class="mb-3 form-group">
				<label for="postTitle" class="form-label">Title</label>
				<input type="text" class="form-control" id="postTitle" aria-describedby="postTitle" name="post_title">
				
			</div>

			<div class="form-group mb-3">
			  <label for="formFile" class="form-label">Post Banner</label>
			  <input class="form-control" type="file" id="imageUpload" name="post_banner">
			  <img id="previewImg" src="#" height="300" class="mt-3">
			</div>
			
			<div class="form-group">
				<label for="serviceType">Category</label>
				<select class="form-control" name="post_category">
					<option selected="selected" disabled="disabled">--Select Category--</option>
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div> <br/>

			<div class="form-group">
				<label for="serviceType">Tags</label>
				<select class="form-control" name="post_tags" multiple="multiple">
					<option disabled="disabled">--Select Tag--</option>
					@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
			</div> <br/>

			<div class="form-group">
				<label for="postDescription">Post Description</label>
				<textarea class="summernote" name="post_description" id="postDescription"></textarea>
			</div>
			<br/>

			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="postStatus" name="post_status">
				<label class="form-check-label" for="postStatus">Status</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('admin/js/toggle-switch/lc_switch.js')}}"></script>

<script>
	

	lc_switch('input[name="post_status"]');


	$('select').select2();

</script>
<script src="{{asset('admin/js/custom/posts.js')}}"></script>
@endsection