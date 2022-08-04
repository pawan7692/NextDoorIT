@extends('admin.layout.master')


@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@endsection



@section('main-content')

<div class = "container-fluid">
	<div class="d-flex justify-content-between">
		<div>
			<h4>Categories</h4>
		</div>
		<div>
			<a href="{{route('admin.brands.create')}}" class="btn btn-success">Create</a>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="brandTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Image</th>
						<th>Products Count</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($brands as $brand)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$brand->name}}</td>
						<td>{{$brand->slug}}</td>
						<th><img src="{{asset('admin/uploads/brand/'.$brand->image)}}" height="100"></th>
						<th>{{$brand->products->count()}}</th>
						<td><b>{{$brand->status? 'Active': 'Not-Active'}}</b></td>
						<td><a class="btn btn-primary" role="button">View</a><a class="btn btn-warning" role="button">Edit</a><a href="javascript:void(0)" class="btn btn-danger delete_btn" data-bs-toggle="modal" data-bs-target="#brandDelete" role="button" data-delete-route={{route('admin.brands.destroy', $brand->id)}}>Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="brandDelete" tabindex="-1" aria-labelledby="brandDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="brandDeleteForm">
			@csrf

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="serviceStatusUpdateLabel">Delete Brand</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<p>Are you sure you want to delete this brand?</p>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger update_status brand_delete">Delete</button>
		</div>
	</div>
</form>
</div>
</div>

@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
	$(function() {
		$('#brandTable').DataTable();
	});
</script>

<script src="{{asset('admin/js/custom/brands.js')}}"></script>
@endsection