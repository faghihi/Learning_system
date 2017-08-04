<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tempanswer extends Model
{
    //
    protected $fillable=
        [
          'id','username','answer'
        ];
    protected $table="tempanswer";
}
