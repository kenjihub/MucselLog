@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    {{-- 以下を追記 --}}
                    <p>現在のユーザー名: {{ Auth::user()->name }} </p>
                    <form action="{{ url('/logout') }}" method="post">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
