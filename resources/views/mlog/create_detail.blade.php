@extends('layouts.common')
@extends('layouts.header')

@section('title', 'NEW')
@section('nav_title', '- 新規トレーニング追加 -')
@include('layouts.header')
@include('layouts.footer')
@section('content')

    @include('inc.last_time_list')
    <div class="row mt-3">
        <p class="col-12 text-center align-middle py-2 mb-0 text-white bar-red">新規トレーニング</p>
    </div> 
    <div class="row">
            <table border="1" class='table table-light table-striped table-hover col-12'>
            <thead>
               <tr>
                   <th class="text-nowrap text-center col">種&nbsp;目</th>
                   <th class="text-nowrap text-center col-1">重&nbsp;量</th>
                   <th class="text-nowrap text-center col-1">回&nbsp;数</th>
                   <th class="text-nowrap text-center col-3">コメント</th>
               </tr>
           </thead>
           <tbody>
           @foreach($this_time->detail as $tt)
           <tr>
               <td class="text-left align-middle ps-sm-5 ps-3">{{ $tt->workout->name }}</td>
               <td class="text-center align-middle">{{ $tt->weight }}</td>
               <td class="text-center align-middle">x{{ $tt->reps }}</td>
               <td class="text-left align-middle">{{ $tt->comment }}</td>
           </tr>
           @endforeach
           </tbody>
        </table>
    </div>
    @include('form.store_detail')
    <script>
        function training_over(){
            if(confirm('トレーニング終了しますか？')){
                location.href="{{route('finish',$id)}}";
            }
        }
    </script>
    <div class="row">
        <button id="btn1" class="btn btn-secondary mb-3 col-10 col-sm-12 offset-1 offset-sm-0" type=“button” onclick="training_over()"> トレーニング終了</button>
    </div>
@endsection