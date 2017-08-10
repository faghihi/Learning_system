<?php

namespace App\Http\Controllers;

use App\Course;
use App\courses;
use App\exercise;
use App\users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeController extends Controller
{
    //
    public function get(){
        $username = \Session::get('UserName');
        $courses = Course::all();

        $user = User::where('username','=',$username)->first();

        return view('index' ,compact('user','courses'));
    }
}
