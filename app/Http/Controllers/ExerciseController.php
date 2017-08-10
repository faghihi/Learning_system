<?php

namespace App\Http\Controllers;

use App\Course;
use App\exercise;
use App\questions;
use App\Section;
use App\User;
use App\School;
use App\classes;
use App\userexercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ExerciseController extends Controller
{
    public function create(){
        $name = Input::get('nameEx');
        $code = Input::get('code');
        $easy = Input::get('easy');
        $medium = Input::get('medium');
        $hard = Input::get('hard');
        //$class_id = Input::get('class');
        $course_id = Input::get('course');
        $section_id = Input::get('section');
        $start = Input::get('startdate');
        $end = Input::get('enddate');

        $exercise = new exercise();
        $exercise->name = $name;
        $exercise->code = $code;
        $exercise->course_id = $course_id;
        $exercise->easy_no = $easy;
        $exercise->medium_no = $medium;
        $exercise->hard_no = $hard;
        $exercise->section_id = $section_id;
        $exercise->start_date = $start;
        $exercise->end_date = $end;
//        echo dd($exercise);
        $exercise->save();

        $schools = School::all();
        $username = \Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $users = User::all();
        $classes = classes::all();

//        return view('Tdashboard', compact('schools','user','users','classes'));
        return redirect('/');
    }

    public function createquestion(){

        $id = Input::get('course');
        $course_id = Course::find($id)->first();
        $section_id = Input::get('section');
        $level = Input::get('difficulty');
        $content = Input::get('question');
        $option1 = Input::get('gozine1');
        $option2 = Input::get('gozine2');
        $option3 = Input::get('gozine3');
        $option4 = Input::get('gozine4');
        $arr = array('1' => $option1, '2' => $option2, '3' => $option3, '4' => $option4);
        $options = json_encode($arr);
        $answer = Input::get('answer');
        $solution = Input::get('solution');
        $username = Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $question = new questions();
        $question->course_id = $course_id->id;
        $question->exercise_id = $section_id;
        $question->level = $level;
        $question->content = $content;
        $question->options = $options;
        $question->answer = $answer;
        $question->solution = $solution;
        $question->writer = 1;
//        echo dd($question);
        $question->save();

        return redirect('/');
    }

    public function give(){
        $name = Input::get('testName');
        $code = Input::get('testPass');
        $username = Session::get('UserName');

        $exercise = exercise::where('code','=',$code)->where('name','=',$name)->first();

        $userexe = new userexercise();
        $userexe->username = $username;
        $userexe->exercise_id = $exercise->id;
        $userexe->save();

        return redirect('/Dashboard');
    }

    public function show($id){

        $username = \Session::get('UserName');
        $courses = Course::all();
        $questions = questions::where('exercise_id',$id)->get();
        $exercise = exercise::where('id','=',$id)->first();
        $course = Course::where('id','=',$exercise->course_id)->first();
        $section = Section::where('id','=',$exercise->section_id)->first();
        $user = User::where('username','=',$username)->first();
        //$answers = array();

        foreach($questions as $question){
            $answers[$question->id] = json_decode($question->options);

        }

        return view('Qamar10' ,compact('user','courses','questions','exercise','course','section','answers'));
    }
}
