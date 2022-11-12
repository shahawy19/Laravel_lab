@extends('layouts.app')


@section('title') Post {{$post->id}} @endsection
@section('content')
<table class="table mt-4">
	<thead>
		<tr>
			<th scope="col">Post info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Title : {{$post->title}}</td>
		</tr>
		<tr>
			<td>Description: </td>
		</tr>
		<tr>
			<td>{{$post->description}}</td>
		</tr>
		@if(!empty($post->image))
		<tr>
			<img src="{{ asset("/$post->image") }}" class="image-fluid" width="250px">
		</tr>
		@endif
	</tbody>
</table>
<table class="table mt-4">
	<thead>
		<tr>
			<th scope="col">Post Creator info</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Name : {{$post->user->name}}</td>
		</tr>
		<tr>
			<td>Email: {{$post->user->email}}</td>
		</tr>
		<tr>
			<td>Created At : {{$post->user ? $post->created_at->format('Y-m-d') : 'Not Defined'}} </td>
		</tr>
	</tbody>
</table>
<form action="{{route('comments.store',$post->id)}}" method="POST">

	@csrf
	<div class="mb-3">
		<label for="exampleInputEmail1" class="form-label"> <b>New Comment</b> </label>
		<input name="comment" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	</div>

	<button type="submit" class="btn btn-primary">Add Comment</button>
</form>
<table class="table mt-4">
	<thead>
		<tr>
			<th scope="col">Comments</th>
		</tr>
	</thead>
	<tbody>

		@foreach ($comments as $comment)
		<tr>
			<td> {{$comment->body}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection