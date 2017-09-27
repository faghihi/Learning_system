<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassExercise;
use App\Category;
use App\Goal;
use App\Grade;
use App\Score;
use App\Section;
use App\tempanswer;
use App\User;
use App\Course;
use App\Exercise;
use App\School;
use App\Ticket;
use App\Question;

use Faker\Provider\DateTime;
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

        if($user->type == 'student'){
            return redirect('/Dashboard');
        }

        $users = User::all();
        $exercises =  Exercise::all();
        $classes = Classes::all();
        $courses = Course::all();
        $sections = Section::all();
        $class_exercise = ClassExercise::all();
        $grades=Grade::all();
        $tickets = Ticket::where('user_id', $user->id)->paginate(10);
        $categories = Category::all();
        $teachers = User::where('type','teacher')->get();
        $user_classes = Classes::where('teacher_name',$user->id)->get();
        $user_exercises = Exercise::where('writer',$user->id)->get();
        $user_questions = Question::where('writer',$user->name)->get();
        //dd($user_classes);
        return view('Tdashboard', compact('schools','user','users','classes','courses','sections','exercises',
            'class_exercise','grades','tickets','categories','teachers','user_questions','user_classes','user_exercises'));
    }

    //show student dashboard
    public function get(){
        if(Session::get('Login')!="True"){
            return redirect('/');
        }

        $email=Session::get('Email');
        $user = User::where('email','=',$email)->first();

        if($user->type == 'teacher'){
            return redirect('/TDashboard');
        }

        $goals = Goal::where('user_id',$user->id)->get();

        $info=array();
        $info['exam']=0;
        $info['questions']=0;
        foreach ($goals as $us){
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
        $grades=Grade::all();
        $teachers = User::all();
        $schools = School::all();
        $categories = Category::all();
        $tickets = Ticket::where('user_id', $user->id)->paginate(10);

        return view('dashboard')->with(['info'=>$info,'courses'=>$courses,'exercises'=>$exercises,'user_course'=>$user_course,'user'=>$user,'user_exercise'=>$user_exercise,
            'count'=>$count_solve,'user_scores'=>$user_scores,'answer_count'=>$count_answer,'user_classes'=>$user_classes,
        'classes'=>$classes,'teachers'=>$teachers,'schools'=>$schools,'categories'=>$categories,'tickets'=>$tickets,'grades'=>$grades]);
    }

    public function SetGoal(){
        $exams=(int) Input::get('exam');
        $questions=(int) Input::get('questions');
        $email=Session::get('Email');
        $user=User::where('email',$email)->first();
        $goals=Goal::where('user_id',$user->id)->get();
        $check=0;


        $date = new \DateTime('now');
        $end = new \DateTime('now');
        $deadline =  $end->add(new \DateInterval('P7D'));
        $difference = $date->diff($deadline);

        foreach ($goals as $goal){
            $check=1;
            $goal->ex_count = $exams;
            $goal->q_count = $questions;

            $goal->update();
        }
        if(!$check){
            $user_goal = new Goal();

            $user_goal->user_id = $user->id;
            $user_goal->ex_count = $exams;
            $user_goal->q_count = $questions;
            $user_goal->start_date = $date->format('Y/m/d');
            $user_goal->end_date = $deadline->format('Y/m/d');

            $user_goal->save();
        }
        return redirect('/Dashboard')->with('message','هدف شما ثبت شد.');
    }

    public function correct($id){
        $score = Score::where('exercise_id',$id)->first();

        return redirect('/Dashboard');
    }

    public function deletecourse($id){
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $user->courses()->detach($id);

        return redirect()->back();
    }
}
