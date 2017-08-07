<?php

namespace App\Http\Controllers;


use App\Course;
use App\courses;
use App\exercise;
use App\School;
use App\users;
use Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $schools = School::all();
        return view('Tdashboard', compact('schools'));
    }
    public function get(){
        if(Session::get('Login')!="True"){
            return redirect('/');
        }
        $username=Session::get('UserName');
        $users=DB::select('Select * From goal where username="'.$username."\"");
        $info=array();
        $info['exam']=2;
        $info['questions']=15;
        foreach ($users as $user){
            $info['exam']=$user->exam;
            $info['questions']=$user->questions;
        }
        $courses = Course::all();
        $exercises = exercise::all();
        $user_course = courses::all();
        return view('dashboard')->with(['info'=>$info,'courses'=>$courses,'exercises'=>$exercises,'user_course'=>$user_course]);
    }
    public function SetGoal(){
        $exams=(int) Input::get('exam');
        $questions=(int) Input::get('questions');
        $username=Session::get('UserName');
        $users=DB::select('select * from goal Where username="'.$username.'"');
        $check=0;
        foreach ($users as $user){
            $check=1;
            DB::table('goal')
                ->where('username',"$username")
                ->update(['exam'=>$exams,'questions'=>$questions]);
        }
        if(!$check){
            DB::table('goal')->insert(
              [
                  'username'=>$username,
                  'exam'=>$exams,
                  'questions'=>$questions
              ]
            );
        }
        return redirect('/Dashboard');
    }
}
