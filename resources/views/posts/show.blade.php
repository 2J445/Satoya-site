@extends('layouts.app')

@section('content')
  @auth
    @if($current_user->id == $post->id)
        <div class="profile">
            <div class="profile-header">
                <p>掲載日：{{ $post['created_at']->format('Y年m月d日') }}</p>
            </div>
            <div class="profile-top">
                <p><img src="{{ asset('storage/' . $post['image']) }}" width="300"></p>
                <div class="profile-name">
                    <h2>{{ $post['name'] }}</h2>
                </div>
                <div class="profile-type">
                    <h4>品物</h4>
                    <h4>{{ $post['antique_type'] }}</h4></br>
                </div>
            </div>
            <div class="profile-body">
                <h4>備考</h4>
                <p>{!! nl2br(e($post->explanation)) !!}</p>
            </div>
            <div class="profile-btn">
                <button type="button" class="btn btn-primary" onClick="history.back()">戻る</button>
                <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('post.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    @else
    
        <div class="profile">
            <div class="profile-header">
                <p>掲載日：{{ $post['created_at']->format('Y年m月d日') }}</p>
            </div>
            <div class="profile-top">
                <p><img src="{{ asset('storage/' . $post['image']) }}" width="300"></p>
                <div class="profile-name">
                    <h2>{{ $post['name'] }}</h2>
                </div>
                <div class="profile-type">
                    <h4>品物</h4>
                    <h4>{{ $post['antique_type'] }}</h4></br>
                </div>
            </div>
            <div class="profile-body">
                <h4>備考</h4>
                <p>{!! nl2br(e($post->explanation)) !!}</p>
            </div>
            <div class="profile-btn">
                <button type="button" class="btn btn-primary" onClick="history.back()">戻る</button>
            </div>
            <form onsubmit="return confirm('応募しますか？')" action="/rooms" method="POST">
                @csrf
                <input type="hidden" id="poster_id" name="poster_id" value="{{ $post->user_id }}" >
                <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" >
                <input type="hidden" id="title" name="title" value="{{ $post->name }}" >
                <button type="submit" class="btn btn-success">応募</button>
            </form>
        </div>
    @endif
    
    
  @else
    <div class="profile">
            <div class="profile-header">
                <p>掲載日：{{ $post['created_at']->format('Y年m月d日') }}</p>
            </div>
            <div class="profile-top">
                <p><img src="{{ asset('storage/' . $post['image']) }}" width="300"></p>
                <div class="profile-name">
                    <h2>{{ $post['name'] }}</h2>
                </div>
                <div class="profile-type">
                    <h4>品物</h4>
                    <h4>{{ $post['antique_type'] }}</h4></br>
                </div>
            </div>
            <div class="profile-body">
                <h4>備考</h4>
                <p>{!! nl2br(e($post->explanation)) !!}</p>
            </div>
            <div class="profile-btn">
                <button type="button" class="btn btn-primary" onClick="history.back()">戻る</button>
            </div>
        </div>
  @endauth
@endsection