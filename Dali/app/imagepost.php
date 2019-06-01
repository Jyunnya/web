<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagepost extends Model
{
    //
  protected $table = 'posts';

  protected $guarded = array('id');

  public $timestamps = false;
  public function getData()
  {
    $data = DB::table($this->table)->get();
    return $data;
  }
}
