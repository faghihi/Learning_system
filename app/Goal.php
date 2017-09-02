<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $table = 'goals';

    public function users(){
        return $this->belongsTo('App\User');
    }
}
