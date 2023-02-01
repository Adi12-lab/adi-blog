@extends('layouts.main')
@section('container')
<h1 class="text-center">{{$title}}</h1>

<div class="row justify-content-center">
  <div class="col-md-8">
    <form action="/posts">
      <div class="input-group mb-3">
        @if(request("category"))
          <input type = "hidden" name = "category"value = "{{request("category")}}">
        @elseif(request("author"))
          <input type = "hidden" name = "author"value = "{{request("author")}}">
        @endif
        <input type="text" class="form-control" placeholder="Search Anything" value="{{ request("search") }}" name="search" >
        <button class="btn btn-success" type="submit" >Search</button>
      </div>
    </form>
  </div>
</div>
@if($posts->count())
<div class="card mb-3">
  <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" alt="{{$posts[0]->category->name}}">
  <div class="card-body text-center">
    <h5 class="card-title">{{$posts[0]->title}}</h5>
    <small class="text-muted">
      <p class="card-text">
        By. <a href="/posts?author={{$posts[0]->author->username}}">{{$posts[0]->author->name}}</a> in <a href="/posts?category={{$posts[0]->category->slug}}">{{$posts[0]->category->name}}</a>
      </p>
    </small>
    <p class="card-text">
      {{$posts[0]->excerpt}}
    </p>
    <a href="/post/{{$posts[0]->slug}}" class="btn btn-primary">Read More</a>
  </div>
  <div class="card-footer text-muted">
    Updated {{$posts[0]->updated_at->diffForHumans()}}
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach($posts->skip(1) as $post)
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="position-absolute bg-dark px-3 py-2">
          <a href="/posts?category={{$post->category->slug}}" class="text-decoration-none text-white">{{$post->category->name}}</a>
        </div>
        <img src="https://source.unsplash.com/900x400?{{$post->category->name}}" class="card-img-top" alt="{{$post->category->name}}">
        <div class="card-body px-3 py-2">
          <h5 class="card-title">{{$post->title}}</h5>
          <a href="/posts?author={{$post->author->username}}" class="fs-6 text-decoration-none">{{$post->author->name}}</a>
          <p class="card-text">
            {{$post->excerpt}}
          </p>
          <a href="/post/{{$post->slug}}" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
{{ $posts->links() }}
@else
<x-alert type="secondary" message="Postingan Kosong" />
@endif
@endsection