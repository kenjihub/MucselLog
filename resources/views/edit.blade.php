@extends('layouts.common')
@extends('layouts.header')

@section('title', 'EDIT')
@section('nav_title', '- 種目編集 -')
@include('layouts.header')
@include('layouts.footer')
@section('content')

<h2 class="text-center fs-4">-&nbsp;種目一覧&nbsp;-</h2>
<div class="row">
   @if(isset($workouts))
   <table border="1" class="table table-light table-striped table-hover col-12">
      <thead>
         <tr>
             <th class="text-nowrap text-center col">種目名</th>
             <th class="text-nowrap text-center col-1">部&nbsp;位</th>
             @if($user=='admin')
             <th class="text-nowrap text-center col-1">削&nbsp;除</th>
             @endif
         </tr>
      </thead>
      <tbody>
      @foreach($workouts as $wk)
      <tr>
          <td class="text-left align-middle ps-sm-5 ps-3">{{ $wk->name }}</td>
          <td class="text-center align-middle">{{ $wk->part->name }}</td>
          @if($user=='admin')
          <td class="text-center align-middle">
              <form method="post" action="{{route('del_workout')}}" class="mb-0">
                  @csrf
                   @method('DELETE')
                  <input type='hidden' name="wk_id" value="{{ $wk->id }}">
                  <input type="submit"　 class="btn btn-danger" value="削除">
              </form>
          </td>
          @endif
      </tr>
      @endforeach
      </tbody>
   </table>
   @else
   <p class="col text-center m-0 pt-1 pb-1 text-dark" style="background: #e8e8e8">種目がありません</p>
   @endif
</div>
@include('form.store_workout')
<div class="row">
    <button class="btn btn-secondary col-10 col-sm-4 offset-1 offset-sm-8 mt-3 mt-sm-0" type="button" onclick="location.href='{{url('/mlog')}}'">戻る</button>
</div>
@endsection