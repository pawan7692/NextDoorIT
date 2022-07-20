<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title></title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	
	<link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">

	@yield('head-section')
	<script
	src="https://code.jquery.com/jquery-3.6.0.min.js"
	integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
	crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</head>
<body>
	<!--navigation bar -->

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">

			<!--offcanvas -->

			<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" style="color:white;">
				asdadasd
				{{-- <span class="navbar-toogle-icon"  data-bs-target="#offcanvasExample">asdasd</span> --}}
			</button>
			<!--offcanvas -->
			<a class="navbar-brand fw-bold text-uppercase me-auto ms-lg-0 ms-3" href="#">NextDoorIT</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<form class="d-flex ms-auto my-3 my-lg-3">


					<div class="input-group">
						<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
						<button class="btn btn-primary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
					</div>

				</form>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-person"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="#">Action</a></li>
							<li><a class="dropdown-item" href="#">Another action</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--navigation bar -->

	

	<div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">

		<div class="offcanvas-body">
			<nav class="navbar-dark">
				<ul class="navbar-nav">
					<li>
						<div class="text-muted small fw-bold text-uppercase px-3">Hello</div>
					</li>

					<li>
						<a href="#" class="nav-link px-3 active">
							<span class="me-2"><i class="bi bi-speedometer-2"></i></span>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href="#" class="nav-link px-3 active">
							<span class="me-2"><i class="bi bi-speedometer-2"></i></span>
							<span>Services</span>
						</a>
					</li>
					<li class="my-4"><hr class="dropdown-divider bg-light"></li>
					<li>
						<div class="text-muted small fw-bold text-uppercase px-3">News & Blog</div>
					</li>
					<li>
						<a href="{{route('admin.categories.index')}}" class="nav-link px-3 active">
							<span class="me-2"><i class="bi bi-speedometer-2"></i></span>
							<span>Categories</span>
						</a>
					</li>
					<li>
						<a href="{{route('admin.tags.index')}}" class="nav-link px-3 active">
							<span class="me-2"><i class="bi bi-speedometer-2"></i></span>
							<span>Tags</span>
						</a>
					</li>
					<li>
						<a href="{{route('admin.posts.index')}}" class="nav-link px-3 active">
							<span class="me-2"><i class="bi bi-speedometer-2"></i></span>
							<span>Posts</span>
						</a>
					</li>
					<li class="my-4"><hr class="dropdown-divider bg-light"></li>


				</ul>
			</nav>

		</div>
	</div>

	<main class="mt-10 pt-10">
		@yield('main-content')

	</main>
	
</body>

<footer>
	
	@yield('footer-section')
</footer>
</html>