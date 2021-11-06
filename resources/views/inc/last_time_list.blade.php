<h2 class="text-center fs-4">-&nbsp;トレーニングパート：{{ \App\Models\Part::find($id)->name }}&nbsp;-</h2>
    <div class="row">
        <p class="col-12 text-center align-middle py-2 mb-0 text-white bar-gray">前回トレーニング</p>
    </div> 
<div class="row">
    @if(isset($last_time))
    <table border="1" class='table table-secondary table-striped table-hover col-12'>
           <thead>
               <tr>
                   <th class="text-nowrap text-center col">種&nbsp;目</th>
                   <th class="text-nowrap text-center col-1">重&nbsp;量</th>
                   <th class="text-nowrap text-center col-1">回&nbsp;数</th>
                   <th class="text-nowrap text-center col-3">コメント</th>
               </tr>
           </thead>
           <tbody>
           @foreach($last_time->detail as $lt)
               <tr>
                   <td class="text-left align-middle ps-sm-5 ps-3">{{ $lt->workout->name }}</td>
                   <td class="text-center align-middle">{{ $lt->weight }}</td>
                   <td class="text-center align-middle">x{{ $lt->reps }}</td>
                   <td class="text-left text-center align-middle">{{ $lt->comment }}</td>
               </tr>
           @endforeach
           </tbody>
        </table>
    @else
    <p class="col text-center m-0 pt-1 pb-1 text-dark" style="background: #e8e8e8">記録がありません</p>
    @endif
</div>