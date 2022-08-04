@extends('admin.layout.master')


@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection



@section('main-content')

<div class = "container-fluid">
	<div class="d-flex justify-content-between">
		<div>
			<h4>Member Discounts</h4>
		</div>
		<div>
			<a href="{{route('admin.member-discounts.create')}}" class="btn btn-success">Create</a>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="serviceTypeTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Type</th>
						<th>Slug</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($memberDiscounts as $memberDiscount)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$memberDiscount->type}}</td>
						<td>{{$memberDiscount->slug}}</td>
						<td><b>{{$memberDiscount->status? 'Active': 'Not-Active'}}</b></td>
						<td><a class="btn btn-primary" role="button">View</a><a class="btn btn-warning" role="button">Edit</a><a href="javascript:void(0)" class="btn btn-danger delete_btn" data-bs-toggle="modal" data-bs-target="#memberDiscount" role="button" data-delete-route={{route('admin.member-discounts.destroy', $memberDiscount->id)}}>Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="memberDiscountDelete" tabindex="-1" aria-labelledby="memberDiscountDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="memberDiscountyDeleteForm">
			@csrf

		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="serviceStatusUpdateLabel">Delete Member Discount</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				
				<p>Are you sure you want to delete this Member Discount?</p>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger update_status member_discount_delete">Delete</button>
		</div>
	</div>
</form>
</div>
</div>

@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="{{asset('admin/js/custom/memberDiscounts.js')}}"></script>
@endsection