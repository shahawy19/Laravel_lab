@extends('layouts.app')


@section('title') update @endsection
@section('content')
<form action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data" method="POST">

  @csrf
  @method('PUT')
  @include('layout.error')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1"
      aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <input name="description" value="{{$post->description}}" type="text" class="form-control" id="exampleInputEmail1"
      aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Post Creator</label>
    <select name="post_creator" class="form-control">
      @foreach ($users as $user)
      <option value="{{$user->id}}">{{ $user->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
		<label for="exampleInputEmail1" class="form-label">image</label>
		<input type="file" class="form-control" name="image">
	</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection