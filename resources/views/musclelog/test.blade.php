<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    </head>
    <body>
        <p>{{ $test }}</p>
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