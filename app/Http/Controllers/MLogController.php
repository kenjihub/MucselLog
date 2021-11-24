<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Part;
use App\Models\Workout;
use App\Models\History;
use App\Models\Detail;

class MLogController extends Controller
{
    public function __construct()
    {
        // authというミドルウェアを設定
        $this->middleware('auth');
    }
    
    //プルダウン選択後の前回トレーニングdetail表示
    public function get_details_at_mlog(Request $request,$id){
        $request->session()->forget('new_history');
        //プルダウン表示内容を取得
        $parts = \DB::table('parts')->get(); 
        //選択したプルダウンを取得
        $selected_part = Part::find($id);
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        //return $user_id;
        //選択したプルダウンからヒストリーを取得
        $history = $selected_part->histories->where('user_id', $user_id)->last();
        //history_idに紐付いたdetailを取得
        /*
        削除済み種目が含まれる場合、sqlエラーになるので、
        種目が存在するdetaiilのみをwhereHas()を使って取得する。
        */
        //user_idに紐付いたhistoryがあればdetailを取得
        if($history){
            $detail = Detail::with('workout')->where('history_id',$history->id)
                ->whereHas('workout', function ($query) {
                    $query->whereExists(function ($query) {
                        return $query;});})->get();
        //$historyがなければNULL/$history->idの'id'がないというエラーが出るため
        }else{
            $detail = NULL;
        }
        return view('mlog',[
           'id'=>$id,
           'parts' => $parts,
           'detail' => $detail
        ]);
    }
   
    //トレーニングhistoryを登録
    public function store_history(Request $request,$id){
        //reloadの度にhistoryが追加されることを防ぐ
        $is_history = $request->session()->has('new_history');
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        //history作成済みであればredirect
        if($is_history){
            return redirect('/mlog/'.$id.'/history');
        //sessionにhistoryがなければ、新規作成してsessionにも保存
        }else{
            $history = History::create([
                'user_id' => $user_id,
                'part_id' => $id
            ]);
            $request->session()->put('new_history', $history);
        }
        return redirect('/mlog/'.$id.'/history');
    }
    
    //historyを登録後のトレーニング履歴表示
    public function get_detail_at_history($id){
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        //初回登録時は前回記録の$last_timeにNULLを入れる
        $history = History::where('user_id', $user_id)
            ->where('part_id',$id)->get();
        if(count($history)<=1){
            $last_time = NULL;
        } else{
            $last_time = History::with('detail')
                ->where('user_id', $user_id)
                ->where('part_id',$id)->latest('id')
                ->skip(1)->take(1)->get()[0];
        }
         return view('mlog.create_history',[
            'id'=>$id,
            'workouts'=>Workout::where('part_id',$id)->get(),
            'selected_part' =>Part::find($id),
            'last_time' =>$last_time
        ]);
    }
   
    //新規作成したhistoryを削除して、トップページに戻る
    public function del_histroy(Request $request,$id){
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        History::all()->where('user_id', $user_id)
            ->where('part_id',$id)->last()->delete();
        //sessionに保存したhistoryも削除
            $request->session()->forget('new_history');
            return redirect('/mlog/'.$id);
    }
    
    //トレーニングditailを登録
    public function store_detail(Request $request,$id){
        $request->validate([
            'workout_id'=>['required','string'],
            'weight'=>['required','numeric','min:1'],
            'reps'=>['required','integer','min:1'],
        ]);
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        //history_idを取得
        $history = History::all()->where('user_id', $user_id)
            ->where('part_id',$id)->last();
          //detailの登録
          Detail::create([
            'history_id' => $history->id,
            'workout_id' =>$request->workout_id,
            'weight'=>$request->weight,
            'reps'=>$request->reps,
            'comment'=>$request->comment
           ]);
           return redirect('/mlog/'.$id.'/detail');
    }
    
    //ditail登録後のトレーニング履歴表示
    public function get_detail_at_detail($id){
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
        //初回登録時は前回記録の$last_timeにNULLを入れる
        $history = History::where('user_id', $user_id)
        ->where('part_id',$id)->get();
        if(count($history)<=1){
            $last_time = NULL;
        } else{
            $last_time = History::with('detail')
                ->where('user_id', $user_id)
                ->where('part_id',$id)->latest('id')
                ->skip(1)->take(1)->get()[0];
        }
        return view('mlog.create_detail',[
            'id'=>$id,
            'workouts'=>Workout::where('part_id',$id)->get(),
            'selected_part' =>Part::find($id),
            'last_time' =>$last_time,
            'this_time' =>History::with('detail')
                            ->where('user_id', $user_id)
                            ->where('part_id',$id)
                            ->latest('id')->get()[0]
            ]);
    }
    
    //トレーニング終了ボタンを押したらsession削除しtopへredirect
    public function del_session(Request $request,$id){
        $request->session()->forget('new_history');
        return redirect('/mlog/'.$id);
    }
    
