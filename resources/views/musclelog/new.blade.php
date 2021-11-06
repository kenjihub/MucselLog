<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
        @csrf
        
        
        @if(isset($history))
       
        <h2>{{ $selected_part->name }}の日</h2>
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
        <form method="post" name="new_wk">
            <table border="1">
                <tr>
                   <th>種目</th>
                   <th>重量</th>
                   <th>回数</th>
                   <th>コメント</th>
                   <th>ボタン</th>
                </tr>
                <h3>新規入力</h3>
                <tr>
                    <td><input type="text" name="workout_id">
                    <td><input type="text" name="weight">
                    <td><input type="text" name="reps">
                    <td><input type="text" name="comment">
                    <td><input type="submit" name="add" value="追加">
                </tr>
            </table>
        </form>
    
</body>
</html>