<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded=[];

    public function user()
    {
       return $this->belongsTo('App\User');
    }
    public function file(){
        return $this->belongsTo('App\File','file_id');
    }

    public function comment(){
        return $this->hasmany('App\Comment','blog_id')->with('user');
    }
    public function blogcategory(){
        return $this->hasone('App\BlogCategory')->with('category');
    }
}
