<?php

namespace App\Http\Controllers;

use App\exercise;
use App\Score;
use App\Section;
use App\User;
use App\School;
use App\classes;
use App\Course;
use App\courses;
use App\userclass;
use App\userexercise;
use App\users;
use App\questions;
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
        if(count($students > 0)) {
            foreach ($students as $student) {

                $userclass = new userclass();
                $userclass->username = $student;
                $class = classes::where('name', '=', $classname)->first();
                $userclass->class_id = $class->id;
                $userclass->save();
            }
        }

        $schools = School::all();
        $username = Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $users = User::all();
        $classes = classes::all();
        $courses = Course::all();
        $sections = Section::all();
        $exercises = exercise::all();
        return view('TDashboard',compact('schools','user','users','classes','courses','sections','exercises'));
    }

    public function addcourse() {
        $coursename = Input::get('coursename');
        $grade = Input::get('grade');
        $username = Session::get('UserName');
        $teacher = users::where('username','=',$username)->first();

        $check = Course::where('name',$coursename)
            ->where('grade',$grade)
            ->where('teacher_name',$teacher->name)->first();

        if($check){
            $section = new Section();
            $section->course_id = $check->id;
            $section->name = Input::get('section');
            $section->save();
        }
        else {
            if ($coursename) {
                $course = new Course();
                $course->name = $coursename;
                $course->grade = $grade;
                $course->teacher_name = $teacher->name;
                $course->save();

                $course_id = Course::where('name', '=', $coursename)->where('grade',$grade)->first();
                $section = new Section();
                $section->course_id = $course_id->id;
                $section->name = Input::get('section');
                $section->save();
            }
        }
//        return view('TDashboard',compact('schools','user','users','classes','courses','sections'));
        return redirect('/TDashboard');
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
        }else{
            $user = [];
        }
        $courses = Course::all();
        $course = Course::where('id','=',$id)->first();
        $count_solved = 0;
        $exercises = exercise::where('course_id',$id)->get();
        foreach($exercises as $exercise){
            if($exercise->status == 2){
                $count_solved ++;
            }
        }
        $sections = Section::where('course_id',$id)->get();

        return view('amar10')->with(['Check'=>$check,'courses'=>$courses,'user'=>$user,'course'=>$course,'exercises'=>$exercises,
        'count_solved'=>$count_solved,'sections'=>$sections]);
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

    public function save($id){

        $username=Session::get('UserName');
        $answers=tempanswer::where('username',$username)->where('exercise_id',$id)->get();

            if($answers)
            {
                foreach($answers as $answer) {
                    $count = Input::get('number');
                    for ($i = 0; $i < $count; $i++) {
                        $answerid = Input::get('n' . $i);
                        $temp = tempanswer::where('id', $answerid)->where('username', $username)->first();

                        if (Input::has('q' . $i)) {
                            $answercheck = Input::get('q' . $i);
                        } else {
                            $answercheck = 0;
                        }

                        $temp->answer = $answercheck;

                        $temp->update();
                    }
                }
            }
            else {

                $count = Input::get('number');
                for ($i = 0; $i < $count; $i++) {
                    $answerid = Input::get('n' . $i);
                    $temp = new tempanswer();
                    $temp->id = $answerid;
                    $temp->username = $username;

                    $question = questions::where('id', $answerid)->first();
                    $temp->exercise_id = $question->exercise_id;

                    if (Input::has('q' . $i)) {
                        $answercheck = Input::get('q' . $i);
                    } else {
                        $answercheck = 0;
                    }
                    $temp->answer = $answercheck;

                    $temp->save();
                }

            }

        return redirect('/');
    }

    public function check ($id){

        $count=Input::get('number');
        $correct = 0;
        $status_point =0;
        $total_point = 0;
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
                    $correct ++;
                    switch ($quest->level)
                    {
                        case 0 : $question_array[$i]['level']="ساده";
                            $status_point += 1;
                            break;
                        case 1:  $question_array[$i]['level']="متوسط";
                            $status_point += 2;
                            break;
                        case 2:  $question_array[$i]['level']="سخت";
                            $status_point += 3;
                            break;
                    }
                }
                else {
                    $question_array[$i]['correct']='N';
                    $question_array[$i]['answerthis']=$question_array[$i]['answers'][$question_array[$i]['answerthis']];
                }
                //dd($question_array[$i]['answers'][$question_array[$i]['answer']]);
                $question_array[$i]['answer']=$question_array[$i]['answers'][$question_array[$i]['answer']];
                switch ($quest->level)
                {
                    case 0 : $question_array[$i]['level']="ساده";
                             $total_point += 1;
                        break;
                    case 1:  $question_array[$i]['level']="متوسط";
                             $total_point += 2;
                        break;
                    case 2:  $question_array[$i]['level']="سخت";
                             $total_point += 3;
                        break;
                }
            }
        }

        $username = Session::get('UserName');
        $score = Score::where('username',$username)->where('exercise_id',$id)->first();

        if($score){
            $score->c_count=$correct;
            $score->st_point=$status_point;
            $score->percent=($status_point / $total_point) * 100;
        }else {
            $score = new Score();
            $exercise = exercise::where('id', $id)->first();
            $score->course_id = $exercise->course_id;
            $score->username = $username;
            $score->exercise_id = $id;
            $score->q_count = $count;
            $score->c_count = $correct;
            $score->st_point = $status_point;
            $score->t_point = $total_point;
            $score->percent = ($status_point / $total_point) * 100;

            try {
                $score->save();
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        $user_exercise = userexercise::where('username',$username)->where('exercise_id',$id)->first();
        $user_exercise->status = 2;
        $user_exercise->update();

        return view ('CorrectionAmar10',compact('score'))->with('questions',$question_array);
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

     public function delete($id){
         $username = Session::get('UserName');

         DB::table('courses')->where('course_id',$id)->where('username',$username)->delete();

         return redirect('/Dashboard');
     }

    public function deleteclass($id){

        DB::table('user_class')->where('class_id',$id)->delete();
        DB::table('classes')->where('id',$id)->delete();

        return redirect('/TDashboard');
    }
}
