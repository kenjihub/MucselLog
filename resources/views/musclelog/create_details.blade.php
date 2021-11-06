<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    </head>
    <body>
        <p>{{ session('history_id') }}</p>
        <form method='POST' action="{{route('create_details',$id)}}">
            @csrf
            <select name='workout_id'>
            @foreach($workouts as $wo)
                <option value='{{$wo->id}}'>{{$wo->name}}</option>
            @endforeach
            </select><br>
            <input type='number' name='weight' placeholder='重量'><br>
            <input type='number' name='reps' placeholder='回数'><br>
            <textarea name='comment'></textarea><br>
            <button>新規登録</button>
        </form>
    </body>
</html>