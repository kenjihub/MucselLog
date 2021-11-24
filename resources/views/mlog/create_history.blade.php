@extends('layouts.common')
@extends('layouts.header')

@section('title', 'NEW')
@section('nav_title', '- 新規トレーニング追加 -')
@include('layouts.header')
@include('layouts.footer')
@section('content')
    
    @include('inc.last_time_list')
    <div class="row mt-3">
        <p class="col-12 text-center align-middle py-2 text-white bar-red">新規トレーニング</p>
    </div>
    <form class='row' method='POST' class="form-inline col p-0" action="{{route('create_detail',$id)}}" >
    @csrf
    @include('form.store_detail')
    </form>
    <form method="POST" action="{{route('del_history',$id)}}" >
        @csrf
        @method('DELETE')
        <div class="row">
            <div class="form-check mt-3 mb-3 p-0 col-10 col-sm-12 offset-1 offset-sm-0">
                <button class="form-control btn btn-secondary">戻る</button>
            </div>
        </div>    
    </form>
@endsection
