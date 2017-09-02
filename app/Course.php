<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $with=['gradeId'];

    //relation to class User
    public function users()
    {
        return $this->belongsToMany('App\User', 'users_courses', 'course_id', 'user_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Classes');
    }

    public function question()
    {
        return $this->hasMany('App\questions');
    }

    public function section()
    {
        return $this->hasMany('App\Section');
    }

    public function gradeId()
    {
        return $this->belongsTo('App\Grade','grade_id');
    }

}
