<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>TOP｜MLog</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="/css/top.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body class="bg">
        <script>
        window.onload=function(){
                setTimeout(function(){
        if(navigator.userAgent.match(/(iPhone|iPod|Android.*Mobile)/i)){
            var obj = document.getElementById('logo-sp');
        }else{
            var obj = document.getElementById('logo-pc');
        }
             obj.style.opacity='1';
                },2500);
        }
            
        </script>
        <div class="pc container m-0 p-0">
            <video class="m-0 p-0" playsinline autoplay muted oncontextmenu="return false;" controlsList="nodownload" >
                <source src="{{ asset('/video/MLog_TOP_wide.mp4') }}" type="video/mp4">
                <img src="{{ asset('/img/MLog_TOP_wide.jpg') }}">
            </video>
             <div class="text-pc">
                    <span>
                        <a href="{{ url('/login') }}" target="_self">
                        <img id="logo-pc" class="d-block mx-auto img-fluid " src="{{ asset('/img/start_btn_L.png') }}"></a>
                    </span>
                </div>
            </div>   
        </div>
            
            
         <div class="sp container m-0 p-0">   
            <video class="m-0 p-0" playsinline autoplay muted oncontextmenu="return false;" controlsList="nodownload" >
                <source src="{{ asset('/video/MLog_TOP_SP.mp4') }}" type="video/mp4">
                <img src="{{ asset('/img/MLog_TOP_SP.jpg') }}">
            </video>
            <div class="text-sp">
                <span>
                    <a href="{{ url('/login') }}" target="_self">
                    <img id="logo-sp" src="{{ asset('/img/start_btn_L.png') }}"></a>
                </span>
            </div>
        </div>
        <!-- 以下にBootstrap用のJavaScriptを記述します -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>