<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration Page</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

	<div class="container">

		<div class="row mt-4">
			<div class="col-md-6 offset-3">
				<h3 class="text-center">Registration Page</h3>
				<form  action="{{route('user.register')}}" method="post" id="user_registration_form">
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
						<label for="userPassword">Password</label>
						<input type="password" class="form-control" id="userPassword" name="user_password" placeholder="Enter Password">
					</div><br/>
					<div class="form-group">
						<label for="userConfirmPassword">Confirm Password</label>
						<input type="password" class="form-control" id="userConfirmPassword"  name="user_confirm_password" placeholder="Confirm Password">
					</div><br/>

					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
	<div id="hello-react"></div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{asset('user/js/registration.js')}}"></script>

</html>