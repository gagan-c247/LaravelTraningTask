<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
