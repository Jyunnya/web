<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagepost;

class ImageController extends Controller
{
    //画像アップロード
   public function image(){
   	return view('image');
   }
   public function store(Request $request){
   	$name = $request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('images',$name);
    return view('upload');
   }

}
