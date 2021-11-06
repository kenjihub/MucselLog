<div class="row">
    <div class="col-1 p-0"></div>
    <form method='POST' class="form-inline col p-0" action="{{route('create_detail',$id)}}" >
        @csrf
        <select class="form-control mb-3 mr-sm-2" name='workout_id'>
            <option value="">トレーニング選択</option>
        @foreach($workouts as $wo)
            <option value='{{$wo->id}}'>{{$wo->name}}</option>
        @endforeach
        </select>
        <input class="form-control mb-3 mr-sm-2" type='number' name='weight' placeholder='重量'>
        <input class="form-control mb-3 mr-sm-2" type='number' name='reps' placeholder='回数'>
        <textarea class="form-control mb-3 mr-sm-2" name='comment' placeholder='コメント'></textarea>
        <button class="form-control btn btn-danger">新規登録</button>
    </form>
   <div class="col-1 p-0"></div>
</div>

<div class="row">
    <div class="col-1 p-0"></div>
    <form method='POST' class="form-inline col p-0" action="{{route('create_detail',$id)}}" >
        @csrf
        
            
                <select class="form-control mb-3 mr-sm-2" name='workout_id'>
                @foreach($workouts as $wo)
                    <option value='{{$wo->id}}'>{{$wo->name}}</option>
                @endforeach
                </select>
            
                <input class="form-control mb-3 mr-sm-2" type='number' name='weight' placeholder='重量'>
                
                <input class="form-control mb-3 mr-sm-2" type='number' name='reps' placeholder='回数'>
            
                <textarea class="form-control mb-3 mr-sm-2" name='comment'></textarea>
            
            <button class="form-check btn btn-danger">新規登録</button>
    </form>
   <div class="col-1 p-0"></div>
</div>

<div class="row">
    <div class="col-1 p-0"></div>
    <form method='POST' class="form-inline col p-0" action="{{route('create_detail',$id)}}" >
        @csrf
        
            <div class="form-check p-0">
                <select class="form-control" name='workout_id'>
                @foreach($workouts as $wo)
                    <option value='{{$wo->id}}'>{{$wo->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-check p-0">
                <input class="form-control mb-3 mr-sm-2" type='number' name='weight' placeholder='重量'>
            </div>
            <div class="form-check p-0">     
                <input class="form-control mb-3 mr-sm-2" type='number' name='reps' placeholder='回数'>
            </div>
            <div class="form-check p-0">
                <textarea class="form-control mb-3 mr-sm-2" name='comment'></textarea>
            </div>
            <button class="orm-control mb-3 mr-sm-2 btn btn-danger">新規登録</button>
    </form>
   <div class="col-1 p-0"></div>
</div>


    <form method='POST' class=" p-0" action="{{route('create_detail',$id)}}" >
        @csrf
        <div class=”form-row“>
            <div class="form-group p-0 col-3">
                <select class="form-control" name='workout_id'>
                @foreach($workouts as $wo)
                    <option value='{{$wo->id}}'>{{$wo->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group p-0 col-3">
                <input class="form-control mb-3 mr-sm-2" type='number' name='weight' placeholder='重量'>
            </div>
            <div class="form-group p-0 col-3">     
                <input class="form-control mb-3 mr-sm-2" type='number' name='reps' placeholder='回数'>
            </div>
            <div class="form-group p-0 col-3">
                <textarea class="form-control mb-3 mr-sm-2" name='comment'></textarea>
            </div>
        </div>
            <button class="orm-control mb-3 mr-sm-2 btn btn-danger">新規登録</button>
    </form>
