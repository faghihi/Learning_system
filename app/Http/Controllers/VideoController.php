<?php

namespace App\Http\Controllers;


use App\User;
use App\School;
use App\Course;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function index(){
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        $courses = Course::all();

        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        return view('video',compact('teachers','schools','courses','user'));
    }
}
