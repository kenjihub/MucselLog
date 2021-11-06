<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
    <form action="{{ action('/test')}}" method="post">
        {{ csrf_field() }}
        <select type="text" class="form-control" name="part" required> 
            @foreach($parts as $part)
                <option value="{{ $part->id }}">{{ $part }}</option>
            @endforeach
        </select>
        <input type="submit" name="add_part" value="部位選択">
    </from>
    
    <p>
        @if(isset($id))
         {{ $id }}
        @endif
    </p>
    
</body>
</html>