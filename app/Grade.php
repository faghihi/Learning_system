<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table='grades';


    public function courses()
    {
        return $this->hasMany('App\Course','grade_id');
    }

    public function users()
    {
        return $this->hasMany('App\User','grade_id');
    }
}
