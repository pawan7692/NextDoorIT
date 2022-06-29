@extends('user.layout.master')

@section('head-section')

<link rel="stylesheet" type="text/css" href="{{asset('user\plugins\datetimepicker-master\jquery.datetimepicker.css')}}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('main-content')

<h2 style="margin-top:20px;" class="text-center">Service Request Form</h2>
<form  action="{{route('user.service')}}" method="post" id="user_service_form" style="border: 1px solid black; padding:20px; box-shadow: 2px 5px 5px 5px #778DA9;">
	@csrf
	<div class="form-group">
		<label for="userName">Name</label>
		<input type="text" class="form-control" id="userName" name="user_name" placeholder="Enter Name">
	</div><br/>
	<div class="form-group">
		<label for="userPhone">Phone Number</label>
		<input type="number" class="form-control" id="userPhone" name="user_phone" placeholder="Enter Phone Number">

	</div><br/>
	<div class="form-group">
		<label for="userEmail">Email Address</label>
		<input type="email" class="form-control" id="userEmail" name="user_email" placeholder="Enter email">

	</div><br/>
	<div class="form-group">
		<label for="userAddress">Address</label>
		<input type="text" class="form-control" id="userAddress" name="user_address" placeholder="Enter Address">
	</div><br/>

	<div class="form-group">
		<label for="serviceType">Service Types</label>
		<select class="form-control" name="service_type">
			<option selected="selected" disabled="disabled">--Select Service Type--</option>
			<option value="broadband-service">BroadBand Service</option>
			<option value="computer-repair">Computer Repair</option>

		</select>
	</div><br/>

	<div class="row">
		<div class="col-md-6">
	<div class="form-group">
		<label for="userPassword">Visit Date</label>
		<input class="form-control" type="date" name="visit_date" />

	</div>
</div>
<div class="col-md-6">

	<div class="form-group">
		<label for="userPassword">Visit Time</label>
		<input class="form-control" type="time" name="visit_time" />

	</div>
</div>
</div><br/>

	<div class="form-group">
		<label for="serviceDescription">Description</label>
		<textarea class="form-control" id="serviceDescription" name="service_description" rows="3"></textarea>
	</div><br/>

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('footer-section')

<script src="{{asset('user\plugins\datetimepicker-master\jquery.datetimepicker.js')}}"></script>
<script>

	$('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });

	//$(function(){
//   $("#demo").datetimepicker();
// });



</script>

<script src="{{asset('user/js/service.js')}}"></script>

@endsection