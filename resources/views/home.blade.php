@extends('layouts.app')

@section('content')
<!-- フラッシュメッセージ -->
@if (session('flash_message'))
    <div class="flash_message">
       {{ session('flash_message') }}
    </div>
@endif
  @auth
  logged in!
    @foreach($posts as $post)
      <div class='card'>
        <a href="/posts/{{$post['id']}}">
          <p><img src="{{ asset('storage/' . $post['image']) }}" width="250" ></p>
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
          <img src="{{ asset('storage/' . $post['image']) }}" width="250">
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

