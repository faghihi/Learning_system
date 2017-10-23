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
use Carbon\Carbon;

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
        $tickets = Ticket::where('user_id', $user->id)->orderBy('created_at','desc')->get();
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

        $dt = Carbon::now();
        $goals = Goal::where('user_id',$user->id)->get();

        $info = array();
        $info['exam'] = 0;
        $info['questions'] = 0;
        $info['time'] = 0;
        $count_answer = 0;
        $count_solve = 0;
        $totalDuration = [];

        if(count($goals) > 0) {
            foreach ($goals as $us) {
                $info['exam'] = $us->ex_count;
                $info['questions'] = $us->q_count;

                $stGoalTime = Carbon::parse($dt);
                $enGoalTime = Carbon::parse($us->end_date);

                if ($us->end_date > $dt) {
                    $dead = $enGoalTime->diff($stGoalTime)->format('%d') + 1;
                    if ($dead > 0) {
                        $info['time'] = $dead;

                        $user_exercise = $user->exercises;

                        if (count($user_exercise) > 0) {
                            foreach ($user_exercise as $us_ex) {
                                $startTime = Carbon::parse($dt);

                                if ($us_ex->end_date != null && $us_ex->end_date > $dt) {
                                    $finishTime = Carbon::parse($us_ex->end_date);
                                    $dead = $finishTime->diff($startTime)->format('%d') + 1;
                                    if ($dead > 0) {
                                        $totalDuration[$us_ex->id] = $dead;
                                    } else {
                                        //$user->exercises()->detach($us_ex->id);
                                    }
                                }

                                $exam = Score::where('exercise_id', $us_ex->id)->where('user_id', $user->id)->first();
                                $temp = tempanswer::where('exercise_id', $us_ex->id)->where('user_id', $user->id)->get();

                                $smp = DB::table('users_exercises')->where('exercise_id', $us_ex->id)
                                    ->where('user_id', $user->id)->first();

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
                    }
                } else {
                    $count_answer = 0;
                    $count_solve = 0;

                    $info['time'] = 7;

                    $deadline =  $enGoalTime->addDays(7);

                    $goal = Goal::find($us->id);
                    $goal->end_date = $deadline->format('Y-m-d');
                    $goal->save();
                }
            }
        }

        $courses = Course::all();
        $exercises = Exercise::all();
        $classes = Classes::all();
        $user_course = $user->courses;
        $user_exercise = $user->exercises;

        if (count($user_exercise) > 0) {
            foreach ($user_exercise as $us_ex) {
                $startTime = Carbon::parse($dt);

                if ($us_ex->end_date != null) {
                    $finishTime = Carbon::parse($us_ex->end_date);
                    $dead = $finishTime->diff($startTime)->format('%d') + 1;
                    if ($dead > 0  && $us_ex->end_date > $dt) {
                        $totalDuration[$us_ex->id] = $dead;
                    } else {
                        foreach($us_ex as $exercise){
                                $exercise=Exercise::find($us_ex->id);
                                $exercise->deadline = true;
                                $exercise->save();
                        }
                    }
                }
            }
        }

        $user_scores = Score::where('user_id',$user->id)->get();
        $user_classes = $user->classes;
        $grades = Grade::all();
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        $categories = Category::all();
        $tickets = Ticket::where('user_id', $user->id)->get();

        return view('dashboard')->with(['info'=>$info,'courses'=>$courses,'exercises'=>$exercises,'user_course'=>$user_course,'user'=>$user,'user_exercise'=>$user_exercise,
            'count'=>$count_solve,'user_scores'=>$user_scores,'answer_count'=>$count_answer,'user_classes'=>$user_classes,
            'classes'=>$classes,'teachers'=>$teachers,'schools'=>$schools,'categories'=>$categories,'tickets'=>$tickets,'grades'=>$grades,
            'totals'=>$totalDuration]);
    }

    public function SetGoal(){
        $exams=(int) Input::get('exam');
        $questions=(int) Input::get('questions');
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $goals = Goal::where('user_id',$user->id)->get();
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

    public function addCourse(){
        $c_id = Input::get('courseName');
        $course = Course::find($c_id);

        $user = User::where('email',Session::get('Email'))->first();

        $user->courses()->attach($course->id);

        return redirect('/Dashboard')->with('message','درس اضاف شد.');
    }

    public function deletecourse($id){
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $user->courses()->detach($id);

        return redirect()->back();
    }
}
