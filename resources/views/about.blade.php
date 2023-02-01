@extends('layouts.main')
@section('container')
  <h1>Halaman About</h1>
  <h3>{{$nama}}</h3>
  <p> {{ $umur }}</p>
  <img src="image/{{ $image }}" alt="{{ $nama}}" width="200">
 @endsection