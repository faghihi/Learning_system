<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function exercises()
    {
        return $this->hasMany('App\Exercise');
    }
}
