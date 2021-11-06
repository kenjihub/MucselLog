@extends('layouts.common')
@extends('layouts.header')

@section('title', 'MYPAGE')
@section('nav_title', '- 履歴編集 -')
@include('layouts.header')
@include('layouts.footer')
@section('content')

<h2 class="text-center fs-4">-&nbsp;履歴一覧&nbsp;-</h2>
<div class="row">
   @if(isset($history))
   <table border="1" class="table table-light table-striped table-hover col-12">
      <thead>
         <tr>
             <th class="text-nowrap text-center col-1">#</th>
             <th class="text-nowrap text-center col-1">部&nbsp;位</th>
             <th class="text-nowrap text-center col">日&nbsp;付</th>
             <th class="text-nowrap text-center col-1">詳&nbsp;細</th>
             <th class="text-nowrap text-center col-1">削&nbsp;除</th>
         </tr>
      </thead>
      <tbody>
      @foreach($history as $h)
      <tr>
          <td class="text-center align-middle">{{ $h->id }}</td>
          <td class="text-center align-middle">{{ $h->part->name }}</td>
          <td class="text-left align-middle ps-sm-5 ps-4">{{ $h->created_at }}</td>
          <td class="text-center align-middle">
              <a class='btn btn-secondary text-nowrap' href="{{route('show_my_detail',$h)}}">詳細</a>
          </td>
          <td class="text-center align-middle">
              <form method="post" action="{{route('del_my_history')}}" class="mb-0">
                  @csrf
                   @method('DELETE')
                  <input type='hidden' name="h_id" value="{{ $h->id }}">
                  <input type="submit" class="btn btn-danger text-nowrap" value="削除">
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
   </table>
   @else
   <div class="row">
        <p class="col text-center mb-3 py-1 px-0 text-dark" style="background: #e8e8e8">種目がありません</p>
    </div>
   @endif
</div>
<div class="row">
    <button class="btn btn-danger col-10 offset-1 col-sm-12 offset-sm-0 mt-3 mt-sm-0" type="button" onclick="location.href='{{url('/mlog')}}'">TOPに戻る</button>
</div>
@endsection