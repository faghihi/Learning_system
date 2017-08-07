<?php

namespace App\Http\Controllers;

use App\Course;
use App\courses;
use App\exercise;
use App\users;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    //
    public function get(){
        $users = users::all();
        $courses = Course::all();
        //echo dd($users);
        return view('index' ,compact('users','courses'));
    }
}
