<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
    </head>
    <body>
        <ul>
        @foreach($part->histories as $h)
            <li>
                <h2>{{$h->id}}</h2>
                <ul>
                    @foreach($h->detail as $d)
                    <li>
                        {{$d->workout->name}}
                        {{$d->weight}}*
                        {{$d->reps}}
                    </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
        </ul>
    </body>
</html>