@extends('layouts.app')

@section('content')
  <div class="applicant-list">
    <div>
      <h4>メッセージ</h4>
    </div>
    @foreach($rooms as $room)
      
      <div class='card'>
          <a href="/rooms/{{$room['id']}}">
            {{ $room['title'] }}</br>
            応募日：{{ $room['created_at'] }}</br>
          </a>
          <a href="/posts/{{$room['post_id']}}">
            詳細を見る
          </a>
      </div></br>
    @endforeach
  </div>
  
@endsection
