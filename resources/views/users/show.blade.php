@extends('layouts.app')

@section('content')
@auth
<div class="mypage">
    <div class="mypage-name">
        <h5>{{ $user->name }}</h5>
    </div>
    <div class="mypage-introducition">
        <p>{!! nl2br(e($user->self_introduction)) !!}</p>
    </div>
    <div class="mypage-personal-information">
        <p>{{ $user->post_code }}</p>
        <p>{{ $user->telephone_number }}</p>
        <p>{{ $user->address }}</p>
    </div>
    
    <div class="mypage-myposts">
        @foreach($posts as $post)
      <div class='card'>
        <a href="/posts/{{$post['id']}}">
          <p><img src="{{ asset('storage/' . $post['image']) }}" width="250" ></p>
        </a>
      </div>
    @endforeach
    </div>
</div>
@endauth
@endsection