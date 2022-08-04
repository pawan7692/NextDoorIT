<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registration</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<style>
	* {
		padding: 0;
		margin: 0;
		box-sizing: border-box
	}

	body {
		background-color: #eee;
		height: 100vh;
		font-family: 'Poppins', sans-serif;
		background: linear-gradient(to top, #fff 10%, rgba(50, 27, 54, 0.4) 90%) no-repeat
	}

	.wrapper {
		max-width: 500px;
		border-radius: 10px;
		margin: 50px auto;
		padding: 30px 40px;
		box-shadow: 20px 20px 80px rgb(206, 206, 206)
	}

	.h2 {
		font-family: 'Calibri', cursive;
		font-size: 4.0rem;
		font-weight: bold;
		color: #415A77;
		font-style: italic
	}

	.h4 {
		font-family: 'Calibri', sans-serif;
		font-size: 1.5rem;
	}

	.input-field {
		border-radius: 5px;
		padding: 5px;
		display: flex;
		align-items: center;
		cursor: pointer;
		border: 1px solid #400485;
		color: #400485
	}

	.input-field:hover {
		color: #7b4ca0;
		border: 1px solid #7b4ca0
	}

	input {
		border: none;
		outline: none;
		box-shadow: none;
		width: 100%;
		padding: 0px 2px;
		font-family: 'Poppins', sans-serif
	}

	.fa-eye-slash.btn {
		border: none;
		outline: none;
		box-shadow: none
	}

	a {
		text-decoration: none;
		color: #400485;
		font-weight: 700
	}

	a:hover {
		text-decoration: none;
		color: #7b4ca0
	}

	.option {
		position: relative;
		padding-left: 30px;
		cursor: pointer
	}

	.option label.text-muted {
		display: block;
		cursor: pointer
	}

	.option input {
		display: none
	}

	.checkmark {
		position: absolute;
		top: 3px;
		left: 0;
		height: 20px;
		width: 20px;
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 50%;
		cursor: pointer
	}

	.option input:checked~.checkmark:after {
		display: block
	}

	.option .checkmark:after {
		content: "";
		width: 13px;
		height: 13px;
		display: block;
		background: #400485;
		position: absolute;
		top: 48%;
		left: 53%;
		border-radius: 50%;
		transform: translate(-50%, -50%) scale(0);
		transition: 300ms ease-in-out 0s
	}

	.option input[type="radio"]:checked~.checkmark {
		background: #fff;
		transition: 300ms ease-in-out 0s;
		border: 1px solid #400485
	}

	.option input[type="radio"]:checked~.checkmark:after {
		transform: translate(-50%, -50%) scale(1)
	}

	.btn.btn-block {
		border-radius: 20px;
		background-color: #023e8a;
		color: #fff
	}

	.btn.btn-block:hover {
		background-color: #0077b6
	}

	@media(max-width: 575px) {
		.wrapper {
			margin: 10px
		}
	}

	@media(max-width:424px) {
		.wrapper {
			padding: 30px 10px;
			margin: 5px
		}

		.option {
			position: relative;
			padding-left: 22px
		}

		.option label.text-muted {
			font-size: 0.95rem
		}

		.checkmark {
			position: absolute;
			top: 2px
		}

		.option .checkmark:after {
			top: 50%
		}

		#forgot {
			font-size: 0.95rem
		}
	}
</style>
</head>

<body>

	<div class="container">
		<!-- Pills navs -->
		<div class="wrapper bg-white">
			<div class="h2 text-center">NextDoorIT</div>
			<div class="h4 text-muted text-center pt-2">Enter your Details</div>
			<form class="pt-3" action="{{route('user.register')}}" method="post" id="user_registration_form">
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

				
				
				<div class="d-grid gap-2">
				<button class="btn btn-block text-center my-3">Register</button>
				</div>
				<div class="text-center pt-3 text-muted">Already registered? <a href="{{route('user.login')}}">Sign In</a></div>
			</form>
		</div>
		<!-- Pills content -->
	</div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{asset('user/js/registration.js')}}"></script>

</html>

