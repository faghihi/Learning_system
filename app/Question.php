<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }

    public function sections()
    {
        return $this->belongsTo('App\Section');
    }

    public function exercises()
    {
        return $this->belongsToMany('App\Exercise','exercises_questions','question_id','exercise_id');
    }
}
