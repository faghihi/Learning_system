<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';

    public function classes()
    {
        return $this->hasMany('App\Classes');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','schools_users','school_id','user_id');
    }
}
