@extends('layouts.common_login')
@section('title', 'REGISTER')
@include('layouts.header')
@include('layouts.footer')

@section('content')
<div class="main row justify-content-center">
        <div class="col-md-8 col-10 ms-auto me-auto mb-5 mt-5 pt-5 pb-3" id="card">
            <div class="card">
                <div class="card-header">{{ __('ユーザー登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right ps-md-5">{{ __('名前') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror mb-3" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right ps-md-5">{{ __('メール') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-3" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right ps-md-5">{{ __('パスワード') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right ps-md-5">{{ __('パスワード （確認）') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control mb-3" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-danger w-25">
                                    {{ __('登録') }}
                                </button>
                                    <a class="btn btn-secondary w-25 ms-2" href="{{ url('/login') }}">
                                        {{ __('戻る') }}
                                    </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
