<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table = 'users_table';

    protected $fillable = [
  'name', 'email', 'password' 
];
}
