@extends('layouts.app')

@section('content')
@auth
<div class="mypage">
    <div class="mypage-name">
        <h5>{{ $user->name }}</h5>
    </div>
    <div class="mypage-introducition">
        <p>{{ $user->self_introduction }}</p>
    </div>
    <div class="mypage-personal-information">
        <p>{{ $user->post_code }}</p>
        <p>{{ $user->telephone_number }}</p>
        <p>{{ $user->address }}</p>
    </div>
</div>
@endauth
@endsection