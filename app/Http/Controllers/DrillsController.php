<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drill;

class DrillsController extends Controller
{
    public function index(){
        $drills = Drill::all();
        return view('drills.index',['drills'=>$drills]);
    }

    public function new(){
        return view('drills.new');
    }
    
    public function create(Request $request){
        $request->validate([
            'title'=>'required|string|max:255',
            'category_name'=>'required|string|max:255',
            'problem0'=>'required|string|max:255',
            'problem1'=>'string|nullable|max:255',
            'problem2'=>'string|nullable|max:255',
            'problem3'=>'string|nullable|max:255',
            'problem4'=>'string|nullable|max:255',
            'problem5'=>'string|nullable|max:255',
            'problem6'=>'string|nullable|max:255',
            'problem7'=>'string|nullable|max:255',
            'problem8'=>'string|nullable|max:255',
            'problem9'=>'string|nullable|max:255',
        ]);

        // モデルを使って、DBに登録する値をセット
        $drill = new Drill;

        // 1つ1つ入れるか
        // $drill->title=$request->title;
        // $drill->category_name=$request->category_name;
        // $drill->save();

        // fillを使って一気にいれるか
        // $fillableを使っていないと変なデータが入り込んだ場合い勝手にDBが更新されてしまうので注意！
        $drill->fill($request->all())->save();

        // リダイレクトする
        // その時にsessionフラッシュにメッセージを入れる
        return redirect('/drills/new')->with('flash_message', __('Registered'));
    }

    public function show($id){
        // GETパラメーターが数字かどうかをチェックする
        // 事前にチェックしておくことでDBの無駄なアクセスが減らせる（WEBサーバーのアクセスのみで済む）
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        $drill= Drill::find($id);
        return view('drills.show', ['drill'=>$drill]);
    }
    public function edit($id){
        // GETパラメーターが数字かどうかをチェックする
        // 事前にチェックしておくことでDBの無駄なアクセスが減らせる（WEBサーバーのアクセスのみで済む）
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        $drill= Drill::find($id);
        return view('drills.edit', ['drill'=>$drill]);
    }

    public function update(Request $request, $id){
        // GETパラメーター数字どうかチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        $drill->fill($request->all())->save();
        
        return redirect('/drills')->with('flash_message', __('Registerd.'));
    }

    public function destroy($id){
        // GETパラメーター数字どうかチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        $drill = Drill::find($id);
        $drill->delete();
        
        // こう書いた方がスマート
        // Drill::find($id)->delete();

        
        return redirect('/drills')->with('flash_message', __('Deleted.'));
    }
}
