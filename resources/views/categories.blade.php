
@extends('layouts.main')
@section('container')
 <h1>Categories</h1>
  @foreach ($categories as $category)
 <div class="row my-4">
 
   <a href="/posts?category={{$category->slug}}">
   <div class="card text-white p-0">
  <img src="https://source.unsplash.com/1200x600?{{$category->name}}" class="card-img" alt="{{$category->slug}}">
  <div class="card-img-overlay d-flex align-items-center p-0">
    <h5 class="card-title bg-dark p-4">{{$category->name}}</h5>
  </div>
</div>
  </a>
 </div>
 @endforeach

@endsection