    //全workoutを取得
    public function get_all_workout(){
      $workouts = Workout::all();
      $parts = Part::all();
      $user = \Auth::user()->name;
      return view('edit',[
           'workouts' => $workouts,
           'parts' => $parts,
           'user' => $user
        ]);
    }
    
   //workoutを削除して、元のページに戻る
   public function del_workout(Request $request){
        $wk_id = $request->wk_id;
        Workout::find($wk_id)->delete();
        return redirect('/edit');
   }
   
   //workoutを登録
    public function store_workout(Request $request){
            $request->validate([
            'part_id'=>['required','integer'],
            'name'=>['required','string','min:1'],
        ]);
        Workout::create([
                'name' => $request->name,
                'part_id' => $request->part_id
        ]);
        return redirect('/edit');
   }
   
  //自分のhistoryを取得
    public function get_my_history(){
      $user_id = \Auth::user()->id;
      $history = History::where('user_id',$user_id)->get();
      return view('mypage',[
           'history' => $history,
        ]);
    }
    
    //historyを削除して、元のページに戻る
    public function del_my_history(Request $request){
        $h_id = $request->h_id;
        History::find($h_id)->delete();
        return redirect('/mypage');
    }
    
    //自分のdetailを取得
    public function show_my_detail($id){
        $detail = Detail::with('workout')->where('history_id',$id)
                ->whereHas('workout', function ($query) {
                    $query->whereExists(function ($query) {
                        return $query;});})->get();
        $part_id = History::find($id)->part_id;
          return view('mypage.detail',[
                'workouts'=>Workout::where('part_id',$part_id)->get(),
                'detail' => $detail,
                'id' => $id
            ]);
    }
 
    //workoutを削除して、元のページに戻る
    public function del_my_detail(Request $request,$id){
        $del_id = $request->del_id;
        Detail::find($del_id)->delete();
        $detail = Detail::where('id',$del_id)->get();
        return redirect('/mypage/detail/'.$id);
    }
    
    //MYPAGE/detailページの新規登録画面
    public function store_my_detail(Request $request,$id){
        $request->validate([
            'workout_id'=>['required','string'],
            'weight'=>['required','numeric','min:1'],
            'reps'=>['required','integer','min:1'],
        ]);
        //ログインuser_idを取得
        $user_id = \Auth::user()->id;
          //detailの登録
          Detail::create([
            'history_id' => $id,
            'workout_id' =>$request->workout_id,
            'weight'=>$request->weight,
            'reps'=>$request->reps,
            'comment'=>$request->comment
           ]);
           return redirect('/mypage/detail/'.$id);
    }
   
    /** 
     $detail = Detail::with('workout')->where('history_id',$id)
            ->whereHas('workout', function ($query) {
                $query->whereExists(function ($query) {
                    return $query;});})->get();
                    
   //トップページの部位選択プルダウン
   public function get_main_part(){
       //プルダウン表示内容を取得
       $parts =  \DB::table('parts')->get(); 
       return view('musclelog',[
           'parts' => $parts,
           ]);
   }
   
   //プルダウン選択後の画面
   public function get_details($id){
       //プルダウン表示内容を取得
       $parts = \DB::table('parts')->get(); 
       //選択したプルダウンを取得
       $selected_part = Part::find($id);
       //選択したプルダウンからヒストリーを取得
       $history = $selected_part->histories->last();
       
       return view('musclelog',[
           'id'=>$id,
           'parts' => $parts,
           'selected_part' => $selected_part,
           'history' => $history
        ]);
   }
   
   public function create_detail($id){
     return view('musclelog.create_detail',[
        'id'=>$id,
        'workouts'=>Workout::all(),
        'selected_part' =>Part::find($id),
        'history' =>Part::find($id)->histories->last()
      ]);
   }
   
   //トレーニングhistoryとditailを登録
   public function store_detail(Request $request,$id){
    //historyが登録済みか判定
    $history_id = $request->session()->get('history_id');
    //新規登録の場合は登録
    if(!isset($history_id)){
     //historyの登録
     $history = History::create([
        'user_id' => 1,
        'part_id' => $id
      ]);
     //登録したhistoryのidをセッションに保存して、
     //次回detail登録時にhistory登録をスキップ
     $history_id = $history->id;
     $request->session()->put('history_id', $history_id);
    }
      //detailの登録
      Detail::create([
        'history_id' => $history_id,
        'workout_id' =>$request->workout_id,
        'weight'=>$request->weight,
        'reps'=>$request->reps,
        'comment'=>$request->comment
       ]);
       
       return redirect('/create/detail/'.$id);

   }
   
    public function sample($id){
       $part = Part::find($id);
       
       return view('sample',[
           'part' => $part
        ]);
   }
   
   **/
   
}
  


