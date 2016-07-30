<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CoursesController extends Controller
{
    //
    public function get($name){
        return view("$name");
    }
}
