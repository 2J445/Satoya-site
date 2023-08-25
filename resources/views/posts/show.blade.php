@extends('layouts.app')

@section('content')
  @auth
    <div class="profile">
        <div class="profile-header">
            <p><img src="{{ asset('storage/' . $post['image']) }}" ></p>
            <div class="profile-name">
                @if($post->gender == 'オス')
                    <h2>{{ $post['name'] }}くん({{ $post['age'] }}歳)♂</h2></br>
                @else
                    <h2>{{ $post['name'] }}ちゃん({{ $post['age'] }}歳)♀</h2>
                @endif
            </div>
            <div class="profile-breed">
                <h4>種類</h4>
                <h4>{{ $post['breed'] }}</h4></br>
            </div>
        </div>
        <div class="profile-body">
            <h4>備考</h4>
            <p>{!! nl2br(e($post->explanation)) !!}</p>
        </div>
        <div class="profile-btn">
            
        </div>
    </div>
  @else
    <div class="profile">
        <div class="profile-header">
            <p><img src="{{ asset('storage/' . $post['image']) }}" ></p>
            <div class="profile-name">
                @if($post->gender == 'オス')
                    <h2>{{ $post['name'] }}くん({{ $post['age'] }}歳)♂</h2></br>
                @else
                    <h2>{{ $post['name'] }}ちゃん({{ $post['age'] }}歳)♀</h2>
                @endif
            </div>
        </div>
        <div class="profile-body">
            <h4>備考</h4>
            <p>{!! nl2br(e($post->explanation)) !!}</p>
        </div>
        <div class="profile-btn">
            
        </div>
    </div>
  @endauth
@endsection