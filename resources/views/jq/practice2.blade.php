<!DOCTYPE html>
<html lang="ja">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  var timerId;
  // カウントダウンの終了日
  var endDateTime   = new Date("2022/01/01 00:00:00");
 
  function countDownTimer() {
    /* ここにカウントダウンの処理を追記する */
    var startDateTime = new Date();
    var remaining = endDateTime - startDateTime;
    if(remaining<0){
      $("#contents").html('F**kinNewYear');
      clearInterval(timerId);
      return
    }
    var daySeconds = 24*60*60*1000;
    var d = Math.floor(remaining/daySeconds)
    var h = Math.floor((remaining%daySeconds)/(60*60*1000))
    var m = Math.floor((remaining%daySeconds)/(60*1000))%60
    var s = Math.floor((remaining%daySeconds)/(1000))%60%60
    $("#TimeRemaining").text(d + '日' + h + '時間' + m + '分' + s + '秒');
  }
 
  $(function() {
    // 指定した一定時間ごとに関数countDownTimer()を呼び出す
    timerId = setInterval('countDownTimer()', 1000);
  });
</script>
</head>
<body>
<div id='contents'>
  <p>2022年まで</p>
  <div id="TimeRemaining"></div>
</div>
</body>
</html>