@extends('layouts.common_login')
@section('title', 'LOGIN')
@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="main row">
        <div class="col-md-8 col-10 ms-auto me-auto mb-5 mt-3 pt-5 pb-3" id="card">
            <div class="video_wrapper row mt-3 mb-3">
                <video class="col-12" playsinline oncontextmenu="return false;" controls muted controlsList="nodownload" poster="{{ asset('/img/Tutorial_play.jpg') }}" >
                    <source src="{{ asset('/video/Tutorial.mp4') }}" type="video/mp4">
                </video>
            </div>
            <div class="card">
                <div class="card-header">{{ __('ログイン') }}</div>
    
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
    
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right ps-md-5">{{ __('メールアドレス') }}</label>
    
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror mb-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror mb-3" name="password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('ログイン') }}
                                </button>
    
                                @if (Route::has('password.request'))
                                
                                    <a class="btn btn-outline-danger ms-3" href="{{ route('register') }}">
                                        {{ __('新規登録') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection