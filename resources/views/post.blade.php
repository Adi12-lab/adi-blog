@extends("layouts.main")
@section("container")

  <h1>{{$post->title}}</h1>
  
  <p>By <a href="/posts?author={{$post->author->username}}">{{$post->author->name}} </a>in <a href="/posts?category={{$post->category->slug}}">{{$post->category->name}}</a></p>
  <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" alt="{{$post->category->name}}" class="img-fluid">
  <article class="my-3">
    {!!$post->body!!}
    <a href="/posts" class="btn btn-secondary">Back to Blog</a>
  </article>
@endsection
