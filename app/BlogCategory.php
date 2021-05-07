<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded=[];

    public function category(){
        return $this->belongsto('App\Category');
    }
    public function blog(){
        return $this->belongsto('App\Blog')->with('user','file');
    }
}
