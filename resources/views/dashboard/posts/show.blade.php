@extends("dashboard.layouts.main")
@section("container")
<div class="row">
  <div class="col-md-8 ms-auto">
    <h1>{{$post->title}}</h1>
    <a href="/dashboard/posts" class="btn btn-success">
      <span data-feather="arrow-left" class=" align-text-bottom"></span>
      Back to All My Posts
    </a>
    <a href="/dashboard/posts/{{$post->slug}}/edit" class="btn btn-warning">
      <span data-feather="x-circle" class=" align-text-bottom"></span>
      Edit
    </a>
    <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
      @method("delete")
      @csrf
      <button class="btn btn-danger" onclick="return confirm('Are you sure about that ? ');"> <span data-feather="x-circle" class=" align-text-bottom"></span>Delete</button>
    </form>

    <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid my-3">
    <article class="my-3">
      {!!$post->body!!}
    </article>
  </div>
</div>
@endsection
