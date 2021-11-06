<?php

    $array=['a','b','c'];
    //最後のデータを取るとき
    print $array[count($array)-1];
    //$array->last();　phpにlast()はない
    
    /*
    クエリビルダはsql文を書いて、prepare->excuteまでした状態。
     get()することでfetchした状態。
     下記だと、latest()まではsql文で、get()して初めて配列としてデータを取得できる
    */
    History::with('detail')->where('part_id',$id)->latest('id')->get()[0];
    
    //下記の2つは特例。get()までしている状態
    Workout::all();
    Part::find($id);
    
    //where()は両方で使える
    History::all()->where('part_id',$id)->last();
    
    /*
    クエリビルダ…戻り値がコレクション <-配列
    Eloquent…戻り値がモデルオブジェクト
    
    latest()・・・クエリビルダの並べ替え機能
    last()・・・・Collectionクラスのメソッド
    Collectionとは名前どおり、複数個ある何かを格納するための入れ物。
    Laravelに用意されているCollectionは、リスト形式でデータを格納できる。