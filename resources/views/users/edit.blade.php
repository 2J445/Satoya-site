@extends('layouts.app')

@section('content')
<div class="user-form">
    <form method="POST" action="/users">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('名前') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('自己紹介') }}</label>

            <div class="col-md-6">
                <textarea id="self-introduction" type="text" class="form-control @error('self-introduction') is-invalid @enderror" name="self-introduction" value="{{ old('self-introduction') }}" required autocomplete="self-introduction" autofocus>
                </textarea>
                @error('self-introduction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('住所') }}</label>

            <div class="col-md-6">
                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
                        
        <div class="row mb-3">
            <label for="telephone-number" class="col-md-4 col-form-label text-md-end">{{ __('電話番号') }}</label>

            <div class="col-md-6">
                <input id="telephone-number" type="telephone-number" class="form-control @error('telephone-number') is-invalid @enderror" name="telephone-number" value="{{ old('telephone-number') }}" required autocomplete="telephone-number">

                @error('telephone-number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $telephoneNumber }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('更新') }}
                </button>
            </div>
        </div>
    </form>             
</div>
@endsection