@extends('admin.layout.master')

@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Service Types</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.service-type.store')}}" method="post" id="serviceTypeForm">
			@csrf
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Title</label>
				<input type="text" class="form-control" id="serviceType" aria-describedby="serviceType" name="service_type_title">
				
			</div>
			
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="serviceTypeStatus" name="service_type_status">
				<label class="form-check-label" for="serviceTypeStatus">Status</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="{{asset('admin/js/serviceTypes.js')}}"></script>
@endsection