@extends('layouts.app')

@section('content')
  @auth
    <div class="container">
      logged in!</br>
      <a href="{{ route('post.create') }}">掲載</a>
    </div>
  @else
    <div class="container">
      home
    </div>
  @endauth
@endsection
