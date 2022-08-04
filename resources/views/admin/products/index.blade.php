@extends('admin.layout.master')


@section('head-section')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection


@section('main-content')

<div class = "container-fluid">
	<div class="d-flex justify-content-between">
		<div>
			<h4>Posts</h4>
		</div>
		<div>
			<a href="{{route('admin.posts.create')}}" class="btn btn-success">Create</a>
		</div>
	</div>
	<br/>

	<div class = "row">
		<form>
			<table id="postTable">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Banner</th>
						<th>Category</th>
						<th>Tags</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>

				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->slug}}</td>
						<td><img src="{{asset('admin/uploads/post/'.$post->banner)}}" height="100"></td>
						<td>{{$post->category->name}}</td>
						<td>
							@foreach($post->tags as $tag) 
								{{$tag->name}} 
							@endforeach
						</td>
						<td><b>{{$post->status? 'Active': 'Not-Active'}}</b></td>
						<td><a class="btn btn-primary" role="button">View</a><a class="btn btn-warning" role="button">Edit</a><a href="javascript:void(0)" class="btn btn-danger delete_btn" data-bs-toggle="modal" data-bs-target="#postDelete" role="button" data-delete-route={{route('admin.posts.destroy', $post->id)}}>Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="postDelete" tabindex="-1" aria-labelledby="postDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="postDeleteForm">
			@csrf

			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="serviceStatusUpdateLabel">Delete Post</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<p>Are you sure you want to delete this post?</p>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger update_status post_delete">Delete</button>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@section('footer-section')

<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
	$('#postTable').DataTable();
</script>
<script src="{{asset('admin/js/custom/posts.js')}}"></script>
@endsection