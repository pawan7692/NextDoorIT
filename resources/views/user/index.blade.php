@extends('user.layout.master')

@section('head-section')
<style>
section {
	padding-top: 50px;
	padding-bottom: 50px;
}

section h1 {
	text-transform: uppercase;
	font-weight: 900;
	color: #683aa4;
	text-align: left;
	margin-bottom: 20px;
}

section p {
	font-size: 16px;
	font-weight: 300;
}

button {
	max-width: 50%;
	border-radius: 50px !important;
}

.col {
	justify-content: center;
	flex-direction: column;
	display: flex;
}

.img-col {
	justify-content: flex-end;
	margin-top: 100px;
}

.card {
	box-shadow: 11px 7px 3px #f9f9f9;
	border: 0;
	text-align: center;
}

.icon {
	width: 50px;
	height: 50px;
}

#customer-reviews .user-photo {
    width: 120px;
    border-radius: 100%;
    overflow: hidden;
    margin: 0 auto;
}
</style>

@endsection
@section('main-content')

<section>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>NextDoorIT</h1>
				<p>MyMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy WebsiteMy Website Website</p>
				<button type="button" class="btn btn-dark btn-large">Learn More</button>
			</div>
			<div class="col img-col">
				<img src="{{asset('user/img/section1.jpg')}}" class="img-fluid" />
			</div>
		</div>

		<div class="row cards">

			<div class="col-md-4 flex justify-content-center">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<img src="{{asset('user/img/section1.jpg')}}" class="icon" />
						<h5 class="card-title">Web Dev</h5>
						<p class="card-text">asdasdsad asd asd as dsa das das d asd sad as d asd.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 flex justify-content-center">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<img src="{{asset('user/img/section1.jpg')}}" class="icon" />
						<h5 class="card-title">Web Dev</h5>
						<p class="card-text">asdasdsad asd asd as dsa das das d asd sad as d asd.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 flex justify-content-center">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<img src="{{asset('user/img/section1.jpg')}}" class="icon" />
						<h5 class="card-title">Web Dev</h5>
						<p class="card-text">asdasdsad asd asd as dsa das das d asd sad as d asd.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="customer-reviews" class="bg-danger py-5">
		
    <div class="container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="col-sm-8 mx-auto">
                <div class="carousel-inner text-center text-white py-5">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <div class="user-photo shadow">
                            <img src="{{asset('user/img/user-img.jpg')}}" class="img-fluid" alt="testimonial slider">
                        </div>
                        <div class="slider-caption mt-3">
                            <p class="fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <figcaption class="blockquote-footer mt-3 text-white fs-5"><cite>Gurdeep Dahiya</cite></figcaption>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <div class="user-photo shadow">
                            <img src="{{asset('user/img/user-img.jpg')}}" class="img-fluid" alt="testimonial slider">
                        </div>
                        <div class="slider-caption mt-3">
                            <p class="fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <figcaption class="blockquote-footer mt-3 text-white fs-5"><cite>Rajnish Kumar</cite></figcaption>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <div class="user-photo shadow">
                            <img src="{{asset('user/img/user-img.jpg')}}" class="img-fluid" alt="testimonial slider">
                        </div>
                        <div class="slider-caption mt-3">
                            <p class="fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <figcaption class="blockquote-footer mt-3 text-white fs-5"><cite>Pardeep Dahiya</cite></figcaption>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
	</section>
	@endsection