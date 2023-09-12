@extends('layouts.app')

@section('content')
@auth
<div class="mypage">
    <div class="mypage-name">
        <h5>{{ $user->name }}</h5>
    </div>
    <div class="mypage-introducition">
        <div class="mypage-introduction-title">
            <h5>自己紹介</h5>
        </div>
        <div class="mypage-introduction-content">
            <p>{!! nl2br(e($user->self_introduction)) !!}</p>
        </div>
    </div>
    <div class="mypage-personal-information">
        <div class="mypage-post_code">
            <div class="mypage-post_code-title">
                <h5>郵便番号</h5>
            </div>
            <div class="mypage-post_code-content">
                <p>{{ $user->post_code }}</p>
            </div>
        </div>
        
        <div class="mypage-telephone_number">
            <div class="mypage-telephone_number-title">
                <h5>電話番号</h5>
            </div>
            <div class="mypage-telephone_number-content">
                <p>{{ $user->telephone_number }}</p>
            </div>
        </div>
        
        <div class="mypage-address">
            <div class="mypage-address-title">
                <h5>住所</h5>
            </div>
            <div class="mypage-address-content">
                <p>{{ $user->address }}</p>
            </div>
        </div>
    </div>
    </div>
    
    <div class="mypage-myposts">
        <div class="mypage-mypost-title">
            <h5>自身の掲載</h5>
        </div>
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