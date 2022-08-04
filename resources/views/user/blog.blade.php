@extends('user.layout.master')

@section('main-content')
<div class="container">
	<section class="text-center">
        <h4 class="mb-5"><strong>Latest posts</strong></h4>

        <div class="row">
        	@foreach($posts as $post)
        	<div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{asset('admin/uploads/post/'.$post->banner)}}" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="{{route('user.post.show', $post->slug)}}" style="text-decoration: none;"> {{$post->title}}</a></h5>
                <p class="card-text">
                  {!! $post->description !!}
                </p>
                <p><b>Category: </b>{{$post->category->name}}</p>
                <p><b>Tags: </b>
                	@foreach($post->tags as $tag)
                	{{$tag->name}}
                	@endforeach
                </p>
                <a href="#!" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>
        	@endforeach
          

          
        </div>

       
      </section>
	</div>
@endsection