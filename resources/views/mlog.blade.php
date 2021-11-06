@extends('layouts.common')

@section('title', 'TOP')
@include('layouts.header_link')
@include('layouts.footer')
@section('content')
<div class="row mb-2">
    <div class="p-0 col-10 col-sm-4 offset-1 offset-sm-4">
    <select type="text" class="form-control p-1" name="change_js" > 
            <option value="/mlog" class="text-center">トレーニング選択</option>
        @foreach($parts as $part)
            <option value="/mlog/{!!$part->id!!}" class="text-center">{{ $part->id }}:{{ $part->name }}</option>
        @endforeach
    </select>
    </div>
</div>
    <script>
        const selected = $("select[name=change_js]");
        selected.on('change', function(){
            window.location.href = selected.val();
        });
    </script>

<h2 class="text-center fs-4">-&nbsp;トレーニングパート：{{ \App\Models\Part::find($id)->name }}&nbsp;-</h2>
    @include('inc.mlog_list')
<div class="row">
    <div class="form-group mt-3 p-0 col-10 col-sm-12 offset-1 offset-sm-0">
        <form method="POST" action="{{route('create_history',$id)}}">
             @csrf
            <input type="submit" value="新規トレーニング" class="form-control btn btn-danger">
        </form>
    </div>
</div>
<div>
   <form action="{{ url('/logout') }}" method="post">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</div>
@endsection