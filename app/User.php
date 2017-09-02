<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table='users';

    protected $with=['gradeId'];

    public function Schools()
    {
        return $this->belongsToMany('App\School','schools_users','user_id','school_id');
    }

    public function classes()
    {
        return $this->belongsToMany('App\Classes','users_classes','user_id','class_id')
        ->withPivot('status');
    }

    public function exercises()
    {
        return $this->belongsToMany('App\Exercise','users_exercises', 'user_id', 'exercise_id')
        ->withPivot('status');
    }
    //relation to class Course
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'users_courses', 'user_id', 'course_id');
    }

    public function goals()
    {
        return $this->hasMany('App\Goal');
    }

    public function score()
    {
        return $this->hasMany('App\Score');
    }

    public function gradeId()
    {
        return $this->belongsTo('App\Grade','grade_id');
    }
}
