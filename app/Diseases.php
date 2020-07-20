<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    protected $guarded = [];

    public function symptoms()
    {
        return $this->hasMany('App\Symptoms');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

}
