@extends('admin.layout.master')

@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection


@section('main-content')

<div class = "container-fluid">
	<div class ="row">
		<div class="col-md-12">
			<h4>Add Memner Discount</h4>
		</div>
	</div>

	<div class = "row">
		<form action="{{route('admin.member-discounts.store')}}" method="post" id="cmemberDiscountCreateForm">
			@csrf
			<div class="mb-3">
				<label for="memberDiscountType" class="form-label">Member Discount Type</label>
				<select class="form-control" name="member_discount_type" id="memberDiscountType">
					<option selected="selected" disabled="disabled">--Select Member Discount Type--</option>
					<option value="monthly">Monthly</option>
					<option value="half-yearly">Half-Yearly</option>
					<option value="yealry">Yearly</option>
				</select>
				
			</div>
			<div class="mb-3">
				<label for="memberDiscountPrice" class="form-label">Member Discount Price</label>
				<input type="number" class="form-control" id="memberDiscountPrice" aria-describedby="memberDiscountPrice" name="member_discount_price">
				
			</div>

			<div class="mb-3">
				<label for="memberDiscountDuration" class="form-label">Member Discount Duration</label>
				<input type="number" class="form-control" id="memberDiscountDuration" aria-describedby="memberDiscountDuration" name="member_discount_duration">
				
			</div>
			
			<br/>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="memberDiscountStatus" name="member_discount_status">
				<label class="form-check-label" for="memberDiscountStatus">Status</label>
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

<script src="{{asset('admin/js/custom/memberDiscounts.js')}}"></script>
@endsection