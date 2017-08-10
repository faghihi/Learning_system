<?php

namespace App\Http\Controllers;

use App\Section;
use App\User;
use App\School;
use App\classes;
use App\Course;
use App\courses;
use App\userclass;
use App\users;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use App\tempanswer;

class Amar10Controller extends Controller
{
    //
    public function index() {
        $classname = Input::get('classname');
        $school_id = Input::get('school');

        $class = new classes();
        $class->name = $classname;
        $class->school_id = $school_id;
        $class->save();

        $students = Input::get('students');

        foreach($students as $student) {

            $userclass = new userclass();
            $userclass->username = $student;
            $class = classes::where('name','=',$classname)->first();
            $userclass->class_id = $class->id;
            $userclass->save();
        }

        $schools = School::all();
        $username = Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $users = User::all();
        $classes = classes::all();
        $courses = Course::all();
        return view('TDashboard',compact('schools','user','users','classes','courses'));
    }

    public function addcourse() {
        $coursename = Input::get('coursename');
        $grade = Input::get('grade');
        $username = Session::get('UserName');
        $teacher = users::where('username','=',$username)->first();

        $course = new Course();
        $course->name = $coursename;
        $course->grade = $grade;
        $course->teacher_name = $teacher->name;

        $course->save();

        $id = Course::where('name','=',$coursename)->first();

        $section = new Section();
        $section->course_id = $id;
        $section->name = Input::get('section');
        $section->save();

        $schools = School::all();
        $username = Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $users = User::all();
        $classes = classes::all();
        $courses = Course::all();
        return view('TDashboard',compact('schools','user','users','classes','courses'));
    }

    public function get($id){
        $check=0;
        if(Session::get('Login')=="True")
        {
            $username = Session::get('UserName');
            $user = users::where('username','=',$username)->first();
            $courses=courses::where('username','=',$username)->where('course_id','=',$id)->first();
            if(count($courses) > 0) {
                foreach ($courses as $course) {
                    if ($course != null)
                        $check = 1;
                }
            }
        }
        $courses = Course::all();
        $course = Course::where('id','=',$id)->first();
        return view('amar10')->with(['Check'=>$check,'courses'=>$courses,'user'=>$user,'course'=>$course]);
    }

    public function quest($name){
        $count=2;
        $question_array=array();
        $questions=DB::select('select * from questions ORDER by RAND() LIMIT '."$count");
        $number=0;
        foreach ($questions as $question)
        {
            $question_array[$number]['id']=$question->id;
            $question_array[$number]['content']=$question->content;
            $question_array[$number]['answer']=$question->answer;
            $answers=explode(';',$question->answers);
            //print_r($answers);
            for($i=0;$i<=3;$i++){
                $question_array[$number]['answers'][$i]=$answers[$i];
            }
            switch ($question->level)
            {
                case 0 : $question_array[$number]['level']="ساده";
                    break;
                case 1:  $question_array[$number]['level']="متوسط";
                    break;
                case 2:  $question_array[$number]['level']="سخت";
                    break;
            }
            $number++;
        }
        return view('Q'.$name)->with('questions',$question_array);

//        echo $number;
//        print_r($question_array);
//        echo $question_array[$number-1]["answers"][0];
        
    }

    public function add($id){
        if(Session::get('Login')!="True")
        {
            return redirect('/UserArea');
        }

        $username = Session::get('UserName');
        $courses=courses::where('username','=',$username)->where('course_id','=',$id)->first();
        if(count($courses) > 0) {
            foreach ($courses as $course) {
                if ($course != null)
                    return redirect('/Dashboard');
            }
        }
        $Course=new courses();
        $Course->username=$username;
        $Course->course_id=$id;
        $Course->score = 0;
        $Course->save();
        return redirect('/Dashboard');
    }

