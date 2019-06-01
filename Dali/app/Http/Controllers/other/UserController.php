<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Auth;

class UserController extends Controller
{
    //Daliプロジェクト始動
    public function Signin(){
    	return view('signin');
    }
    public function complete(Request $req){
      $this->validate($req,[
    'name' => 'required',
    'email' => 'email|required|unique:users',
    'password' => 'required|min:4'
  ]);
$user = new users([
    'name' => $req->input('name'),
    'email' => $req->input('email'),
    'password' => bcrypt($req->input('password')),
  ]);
    $user->save();

    return view('save');
    }
    public function login(){
    	return view('login');
    }
    public function path(Request $request){
      $this->validate($request,[
     'email' => 'email|required',
     'password' => 'required|min:4'
     ]);
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
             return view('/home');
  }
  return redirect()->back();

    }

}
