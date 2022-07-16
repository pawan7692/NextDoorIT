@extends('admin.layout.master')


@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class="d-flex justify-content-between">
		<div>
			<h4>Service Types</h4>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="serviceTypeTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Customer Name</th>
						<th>Customer Email</th>
						<th>Service Type</th>
						<th>Visit Date / Time</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($services as $service)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$service->name}}</td>
						<td>{{$service->email}}</td>
						<td>{{$service->serviceType->title}}</td>
						<td>{{$service->date.' '.$service->time}}</td>
						<td><b>{{$service->status}}</b></td>
						<td><a class="btn btn-primary" role="button">View</a>
							<a role="button" class="btn btn-warning update_status_modal" data-bs-toggle="modal" data-bs-target="#serviceStatusUpdate" data-service-update-status-route={{route('admin.service.update-status', $service->id)}}>
								Update Status
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="serviceStatusUpdate" tabindex="-1" aria-labelledby="serviceStatusUpdateLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="serviceStatusUpdateLabel">Update Service Status</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="updateServiceStatusForm">
					@csrf
				<p>Are you sure you want to update the status?</p>
				<select name="service_status">
					<option value="pending">Pending</option>
					<option value="assigned">Assigned</option>
					<option value="rejected">Rejected</option>
					<option value="rejected">Completed</option>
				</select>
				</form> 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger update_status">Update changes</button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="{{asset('admin/js/service.js')}}"></script>
@endsection