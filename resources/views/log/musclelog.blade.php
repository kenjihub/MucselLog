<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
</head>
<body>
    <form action="{{ route('detail') }}" method="post" >
        @csrf
        <select type="text" class="form-control" name="part" > 
            @foreach($parts as $part)
                <option>{{ $part->id }}:{{ $part->name }}</option>
            @endforeach
        </select>
        <input type="submit" name="add_part" value="部位選択">
    </from>
</body>
</html>