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
		<div>
			<a href="{{route('admin.service-type.create')}}" class="btn btn-success">Create</a>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="serviceTypeTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($serviceTypes as $serviceType)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$serviceType->title}}</td>
						<td>{{$serviceType->slug}}</td>
						<td>{{$serviceType->status? 'Active': 'Not-Active'}}</td>
						<td><a class="btn btn-primary" role="button">View</a><a class="btn btn-warning" role="button">Edit</a><a class="btn btn-danger" role="button">Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>
@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="{{asset('admin/js/custom/serviceTypes.js')}}"></script>
@endsection