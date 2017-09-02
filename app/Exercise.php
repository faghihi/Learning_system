<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercises';

    public function users()
    {
        return $this->belongsToMany('App\User','users_exercises', 'exercise_id', 'user_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question','exercises_questions','exercise_id','question_id');
    }

}
