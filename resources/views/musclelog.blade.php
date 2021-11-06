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
        <select type="text" class="form-control" name="change_js" > 
                <option value="/musclelog">トレーニング選択</option>
            @foreach($parts as $part)
                <option value="/musclelog/{!!$part->id!!}">{{ $part->id }}:{{ $part->name }}</option>
            @endforeach
        </select>
        <script>
            const selected = $("select[name=change_js]");
            selected.on('change', function(){
                window.location.href = selected.val();
            });
        </script>
        @include('inc.muscle_list')
        
        <a href="{{route('create_detail',$selected_part->id)}}">新規</a>
</body>
</html>