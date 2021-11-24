@extends('layouts.common')
@section('title', 'TUTORIAL')
@section('nav_title', '- チュートリアル -')
@include('layouts.header')
@include('layouts.footer')

@section('content')
    <div class="video_wrapper row ">
        <video class="col-10 col-sm-12 offset-sm-0 offset-1 px-0" oncontextmenu="return false;" controls muted controlsList="nodownload" poster="{{ asset('/img/Tutorial_play.jpg') }}" >
            <source src="{{ asset('/video/Tutorial.mp4') }}" type="video/mp4">
        </video>
        <button class="btn btn-danger text-nowrap mt-3 col-10 col-sm-12 offset-sm-0 offset-1" type="button" onclick="location.href='{{url('/mlog')}}'">TOPに戻る</button>
    </div>
@endsection