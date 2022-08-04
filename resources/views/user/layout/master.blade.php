<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	


	@yield('head-section')

</head>

<header>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0d1b2a">
    <div class="container-fluid">
        <a href="#" class="navbar-brand" style="color: #778DA9">NextDoorIT</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{route('user.home')}}" class="nav-item nav-link active" style="color: #177e89; font-weight: bold;">Home</a>
                <a href="{{route('user.service')}}" class="nav-item nav-link" style="color: #177e89; font-weight: bold;">Services</a>
                <a href="{{route('user.products')}}" class="nav-item nav-link" style="color: #177e89; font-weight: bold;">Shopping</a>
                <a href="{{route('user.posts')}}" class="nav-item nav-link" style="color: #177e89; font-weight: bold;">Blog</a>
                <a href="{{route('user.member-discounts')}}" class="nav-item nav-link" style="color: #177e89; font-weight: bold;">Member Discounts</a>
                <a href="{{route('user.member-discounts')}}" class="nav-item nav-link" style="color: #177e89; font-weight: bold;">Mobile & Web Apps</a>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="{{route('user.login')}}" class="nav-item nav-link" style="color: #95b8d1; font-weight: bold;">Login</a>
                <a href="{{route('user.register')}}" class="nav-item nav-link" style="color: #95b8d1; font-weight: bold;">Register</a>
            </div>
        </div>
    </div>
</nav>

	
</header>
<body style="background-color: #E0E1DD;">
	<div class="container">
		@yield('main-content')
	</div>
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('footer-section')



</html>