<?php

namespace App\Http\Controllers;

use App\Course;
use App\exercise;
use App\questions;
use App\Section;
use App\tempanswer;
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
        $course = Course::where('id',$id)->first();

        $section_id = Input::get('section');

        $exercise = exercise::where('course_id',$course->id)->where('section_id',$section_id)->first();

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
        $question->section_id = $section_id;
        $question->course_id = $course->id;
        if($exercise) {
            $question->exercise_id = $exercise->id;
        }else {
            $question->exercise_id = 0;
        }
        $question->level = $level;
        $question->content = $content;
        $question->options = $options;
        $question->answer = $answer;
        $question->solution = $solution;
        $question->writer = $user->name;
//        dd($question);
        $question->save();

        return redirect('/');
    }

    public function give(){
        $name = Input::get('testName');
        $code = Input::get('testPass');
        $username = Session::get('UserName');

        $exercise = exercise::where('code','=',$code)->where('name','=',$name)->first();

        if(count($exercise) > 0) {
            $userexe = new userexercise();
            $userexe->username = $username;
            $userexe->exercise_id = $exercise->id;

            try {
                $userexe->save();
            } catch (\Exception $e) {
                return $e->getMessage('کد اشتباه است');
            }
        }
        return redirect('/Dashboard');
    }

    public function show($id){

        $username = \Session::get('UserName');
        $courses = Course::all();
        $exercise = exercise::where('id','=',$id)->first();

        $questions = questions::where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)->get();
        try{
            foreach($questions as $question){
                $question->exercise_id = $id;
                $question->update();
            }
        }catch (\Exception $e) {
            return $e->getMessage();
        }
        $course = Course::where('id','=',$exercise->course_id)->first();
        $section = Section::where('id','=',$exercise->section_id)->first();
        $user = User::where('username','=',$username)->first();

        foreach($questions as $question){
            $answers[$question->id] = json_decode($question->options);

        }

        $saves = tempanswer::where('username',$username)->where('exercise_id',$exercise->id)->get();

        $user_exer = userexercise::where('username',$username)->where('exercise_id',$exercise->id)->first();

        if($user_exer == null) {
            $user_exercise = new userexercise();
            $user_exercise->username = $username;
            $user_exercise->exercise_id = $exercise->id;
            $user_exercise->status = 0;
            $user_exercise->save();
        }
        return view('Qamar10' ,compact('user','courses','questions','exercise','course','section','answers','saves'));
    }

    public function delete($id){

        $username = Session::get('UserName');
        $exercise = userexercise::where('exercise_id',$id)->where('username',$username)->first();

        $tempanswers = tempanswer::where('exercise_id',$id)->where('username',$username)->get();
        foreach($tempanswers as $temp){
            $temp->delete();
        }

        $exercise->delete();

        return redirect('/');
    }
}
