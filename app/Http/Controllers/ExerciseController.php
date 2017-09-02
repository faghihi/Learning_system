<?php

namespace App\Http\Controllers;

use App\ClassExercise;
use App\Course;
use App\Exercise;
use App\Question;
use App\Section;
use App\tempanswer;
use App\User;
use App\School;
use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class ExerciseController extends Controller
{
    //create an exercise
    public function create(){
        //give info from user
        $name = Input::get('nameEx');
        $code = Input::get('code');
        $easy = Input::get('easy');
        $medium = Input::get('medium');
        $hard = Input::get('hard');
        $class_id = Input::get('class');
        $course_id = Input::get('course');
        $section_id = Input::get('section');
        $start = Input::get('startdate');
        $end = Input::get('enddate');

        //if user set a class, exercise save to classes_exercises table too
        if($class_id){
            $exercise = new ClassExercise();
            $exercise->name = $name;
            $exercise->code = $code;
            $exercise->class_id = $class_id;
            $exercise->course_id = $course_id;
            $exercise->easy_no = $easy;
            $exercise->medium_no = $medium;
            $exercise->hard_no = $hard;
            $exercise->section_id = $section_id;
            $exercise->start_date = $start;
            $exercise->end_date = $end;
            $exercise->save();

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
            $exercise->save();


            $easy = $exercise->easy_no;
            $medium = $exercise->medium_no;
            $hard = $exercise->hard_no;
            $total = $easy + $medium + $hard;

            $q_easy = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',0)->get();

            $q_medium = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',1)->get();

            $q_hard = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',2)->get();

            $i = 0;$j = 0;$k = 0;
            if($easy > 0){
                for($i = 0;$i < $easy;$i++){
                    $quest[$i] = $q_easy[$i];
                }
            }
            if($medium > 0 ){
                for($j = 0;$j < $medium;$j++){
                    $quest[$i+$j] = $q_medium[$j];
                }
            }
            if($hard > 0 ){
                for($k = 0;$k < $hard;$k++){
                    $quest[$k+$i+$j] = $q_hard[$k];
                }
            }

            for($j = 0;$j < $total;$j++){
                $questions[$j] = $quest[$j];
            }

            //set exercise_id for questions
            try{
                foreach($questions as $question){
                    $question->exercises()->attach($exercise->id);
                }
            }catch (\Exception $e) {
                return $e->getMessage();
            }

        }
        //if user don't set a class,just save in exercises table
        else {
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
            $exercise->save();
        }

        return redirect('/');
    }

    //student create exercise
    public function createStuEx(){
        //give info from user
        $name = Input::get('nameEx');
        $easy = Input::get('easy');
        $medium = Input::get('medium');
        $hard = Input::get('hard');
        $course_id = Input::get('course');
        $section_id = Input::get('section');

        //if user set a class, exercise save to classes_exercises table too
        $exercise = new exercise();
        $exercise->name = $name;
        $exercise->course_id = $course_id;
        $exercise->easy_no = $easy;
        $exercise->medium_no = $medium;
        $exercise->hard_no = $hard;
        $exercise->section_id = $section_id;
        $exercise->save();


        $easy = $exercise->easy_no;
        $medium = $exercise->medium_no;
        $hard = $exercise->hard_no;
        $total = $easy + $medium + $hard;

        $q_easy = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',0)->get();

        $q_medium = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',1)->get();

        $q_hard = Question::inRandomOrder()->where('course_id',$exercise->course_id)->where('section_id',$exercise->section_id)
                ->where('level',2)->get();
        $i = 0;$j = 0;$k = 0;
        if($easy > 0){
            for($i = 0;$i < $easy;$i++){
                $quest[$i] = $q_easy[$i];
            }
        }

        if($medium > 0 ){
            for($j = 0;$j < $medium;$j++){
                $quest[$i+$j] = $q_medium[$j];
            }
        }
        if($hard > 0 ){
            for($k = 0;$k < $hard;$k++){
                $quest[$k+$i+$j] = $q_hard[$k];
            }
        }

        for($j = 0;$j < $total;$j++){
            $questions[$j] = $quest[$j];
        }

        //set exercise_id for questions
        try{
            foreach($questions as $question){
                $question->exercises()->attach($exercise->id);
            }
        }catch (\Exception $e) {
            return $e->getMessage();
        }
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $user->exercises()->attach($exercise->id,['status'=>0]);

        return redirect('/Dashboard')->with('message','ایول به خودم');

    }
    public function createquestion(){

        $id = Input::get('course');
        $course = Course::where('id',$id)->first();

        $section_id = Input::get('section');

        $exercise = Exercise::where('course_id',$course->id)->where('section_id',$section_id)->first();

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
        $email = Session::get('Email');
        $user = User::where('email','=',$email)->first();

        $question = new Question();
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

    //get class
    public function giveClass(){
        //set rules for validation
        $rules = array(
            'className' => 'required|max:64', // make sure the email is an actual email
            'classPass' => 'required'
        );
        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید'
        ];
        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator); // send back all errors to the login form
        }

        $name = Input::get('className');
        $code = Input::get('classPass');
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $class = Classes::where('Rstring','=',$code)->where('name','=',$name)->first();
        if(count($class) > 0) {
            //add to user classes
            $user->classes()->attach($class->id,['status'=>1]);
        }else{
            return redirect()->back()->with('msg', 'رمز را اشتباه وارد کردید');
        }

        return redirect('/Dashboard')->with('message', 'درخواست شما ثبت شد،بعد از تایید آموزگار می توانید در کلاس مورد نظر حضور یابید');
    }

    //get test
    public function give(){
        //set rules for validation
        $rules = array(
            'testName' => 'required|max:64', // make sure the email is an actual email
            'testPass' => 'required'
        );
        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید'
        ];
        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator); // send back all errors to the login form
        }

        $name = Input::get('testName');
        $code = Input::get('testPass');
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $exercise = Exercise::where('code','=',$code)->where('name','=',$name)->first();

        if(count($exercise) > 0) {
            //add to user exercises
            $user->exercises()->attach($exercise->id,['status'=>0]);
        }else{
            return redirect()->back()->with('msg', 'رمز را اشتباه وارد کردید');
        }

        return redirect('/Dashboard')->with('message', 'تمرین مورد نظر اخذ گردد،برای مشاهده به تمرین های جدید بروید');
    }

    //show exercise
    public function show($id){

        $email = Session::get('Email');
        $courses = Course::all();
        $exercise = Exercise::where('id','=',$id)->first();

        $questions = $exercise->questions;

        $course = Course::where('id','=',$exercise->course_id)->first();
        $section = Section::where('id','=',$exercise->section_id)->first();
        $user = User::where('email','=',$email)->first();

        foreach($questions as $question){
            $answers[$question->id] = json_decode($question->options);

        }

        $saves = tempanswer::where('user_id',$user->id)->where('exercise_id',$exercise->id)->get();

        $exercises = $user->exercises;

        if(count($exercises) > 0) {
            foreach ($user->exercises as $e) {
                if ($e->id == $exercise->id) {
                    //$user->exercises()->attach($exercise->id,['status'=>1]);
                } else {

                }
            }
        }else {
            $user->exercises()->attach($exercise->id,['status'=>1]);
        }

        return view('Qamar10' ,compact('user','courses','questions','exercise','course','section','answers','saves'));
    }

    //delete exercise
    public function delete($id){

        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $tempanswers = tempanswer::where('exercise_id',$id)->where('user_id',$user->id)->get();
        if(count($tempanswers) > 0) {
            foreach ($tempanswers as $temp) {
                $temp->delete();
            }
        }

        $user->exercises()->detach($id);

        return redirect('/Dashboard');
    }
}
