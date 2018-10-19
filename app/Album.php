<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = array('name');

    public function post(){
        return $this->hasMany('App\Post');
    }
}
