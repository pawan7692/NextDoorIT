@extends('admin.layout.master')


@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class="d-flex justify-content-between">
		<div>
			<h4>Tags</h4>
		</div>
		<div>
			<a href="{{route('admin.tags.create')}}" class="btn btn-success">Create</a>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="serviceTypeTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($tags as $tag)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$tag->name}}</td>
						<td>{{$tag->slug}}</td>
						<td><span class="{{$tag->status?'text-success':'text-danger'}}"><b>{{$tag->status? 'Active': 'Not-Active'}}</b></span></td>
						<td><a class="btn btn-primary" role="button">View</a>&nbsp;&nbsp;<a class="btn btn-warning" role="button">Edit</a>&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-danger delete_btn" data-bs-toggle="modal" data-bs-target="#tagDelete" role="button" data-delete-route={{route('admin.tags.destroy', $tag->id)}}>Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tagDelete" tabindex="-1" aria-labelledby="tagDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="tagDeleteForm">
			@csrf

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="serviceStatusUpdateLabel">Delete Tag</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<p>Are you sure you want to delete this tag?</p>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger update_status tag_delete">Delete</button>
		</div>
	</div>
</form>
</div>
</div>

@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="{{asset('admin/js/custom/tags.js')}}"></script>
@endsection