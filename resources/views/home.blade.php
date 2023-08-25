@extends('layouts.app')

@section('content')
  @auth
    @foreach($posts as $post)
      <div class='card'>
        <a href="/posts/{{$post['id']}}">
          
          <img src="{{ asset('storage/' . $post['image']) }}" >
          @if($post->gender == 'オス')
            {{ $post['name'] }}くん({{ $post['age'] }}歳)</br>
          @else
            {{ $post['name'] }}ちゃん({{ $post['age'] }}歳)</br>
          @endif
        </a>
      </div>
    @endforeach
  @else
    @foreach($posts as $post)
      <div class='card'>
        <a href="/posts/{{$post['id']}}">
          
          <img src="{{ asset('storage/' . $post['image']) }}">
          @if($post->gender == 'オス')
            {{ $post['name'] }}くん({{ $post['age'] }}歳)</br>
          @else
            {{ $post['name'] }}ちゃん({{ $post['age'] }}歳)</br>
          @endif
        </a>
      </div>
    @endforeach
  @endauth
@endsection

