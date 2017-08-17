<?php

namespace App\Http\Controllers;

use App\classes;
use App\Course;
use App\courses;
use App\exercise;
use App\School;
use App\Section;
use App\userclass;
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

    public function guide(){
        $username = \Session::get('UserName');
        $courses = Course::all();

        $user = User::where('username','=',$username)->first();

        return view('guide' ,compact('user','courses'));
    }

    public function schoolAjax($id){
        $classes = classes::where("id",$id)->first();
        $school = \DB::table('schools')->where('id',$classes->school_id)->first();
        $schools[$school->id] = $school->name;

        return json_encode($schools);
    }

    public function sectionAjax($id){
        $section = Section::where('course_id',$id)->get();
        foreach($section as $s){
            $sections[$s->id] = $s->name;
        }
        return json_encode($sections);
    }

    public function studentAjax($id){
        $student = userclass::where('class_id',$id)->get();

        foreach($student as $s){
            $name = users::where('username',$s->username)->first();
            $students[$s->username] = $name->name;
        }

        return json_encode($students);
    }

    public function stAjax($username){
        $user = users::where('username',$username)->first();

        $name[1] = $user->name;
        $name[2] = $user->email;

        return json_encode($name);
    }
}
