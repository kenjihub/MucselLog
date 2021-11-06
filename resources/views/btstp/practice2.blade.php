@extends('btstp.common')
@section('content')
<!--
<div class="container">
    <div class="row">
        <div class="col-3" style="background:#FDC6C7;">
            <p>A部分の表示(col-3)</p>
        </div>
        <div class="col-5" style="background:#CBFFC8;">
            <p>B部分の表示(col-5)</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3" style="background:#C8C8C8;">
            <p>C部分の表示(col-3)</p>
        </div>
        <div class="col-5" style="background:#FFFFC7;">
            <p>D部分の表示(col-5)</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-9" style="background:#FDC6C7;">
            <p>A部分の表示(col-9)</p>
        </div>
        <div class="col-3" style="background:#CBFFC8;">
            <p>B部分の表示(col-3)</p>
        </div>
        <div class="col-6" style="background:#C8C8C8;">
            <p>C部分の表示(col-6)</p>
        </div>
        <div class="col-8" style="background:#FFFFC7;">
            <p>D部分の表示(col-8)</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-3 col-12" style="background:#CBFFC8;">サイドバーの表示</div>
        <div class="col-xl-8 col-lg-6 col-md-6 col-12" style="background:#FDC6C7;">メインの表示</div>
        <div class="col-xl-2 col-lg-3 col-md-3 col-12" style="background:#CBFFC8;">サイドバーの表示</div>
        
    </div>
</div>

<div class="container">
    <h2>カラムの間を空けたい場合は「offset-NN/offset-xx-NN」を使う</h2>
    <div class="row">
        <div class="col-6" style="height: 100px;background: #FDC6C7;">ブロックA</div>
        <div class="col-6" style="height: 100px;background: #CBFFC8;">ブロックB</div>
    </div>
    <div class="row">
        <div class="col-6 col-md-3" style="height: 100px;background: #C8C8FF;">ブロックC</div>
        <div class="col-6 col-md-3 offset-md-6" style="height: 100px;background: #FFFFC7;">ブロックD</div>
    </div>
    <div class="row">
        <div class="col-6" style="height: 100px;background: #C7FFFF;">ブロックE</div>
        <div class="col-6" style="height: 100px;background: #FFC7FF;">ブロックF</div>
    </div>
</div>
!-->

<div class="container">
    <h2 class="text-center">ブロックの並び順を指定する場合は「order-NN/order-xx-NN」を使う</h2>
    <div class="row">
        <div class="col-7 order-2" style="height: 100px;background: #FDC6C7;">ブロックA</div>
        <div class="col-3 order-1" style="height: 100px;background: #CBFFC8;">ブロックB</div>
        <div class="col-2 order-3" style="height: 100px;background: #C8C8FF;">ブロックC</div>
    </div>
</div>
@endsection