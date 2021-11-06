@if(isset($history))
<h2>{{ \App\Models\Part::find($id)->name }}の日</h2>
<table border="1">
   <tr>
       <th>種目</th>
       <th>重量</th>
       <th>回数</th>
       <th>コメント</th>
   </tr>
   @foreach($history->detail as $d)
   <tr>
       <td>{{ $d->workout->name }}</td>
       <td>{{ $d->weight }}</td>
       <td>x{{ $d->reps }}</td>
       <td>{{ $d->comment }}</td>
   </tr>
   @endforeach
</table>
@else
<p>記録がありません</p>
@endif