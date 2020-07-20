<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = [];

    public function diseases()
    {
        return $this->hasMany('App\Disease');
    }

    
}
