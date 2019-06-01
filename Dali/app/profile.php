<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class profile extends Model
{
   protected $table = 'users';
   protected $fillable = ['name','created_at','email','image_top'];
   public function getdata(){
   	$data_mine = DB::table($this->table)->where('email',Auth::user()->email)->get();
    return $data_mine;
   }
}
