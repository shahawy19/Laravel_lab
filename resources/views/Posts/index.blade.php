@extends('layouts.app')


@section('title') Index @endsection
@section('content')

<div class="text-center">
	<a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Slug</th>
			<th scope="col">Title</th>
			<th scope="col">Posted By</th>
			<th scope="col">Created At</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $post)
		<tr>
			<td>{{$post['id']}}</th>
			<td>{{$post['slug']}}</th>
			<td>{{$post['title']}}</td>
			<td>{{$post->user->name}}</td>
			<td>{{ $post->created_at->format('Y-m-d') }}</td>
			<td>
				<form style="display: inline ;" action="{{route('posts.show', $post['id'])}}" method="GET">
					@csrf
					<x-button class="info" text="View" />
				</form>
				<form style="display: inline ;" action="{{route('posts.edit', $post['id'])}}" method="GET">
					@csrf

					<x-button class="primary" text="Edit" />
				</form>
				<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Delete
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
					aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Are you sure you want to delete this post ?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
								<form style="display: inline ;" action="{{route('posts.destroy', $post['id'])}}"
									method="POST">
									@csrf
									@method('Delete')
									<x-button class="danger" text="Yes" />

								</form>
							</div>
						</div>
					</div>
				</div>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="d-flex justify-content-center">
	{!! $posts->links() !!}
</div>
@endsection