@extends('layouts.common')
@extends('layouts.header')

@section('title', 'MYPAGE')
@section('nav_title', '- 詳細編集 -')
@include('layouts.header')
@include('layouts.footer')
@section('content')

<h2 class="text-center fs-4">-&nbsp;#{{ $id }}詳細一覧&nbsp;-</h2>
@if(empty($detail->isNotEmpty()))
<div class="row">
<p class="col text-center mb-3 py-1 px-0 text-dark" style="background: #e8e8e8">記録がありません</p>
</div>
@else
<div class="row">
   <table border="1" class="table table-light table-striped table-hover col-12">
        @csrf
      <thead>
         <tr>
            <th class="text-nowrap text-center col-1">#</th>
            <th class="text-nowrap text-center col">種&nbsp;目</th>
            <th class="text-nowrap text-center col-1">重&nbsp;量</th>
            <th class="text-nowrap text-center col-1">回&nbsp;数</th>
            <th class="text-nowrap text-center col-3">コメント</th>
            <th class="text-nowrap text-center col-1">削&nbsp;除</th>
         </tr>
      </thead>
      <tbody>
      @foreach($detail as $d)
      <tr>
          <td class="text-center align-middle">{{ $d->id }}</td>
          <td class="text-left align-middle ps-sm-5 ps-3">{{ $d->workout->name }}</td>
          <td class="text-center align-middle">{{ $d->weight }}</td>
          <td class="text-center align-middle">x{{ $d->reps }}</td>
          <td class="text-left text-center align-middle">{{ $d->comment }}</td>
          <td class="text-center align-middle">
              <form method="post" action="{{route('del_my_detail',$id)}}" class="mb-0">
                  @csrf
                   @method('DELETE')
                  <input type='hidden' name="del_id" value="{{ $d->id }}">
                  <input type="submit" class="btn btn-danger text-nowrap" value="削除">
              </form>
          </td>
      </tr>
      @endforeach
      </tbody>
   </table>
</div>
@endif
<div class="row">
    <div class="px-sm-0 px-3" >
        <button class="btn btn-secondary text-nowrap col-12 mb-3" type="button" onclick="location.href='{{url('/mypage')}}'">履歴一覧に戻る</button>
        <button class="btn btn-danger text-nowrap col-12" type="button" onclick="location.href='{{url('/mlog')}}'">TOPに戻る</button>
    </div>
</div>


@endsection