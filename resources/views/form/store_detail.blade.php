
<form class='row' method='POST' class="form-inline col p-0" action="{{route('create_detail',$id)}}" >
    @csrf
    <div class='p-0 pe-sm-2 col-10 col-sm-4 offset-1 offset-sm-0'>
        <select class="form-control mb-3 mr-sm-2" name='workout_id'>
            <option value="">トレーニング選択</option>
        @foreach($workouts as $wo)
            <option value='{{$wo->id}}'>{{$wo->name}}</option>
        @endforeach
        </select>
    </div>
    <div class='p-0 pe-sm-2 col-10 col-sm-4 offset-1 offset-sm-0'>
        <input class="form-control mb-3 mr-sm-2" type='number' name='weight' placeholder='重量'>
    </div>
    <div class='p-0 col-10 col-sm-4 offset-1 offset-sm-0'>
        <input class="col-4 form-control mb-3 mr-sm-2" type='number' name='reps' placeholder='回数'>
    </div>
    <div class='p-0 col-10 col-sm-12 offset-1 offset-sm-0'>
        <textarea class="form-control mb-3 mr-sm-2" name='comment' placeholder='コメント'></textarea>
    </div>
    <div class='p-0 col-10 col-sm-12 offset-1 offset-sm-0'>
    <button class="form-control btn btn-danger">新規登録</button>
    </div>
</form>
