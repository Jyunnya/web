<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poster;

class databaseController extends Controller
{
public function index(){ //データの表示
$md = new poster();
$data = $md->getData(); //modelのgetData関数を使ってpostsテーブルから全データを引き出す
return view('data', ['data' => $data]); //data.blade.phpに$data変数を渡している
}
public function delete(Request $request, $id){ //データの削除
    $delete = poster::find($id); //idからデータを見つけてくる
    $delete->delete();
     return redirect('/sample');
}
public function create(){
	return view('insert');//insert.blade.phpを表示
}
public function save(Request $request){//データの追加  POSTからのデータを受け取る
	$md = new poster;
	if (isset($request->content)) {
	 $content = $request->content; //フォームのnameからリクエストを絞りだし変数にいれる
	}
	else{
		$content = "書き込みなし";
	}
	if (isset($request->na)){
		$name = $request->na; //フォームのnameからリクエストを絞りだし変数にいれる
	}
	else{
		$name = "匿名";
	}
	if($request->file('image')){
	$filename = $request->file('image')->getClientOriginalName(); //ファイルの名前は元のやつを使う
    $request->file('image')->storeAs('public/images',$filename);// storage/app/public/storage/images の中に格納する あらかじめこのフォルダーをphp artisan storage:linkでpublicからでも使えるようにする
    }
    else{
    	$filename = null;
    }
    $md->name = $name;
    $md->content = $content;
	$md->image = $filename;
	$md->save();
	return view('save'); //save.blade.phpを表示
}
}