    public function save(){
        echo "saved";
        print_r(Input::all());
        $username=Session::get('UserName');
        $answers=DB::select('select * from tempanswer Where username ="'.$username.'"');
        foreach ($answers as $answer)
        {
            if($answer)
            {
                return redirect('/Q/WarningSave');
            }
        }
        $count=Input::get('number');
        for($i=0;$i<$count;$i++){
            $answerid=Input::get('n'.$i);
            $temp=new tempanswer();
            $temp->id=$answerid;
            $temp->username=$username;

            if(Input::has('q'.$i)){
                $answercheck=Input::get('q'.$i);
            }
            else {
                $answercheck=0;
            }
            $temp->answer=$answercheck;
            $temp->save();
        }
        return redirect('/Dashboard');
    }

    public function check (){

        $count=Input::get('number');
        $question_array=array();
        for($i=0;$i<$count;$i++){
            $question_array[$i]['id']=Input::get('n'.$i);

            if(Input::has('q'.$i)){
                $answercheck=Input::get('q'.$i);
            }
            else {
                $answercheck=0;
            }
            $question_array[$i]['answerthis']=$answercheck;
            $question_array[$i]['answer']=Input::get('a'.$i);
            $question_array[$i]['content']=Input::get('t'.$i);

            $thisquest = DB::select('select * from questions Where id="' . $question_array[$i]['id'] . '"');

            foreach ($thisquest as $quest) {
                $answers=json_decode($quest->options);
                for($j = 0 ;$j < 4;$j++ ){
                     foreach($answers as $answer=>$value) {

                        $question_array[$i]['answers'][$answer]=$value;
                     }
                }

                if($question_array[$i]['answerthis']==0)
                {
                    $question_array[$i]['correct']='N';
                    $question_array[$i]['answerthis']="شما به این سوال پاسخ نداده اید";
                }
                elseif($question_array[$i]['answerthis']==$question_array[$i]['answer']){
                    $question_array[$i]['correct']='C';
                    $question_array[$i]['answerthis']=$question_array[$i]['answers'][$question_array[$i]['answerthis']];
                }
                else {
                    $question_array[$i]['correct']='N';
                    $question_array[$i]['answerthis']=$question_array[$i]['answers'][$question_array[$i]['answerthis']];
                }
                $question_array[$i]['answer']=$question_array[$i]['answers'][$question_array[$i]['answer']];
                switch ($quest->level)
                {
                    case 0 : $question_array[$i]['level']="ساده";
                        break;
                    case 1:  $question_array[$i]['level']="متوسط";
                        break;
                    case 2:  $question_array[$i]['level']="سخت";
                        break;
                }
            }
        }
        return view ('CorrectionAmar10')->with('questions',$question_array);
    }

    public function warning(){
        return view('errors\503');
    }

    public function continuethis(){
        $question_array=array();
        $username=Session::get('UserName');
        $questions=DB::select('select * from tempanswer Where username="'.$username.'"');
        $number=0;
        foreach ($questions as $question) {

            $question_array[$number]['id'] = $question->id;
            $question_array[$number]['checked']=$question->answer;
            $thisquest = DB::select('select * from questions Where id="' . $question_array[$number]['id'] . '"');
            foreach ($thisquest as $quest) {
                $question_array[$number]['content']=$quest->content;
                $question_array[$number]['answer']=$quest->answer;
                $answers=explode(';',$quest->answers);
                //print_r($answers);
                for($i=0;$i<=3;$i++){
                    $question_array[$number]['answers'][$i]=$answers[$i];
                }
                switch ($quest->level)
                {
                    case 0 : $question_array[$number]['level']="ساده";
                        break;
                    case 1:  $question_array[$number]['level']="متوسط";
                        break;
                    case 2:  $question_array[$number]['level']="سخت";
                        break;
                }
            }

            $number++;
        }
        return view('Continue')->with('questions',$question_array);
    }

    public function delete(){
        DB::table('tempanswer')->where('username', '=', Session::get('UserName'))->delete();
    }
}
