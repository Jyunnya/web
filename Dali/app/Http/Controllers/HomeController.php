<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poster;
use App\profile;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pro = new profile;
        $data_mine = $pro->getdata();
        $md = new poster;
        $data = $md->getData();
        return view('home')->with([
          'data_mine' => $data_mine,
          'data' => $data,
      ]);
    }
    public function draw(){
        return view('auth.draw');
    }
    public function insert(Request $request){
           $md = new poster;
           $rules = [
           'name' => 'required|max:20', 
           'content' => 'required',
           'image' => 'required|image',
           ];
           $message = [
            "required" => "必須項目です",
            "name.max" => "20文字以内で入力してください",
            "image" => "画像を選択してください",
            ];
           $this->validate($request, $rules,$message);
           
           $name = Auth::user()->name;
           $email = Auth::user()->email;
           $image_top = Auth::user()->image_top; 
           $content = $request->content;
           $title = $request->name;
           $filename = $request->file('image')->getClientOriginalName(); //ファイルの名前は元のやつを使う
           $request->file('image')->storeAs('public/images',$filename);// storage/app/public/storage/images の中に格納する あらかじめこのフォルダーをphp artisan storage:linkでpublicからでも使えるようにする
           $i_id = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10);
           $md->name = $name;
           $md->email = $email;
           $md->image = $filename;
           $md->image_top = $image_top;
           $md->content = $content;
           $md->title = $title;
           $md->i_id = $i_id;
           $md->save();
           
           $data =  DB::table('posts')->where('i_id',$i_id)->get();

           return view('auth.finish')->with('data',$data);
    }
    public function edit_done(Request $request, $id){
      
      $data =  DB::table('posts')->where('i_id',$id)->get();

      return view('auth.idea_edit')->with('data',$data);
    }
    public function update(Request $request, $id){

      if($request->file('image')){
           $image = $request->file('image')->getClientOriginalName(); //ファイルの名前は元のやつを使う
           $request->file('image')->storeAs('public/images',$image);// storage/app/public/storage/images の中に格納する あらかじめこのフォルダーをphp artisan storage:linkでpublicからでも使えるようにする
          }

      DB::table('posts')->where('i_id',$id)->update([
      'title' => $request->name,
      'content' => $request->content,
      'image' => $image,
      ]);
      $data = DB::table('posts')->where('i_id',$id)->get();
      return view('auth.finish')->with('data',$data);
    }
    public function profile(){
        $pro = new profile;
        $data_mine = $pro->getdata();
        $md = new poster;
        $data = $md->getprofile();
      return view('auth.profile')->with([
        'data_mine' => $data_mine,
        'data' => $data,
      ]);
    }
    public function edit(){
        $pro = new profile;
        $data_mine = $pro->getdata();
        return view('auth.edit')->with('data_mine',$data_mine);
    }
    public function done(Request $request){
        $pro = new profile;
         $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image'
           ];
           $message = [
            "required" => "必須項目です",
            "email" =>"メールアドレスの形式で入力してください",
            "image" => "画像・動画を選択してください"
            ];
         $this->validate($request, $rules,$message);
              $name = $request->name;
              $email = $request->email;
            if($request->file('image')){
           $image = $request->file('image')->getClientOriginalName(); //ファイルの名前は元のやつを使う
           $request->file('image')->storeAs('public/images',$image);// storage/app/public/storage/images の中に格納する あらかじめこのフォルダーをphp artisan storage:linkでpublicからでも使えるようにする
          }
          else{
            $image = Auth::user()->image_top;
          }
          $bio = $request->bio;
           $this->validate($request, $rules,$message);
        $pro::where('email',Auth::user()->email)->update([
          'name' => $name,
          'email' => $email,
          'image_top' => $image,
          'bio' => $bio,
        ]);
        $md = new poster;
        $md::where('email',Auth::user()->email)->update([
          'name' => $name,
          'email' => $email,
          'image_top' => $image,
        ]);
        return redirect()->route('home');
    }
    public function delete(Request $request, $id){
    $delete = poster::where('created_at',$id); //idからデータを見つけてくる
    $delete->delete();
     return redirect('/home');
    }
    public function search(){
      return view('auth.search');
    }
    public function get(Request $request){
    $keyword = $request->search;
    if (!empty($keyword)){
      $getdata = DB::table('posts')->where('name','like','%'.$keyword.'%')->orWhere('content','like','%'.$keyword.'%')->orWhere('title','like','%'.$keyword.'%')->orderBy('created_at','desc')->get();
    }
    if ($getdata->isEmpty()){
      return view('auth.nothing');
    }
    return view('auth.search')->with([
      'getdata' => $getdata,
      'keyword' => $keyword,
    ]);
    }
    public function read(Request $request, $id){
      $data = DB::table('posts')->where('i_id',$id)->get();
      return view('auth.read')->with('data',$data);
    }
    public function other(Request $request, $id){
      $data = DB::table('posts')->where('name',$id)->get();
      $data_other = DB::table('users')->where('name',$id)->get();
      return view('auth.other')->with([
        'data' => $data,
        'data_other' => $data_other,
      ]);
}
}

