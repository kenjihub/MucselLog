<div class="row">
    <ul class="header nav navbar-nav nav-justified fixed-top navbar-light">
        <li class="col offset-1"></li>
        <li class="nav-item col"><a class="nav-link text-white" href="{{ route('detail',$id)}}" target="_self"><img class="top_logo" src="{{ asset('/img/MLogo_s.png') }}"></a></li>
        <li class="nav-item col pt-1 "><a class="nav-link text-white" href="{{ route('mypage')}}" target="_self">MYPAGE</a></li>
        <li class="nav-item col pt-1"><a class="nav-link text-white" href="{{ route('edit')}}" target="_self">EDIT</a></li>
        <li class="nav-item col pt-1"><a class="nav-link text-white" href="{{ route('tutorial')}}" target="_self">TUTORIAL</a></li>
        <li class="nav-item col pt-1">
            <form action="{{ url('/logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link nav-link text-white m-auto">LOGOUT</button>
            </form>
        </li>
        <li class="nav-item col"></li>
    </ul>
</div>