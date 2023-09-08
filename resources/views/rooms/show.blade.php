@extends('layouts.app')

@section('content')
  <div class="dm-room">
      <div class="dm-title">
          <h4>{{ $room['title'] }}</h4>
      </div>
      <div class="dm-message">
          @foreach($messages as $message)
            <p>{{ $message['content'] }}</p>
          @endforeach
      </div>
      <div class="message-box">
          <form onsubmit="return confirm('メッセージを送信しますか？')" action="/messages" method="POST">
                @csrf
                <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}" >
                <textarea type="textarea" name="content"></textarea>
                <button type="submit" class="btn btn-primary">送信</button>
            </form>
      </div>
  </div>
@endsection