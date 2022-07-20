@extends('admin.layout.master')

@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Category</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.categories.store')}}" method="post" id="categoryCreateForm">
			@csrf
			<div class="mb-3">
				<label for="categoryName" class="form-label">Title</label>
				<input type="text" class="form-control" id="categoryTitle" aria-describedby="categoryName" name="category_name">
				
			</div>
			
			<div class="form-group">
				<label for="categoryDescription">Category Description</label>
				<textarea class="summernote" name="categroy_description" id="categoryDescription"></textarea>
			</div>
			<br/>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="categoryStatus" name="category_status">
				<label class="form-check-label" for="categoryStatus">Status</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{asset('admin/js/toggle-switch/lc_switch.js')}}"></script>

<script src="{{asset('admin/js/custom/categories.js')}}"></script>
@endsection