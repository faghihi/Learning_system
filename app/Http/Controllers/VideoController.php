<?php

namespace App\Http\Controllers;


use App\User;
use App\School;
use App\Course;

class VideoController extends Controller
{
    public function index(){
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        $courses = Course::all();

        return view('video',compact('teachers','schools','courses'));
    }
}
