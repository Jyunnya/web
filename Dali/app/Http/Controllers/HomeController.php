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

    public function form(){
      return view('auth.image');
    }

    public function finish(){
       return view('auth.finish');
    }
    public function insert(Request $request){
           $md = new poster;
           $rules = [
           'name' => 'required', 
           'content' => 'required',
           ];
           $message = [
            "required" => "必須項目です",
            ];
           $this->validate($request, $rules,$message);
           
           $name = Auth::user()->name;
           $email = Auth::user()->email;
           $image_top = Auth::user()->image_top; 
           $content = $request->content;
           $title = $request->name;
          
           $md->name = $name;
           $md->email = $email;
           $md->image_top = $image_top;
           $md->content = $content;
           $md->title = $title;
           $md->save();
          return redirect('/home');
    }

    public function image(){

          if($request->file('image')){
           $filename = $request->file('image')->getClientOriginalName(); //ファイルの名前は元のやつを使う
           $request->file('image')->storeAs('public/images',$filename);// storage/app/public/storage/images の中に格納する あらかじめこのフォルダーをphp artisan storage:linkでpublicからでも使えるようにする
          }
          else{
            $filename = null;
          }
          $md->image = $filename;
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
      $getdata = DB::table('posts')->where('name','like','%'.$keyword.'%')->orWhere('content','like','%'.$keyword.'%')->orderBy('created_at','desc')->get();
    }
    if ($getdata->isEmpty()){
      return view('auth.nothing');
    }
    return view('auth.search')->with([
      'getdata' => $getdata,
      'keyword' => $keyword,
    ]);
    }
}
