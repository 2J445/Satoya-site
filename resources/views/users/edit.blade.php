@extends('layouts.app')

@section('content')
<div class="user-form">
    <form method="POST" action="/user/update/{{ $user->user_id }}">
        @method('put')
         @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="self_introduction" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介') }}</label>

            <div class="col-md-6">
                <textarea id="self_introduction" type="text" class="form-control" name="self_introduction" value="{{ $user->self_introduction }}"  autocomplete="self_introduction" autofocus>
                </textarea>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{$user->email }}"  autocomplete="email">

                @error('self_introduction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
                        
        <div class="row mb-3">
            <label for="post_code" class="col-md-4 col-form-label text-md-end">{{ __('郵便番号') }}</label>
            <div class="col-md-6">
                <input id="post_code" type="post_code" class="form-control" name="post_code" value="{{ $user->post_code }}"  autocomplete="post_code">

                @error('post_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
                        
        <div class="row mb-3">
            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('住所') }}</label>

            <div class="col-md-6">
                <input id="address" type="address" class="form-control" name="address" value="{{ $user->address }}"  autocomplete="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
                        
        <div class="row mb-3">
            <label for="telephone_number" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>
            <div class="col-md-6">
                <input id="telephone_number" type="telephone_number" class="form-control" name="telephone_number" value="{{ $user->telephone_number }}"  autocomplete="telephone_number">
                @error('telephone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $telephoneNumber }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード再確認') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0 update-btn">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('更新') }}
                </button>
                <a href="{{ route('user.destroy', $user->id) }}" class="btn btn-danger">退会</a>
            </div>
        </div>
    </form>
</div>
@endsection