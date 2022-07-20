@extends('admin.layout.master')

@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Tag</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.tags.store')}}" method="post" id="tagCreateForm">
			@csrf
			<div class="mb-3">
				<label for="tagyName" class="form-label">Title</label>
				<input type="text" class="form-control" id="tagTitle" aria-describedby="tagyName" name="tag_name">
				
			</div>
			
			
			<br/>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="tagStatus" name="tag_status">
				<label class="form-check-label" for="tagStatus">Status</label>
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

<script src="{{asset('admin/js/custom/tags.js')}}"></script>
@endsection