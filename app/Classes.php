<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    public function School()
    {
        return $this->belongsTo('App\School');
    }

    public function users()
    {
        return $this->belongsToMany('App\User','users_classes','class_id','user_id');
    }

    public function classexercise()
    {
        return $this->hasMany('App\classexercise');
    }

    public function course()
    {
        return $this->hasOne('App\Course');
    }


}
