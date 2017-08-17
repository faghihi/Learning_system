<?php

namespace App\Http\Controllers;

use App\classes;
use App\Score;
use App\Section;
use App\User;
use App\Course;
use App\courses;
use App\exercise;
use App\School;
use App\userexercise;
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
        $username = Session::get('UserName');
        $user = User::where('username','=',$username)->first();

        $users = User::all();
        $classes = classes::all();
        $courses = Course::all();
        $sections = Section::all();
        $exercises =  exercise::all();
        return view('Tdashboard', compact('schools','user','users','classes','courses','sections','exercises'));
    }

    public function get(){
        if(Session::get('Login')!="True"){
            return redirect('/');
        }
        $username=Session::get('UserName');
        $users=DB::select('Select * From goal where username="'.$username."\"");
        $info=array();
        $info['exam']=0;
        $info['questions']=0;
        foreach ($users as $user){
            $info['exam']=$user->ex_count;
            $info['questions']=$user->q_count;
        }
        $courses = Course::all();
        $exercises = exercise::all();
        $user_course = courses::where('username','=',$username)->get();
        $user = User::where('username','=',$username)->first();
        $user_exercise = userexercise::where('username','=',$username)->get();

        $count_solve = 0;
        $count_answer = 0;
        foreach($user_exercise as $us_ex){
            $exam = Score::where('exercise_id',$us_ex->exercise_id)->where('username',$username)->first();

            if($us_ex->status == 2){
                $count_solve ++;
            }
            if($exam) {
                $count_answer += $exam->q_count;
            }else{
                $count_answer = 0;
            }
        }

        $user_scores = Score::where('username',$username)->get();

        return view('dashboard')->with(['info'=>$info,'courses'=>$courses,'exercises'=>$exercises,'user_course'=>$user_course,'user'=>$user,'user_exercise'=>$user_exercise,
            'count'=>$count_solve,'user_scores'=>$user_scores,'answer_count'=>$count_answer]);
    }

    public function SetGoal(){
        $exams=(int) Input::get('exam');
        $questions=(int) Input::get('questions');
        $username=Session::get('UserName');
        $users=DB::select('select * from goal Where username="'.$username.'"');
        $check=0;

        $date = new \DateTime('now');
        foreach ($users as $user){
            $check=1;
            DB::table('goal')
                ->where('username',"$username")
                ->update(['ex_count'=>$exams,
                    'q_count'=>$questions,
                    'start_date'=> $date->format('Y/m/d'),
                    'end_date'=> $date->add(new \DateInterval('P7D'))]);
        }
        if(!$check){
            DB::table('goal')->insert(
              [
                  'username'=>$username,
                  'ex_count'=>$exams,
                  'q_count'=>$questions,
                  'start_date'=> $date->format('Y/m/d'),
                  'end_date'=> $date->add(new \DateInterval('P7D')),
                  'score'=> 0
              ]
            );
        }
        return redirect('/Dashboard');
    }

    public function correct($id){
        $score = Score::where('exercise_id',$id)->first();

        return redirect('/Dashboard');
    }
}
