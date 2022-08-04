@extends('user.layout.master')

@section('main-content')
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted {{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</div>
                           
                            <!-- Post categories-->
                            @foreach($post->tags as $tag)
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$tag->name}}</a>
                            @endforeach
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{asset('admin/uploads/post/'.$post->banner)}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                        	{!!$post->description!!}
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                
                                <!-- Single comment-->
                               
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    	@foreach($categories as $category)
                                        <li><a href="#!" style="text-decoration: none;">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                   {{--  <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div> --}}
                </div>
            </div>
        </div>
@endsection