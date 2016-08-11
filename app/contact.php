<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $fillable =  ['name', 'phone', 'email','subject','content'];
    protected $table='contact';
}
