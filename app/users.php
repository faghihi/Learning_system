<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{

    protected $table='users';
    //you can set table primary key in your model
    protected $primaryKey = 'username';

    public function School()
    {
        return $this->belongsTo('App\School');
    }

    public function classes()
    {
        return $this->belongsToMany('App\classes','user_class','user');
    }

    public function exercise()
    {
        return $this->belongsTo('App\exercise');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function goal()
    {
        return $this->hasMany('App\Goal');
    }

    public function score()
    {
        return $this->hasMany('App\Score');
    }
}

