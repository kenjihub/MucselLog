<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MLogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//作り直しmlogのルーティング↓↓
//topページの部位選択を表示
Route::get('/mlog',function () {return redirect('/mlog/1');});
//選択した部位を受け取って詳細を返す
Route::get('/mlog/{id}',[MLogController::class,'get_details_at_mlog'])->name('detail');

//新規トレーニングボタンで、historyを追加
Route::post('/mlog/{id}/history',[MLogController::class,'store_history'])->name('create_history');
//詳細を新規作成
Route::get('/mlog/{id}/history',[MLogController::class,'get_detail_at_history']);

//戻るボタンで新規作成したhistoryを削除して、トップページに戻る
Route::delete('/mlog/{id}/history',[MLogController::class,'del_histroy'])->name('del_history');

//新規登録ボタンで、detailを追加
Route::post('/mlog/{id}/detail',[MLogController::class,'store_detail'])->name('create_detail');
//詳細を新規作成
Route::get('/mlog/{id}/detail',[MLogController::class,'get_detail_at_detail']);
//トレーニング終了時にsession削除
Route::get('/mlog/{id}/finish',[MLogController::class,'del_session'])->name('finish');

//種目追加ページ
Route::get('/edit',[MLogController::class,'get_all_workout'])->name('edit');
Route::delete('/edit',[MLogController::class,'del_workout'])->name('del_workout');
Route::post('/edit',[MLogController::class,'store_workout'])->name('store_workout');

//MYPAGEの履歴編集ページ
Route::get('/mypage',[MLogController::class,'get_my_history'])->name('mypage');
Route::delete('/mypage',[MLogController::class,'del_my_history'])->name('del_my_history');

//MYPAGEの詳細編集ページ
Route::get('/mypage/detail/{id}',[MLogController::class,'show_my_detail'])->name('show_my_detail');
Route::delete('/mypage/detail/{id}',[MLogController::class,'del_my_detail'])->name('del_my_detail');

Auth::routes();
Route::get('/home',[HomeController::class,'index'])->name('home');

/*
//jquery学習用
Route::get('/jq/practice',function () {return view('jq.practice5');});
//Bootstrap学習用
Route::get('/btstp/practice',function () {return view('btstp.practice2');});