<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = [];
    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
