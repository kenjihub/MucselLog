@if(isset($detail))
<div class="row">
    <p class="col-12 text-center align-middle py-2 mb-0 text-white bar-red">前回トレーニング</p>
</div> 
@endif
<div class="row">
   @if(isset($detail))
   <table border="1" class="table table-light table-striped table-hover col-12">
      <thead>
         <tr>
            <th class="text-nowrap text-center col">種&nbsp;目</th>
            <th class="text-nowrap text-center col-1">重&nbsp;量</th>
            <th class="text-nowrap text-center col-1">回&nbsp;数</th>
            <th class="text-nowrap text-center col-3">コメント</th>
         </tr>
      </thead>
      <tbody>
      @foreach($detail as $d)
      <tr>
          <td class="text-left align-middle ps-sm-5 ps-3">{{ $d->workout->name }}</td>
          <td class="text-center align-middle">{{ $d->weight }}</td>
          <td class="text-center align-middle">x{{ $d->reps }}</td>
          <td class="text-left text-center align-middle">{{ $d->comment }}</td>
      </tr>
      @endforeach
      </tbody>
   </table>
   @else
   <div class="row m-0 px-0">
      <p class="col-sm-12 col-10 mx-auto text-center mb-3 py-1 px-0 text-dark" style="background: #e8e8e8">記録がありません</p>
   </div>
   @endif
</div>