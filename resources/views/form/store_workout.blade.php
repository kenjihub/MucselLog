
<form class='row mb-0' method='POST' action="{{route('store_workout')}}" >
    @csrf
    <div class='p-0 pe-sm-2 col-10 col-sm-4 offset-1 offset-sm-0'>
        <select class="form-control mb-3 mr-sm-2" name='part_id'>
            <option value="">部位選択</option>
        @foreach($parts as $part)
            <option value='{{$part->id}}'>{{$part->name}}</option>
        @endforeach
        </select>
    </div>
    <div class='p-0 pe-sm-2 col-10 col-sm-4 offset-1 offset-sm-0'>
        <input class="form-control mb-3 mr-sm-2" type='text' name='name' placeholder='種目名'>
    </div>
    <div class='p-0 col-10 col-sm-4 offset-1 offset-sm-0'>
        <button class="form-control btn btn-danger">新規登録</button>
    </div>
</form>
