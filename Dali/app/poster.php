<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class poster extends Model
{
  protected $table = 'posts';
 
  protected $fillable = ['name','created_at','content','image','email'];

  public function getData()
  {
    $data = DB::table($this->table)->orderBy('created_at','desc')->get();
    return $data;
  }
public function getprofile(){
	$data = DB::table($this->table)->where('email',Auth::user()->email)->orderBy('created_at','desc')->get();
    return $data;
}
}