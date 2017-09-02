<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassExercise;
use App\Goal;
use App\Grade;
use App\Score;
use App\Section;
use App\tempanswer;
use App\User;
use App\Course;
use App\Exercise;
use App\School;
use Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;

class DashboardController extends Controller
{
    //show teacher dashboard
    public function index() {
        $schools = School::all();
        $email = Session::get('Email');
        $user = User::where('email','=',$email)->first();

        $users = User::all();
        $exercises =  Exercise::all();
        $classes = Classes::all();
        $courses = Course::all();
        $sections = Section::all();
        $class_exercise = ClassExercise::all();
        $grades=Grade::all();
        return view('Tdashboard', compact('schools','user','users','classes','courses','sections','exercises','class_exercise','grades'));
    }

    //show student dashboard
    public function get(){
        if(Session::get('Login')!="True"){
            return redirect('/');
        }
        $email=Session::get('Email');
        $user = User::where('email','=',$email)->first();

        $users = Goal::where('user_id',$user->id)->get();
        $info=array();
        $info['exam']=0;
        $info['questions']=0;
        foreach ($users as $us){
            $info['exam']=$us->ex_count;
            $info['questions']=$us->q_count;
        }
        $courses = Course::all();
        $exercises = Exercise::all();
        $classes = Classes::all();
        $user_course = $user->courses;
        $user_exercise = $user->exercises;

        $count_solve = 0;
        $count_answer = 0;
        if(count($user_exercise) > 0) {
            foreach ($user_exercise as $us_ex) {
                $exam = Score::where('exercise_id', $us_ex->id)->where('user_id', $user->id)->first();
                $temp = tempanswer::where('exercise_id', $us_ex->id)->where('user_id', $user->id)->get();

                $smp = DB::table('users_exercises')->where('exercise_id',$us_ex->id)
                    ->where('user_id',$user->id)->first();

                if ($smp->status == 2) {
                    $count_solve++;
                }
                if (count($temp) > 0) {
                    foreach ($temp as $t) {
                        if ($t->answer > 0) {
                            $count_answer++;
                        }
                    }
                }

                if ($exam) {
                    $count_answer += $exam->q_count;
                } else {
                    $exam = [];
                }
            }

        }
        $user_scores = Score::where('user_id',$user->id)->get();
        $user_classes = $user->classes;
        $teachers = User::all();
        $schools = School::all();
        return view('dashboard')->with(['info'=>$info,'courses'=>$courses,'exercises'=>$exercises,'user_course'=>$user_course,'user'=>$user,'user_exercise'=>$user_exercise,
            'count'=>$count_solve,'user_scores'=>$user_scores,'answer_count'=>$count_answer,'user_classes'=>$user_classes,
        'classes'=>$classes,'teachers'=>$teachers,'schools'=>$schools]);
    }

    public function SetGoal(){
        $exams=(int) Input::get('exam');
        $questions=(int) Input::get('questions');
        $email=Session::get('Email');
        $user=User::where('email',$email)->first();
        $users=Goal::where('user_id',$user->id)->get();
        $check=0;

        $date = new \DateTime('now');
        foreach ($users as $user){
            $check=1;
            DB::table('goals')
                ->where('user_id',$user->id)
                ->update(['ex_count'=>$exams,
                    'q_count'=>$questions,
                    'start_date'=> $date->format('Y/m/d'),
                    'end_date'=> $date->add(new \DateInterval('P7D'))]);
        }
        if(!$check){
            DB::table('goals')->insert(
              [
                  'user_id'=>$user->id,
                  'ex_count'=>$exams,
                  'q_count'=>$questions,
                  'start_date'=> $date->format('Y/m/d'),
                  'end_date'=> $date->add(new \DateInterval('P7D'))
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
