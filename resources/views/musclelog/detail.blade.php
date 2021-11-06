<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    </head>
    <body>
    
       <h2>{{ $part->name }}の日</h2>
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
           
    </body>
</html>