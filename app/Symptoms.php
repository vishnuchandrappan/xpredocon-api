<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptoms extends Model
{
    protected $guarded = [];

    public function disease()
    {
        return $this->belongsToMany('App\Disease');
    }

    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Disease');
    }
}
