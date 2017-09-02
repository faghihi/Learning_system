<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'users_scores';

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
