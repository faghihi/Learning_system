<?php

namespace App\Http\Controllers;

use App\Classes;
use App\ClassExercise;
use App\Course;
use App\Exercise;
use App\Grade;
use App\Question;
use App\School;
use App\Score;
use App\Section;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //show first page
    public function get(){
        $email = Session::get('Email');
        $user = User::where('email','=',$email)->first();
        $courses = Course::all();
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();

        //show 3 course in random order
        $new_course = Course::orderBy('created_at','desc')->take(3)->get();

        return view('index' ,compact('user','courses','teachers','schools','new_course'));
    }

    public function guide(){
        $email = Session::get('Email');
        $courses = Course::all();

        $user = User::where('email','=',$email)->first();
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        return view('guide' ,compact('user','courses','teachers','schools'));
    }

    public function classAjax($id){
        $students = User::where('school_id',$id)->where('type','student')->get();

        foreach($students as $student){
            $stud[$student->email]=$student->name;
        }

        return json_encode($stud);
    }

    public function clAjax($id){
        $class = Classes::find($id);
        $exercises = Exercise::all();

        $status = 0;
        $total = 0;

        $user_class = $class->users()->where('status', 2)->get();

        if(count($user_class) > 0) {
            foreach ($user_class as $us_cl) {
                $status = 0;
                $total = 0;

                $user[$us_cl->id] = User::where('email', $us_cl->email)->first();

                $info['user'][$us_cl->id]['stud_name'] = $user[$us_cl->id]->name;

                $labels[] = $user[$us_cl->id]->name;

                $scores = Score::where('user_id', $user[$us_cl->id]->id)->get();

                if (count($scores) > 0) {
                    foreach ($scores as $score) {
                        foreach($exercises as $ex) {
                            if ($score->exercise_id == $ex->id && $ex->code > 0) {
                                $sections = Section::where('course_id', $score->course_id)->get();

                                foreach ($sections as $section) {
                                    if ($section->id == $score->section_id) {
                                        $info['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['section_name'] = $section->name;
                                        $info['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['status'] = $score->st_point;
                                        $info['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['total'] = $score->t_point;
                                        $info['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['progress'] = $score->percent;

                                        $status = $status + $score->st_point;
                                        $total = $total + $score->t_point;
                                    }
                                }
                            }
                        }
                    }
                    $avg = $status * 100 / $total;
                    $data[] = $avg;
                } else {
                    $info['user'][$us_cl->id]['section'][0][0]['section_name'] = 'فعلا هیچی';
                    $info['user'][$us_cl->id]['section'][0][0]['status'] = 0;
                    $info['user'][$us_cl->id]['section'][0][0]['total'] = 0;
                    $info['user'][$us_cl->id]['section'][0][0]['progress'] = 0;

                    $data[] = [];
                }

                $info['labels'] = $labels;
                $info['data'] = $data;
            }
            $labels = [];
            $data = [];
        }else {
            $info['user'][0]['stud_name'] = [];
            $info['labels'] = [];
            $info['data'] = [];
        }

//        dd($info);
        return json_encode($info);
    }

//    public function schoolAjax($id){
//
//        $school = School::find($id);
//        $classes = Classes::where('school_id',$school->id)->get();
//        $exercises = Exercise::all();
//
//        if(count($classes) > 0){
//            foreach($classes as $class){
//                $status = 0;
//                $total = 0;
//
//                $info[$class->id]['class_name'] = $class->name;
//
//                $class = Classes::find($class->id);
//                $user_class = $class->users;
//
//                if(count($user_class) > 0) {
//                    foreach ($user_class as $us_cl) {
//                        $status = 0;
//                        $total = 0;
//
//                        $user[$us_cl->id] = User::where('email', $us_cl->email)->first();
//
//                        $info[$class->id]['user'][$us_cl->id]['stud_name'] = $user[$us_cl->id]->name;
//
//                        $labels[] = $user[$us_cl->id]->name;
//
//                        $scores = Score::where('user_id', $user[$us_cl->id]->id)->get();
//
//                        if (count($scores) > 0) {
//                            foreach ($scores as $score) {
//                                foreach($exercises as $ex) {
//                                    if ($score->exercise_id == $ex->id && $ex->code > 0) {
//                                        $sections = Section::where('course_id', $score->course_id)->get();
//
//                                        foreach ($sections as $section) {
//                                            if ($section->id == $score->section_id) {
//                                                $info[$class->id]['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['section_name'] = $section->name;
//                                                $info[$class->id]['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['status'] = $score->st_point;
//                                                $info[$class->id]['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['total'] = $score->t_point;
//                                                $info[$class->id]['user'][$us_cl->id]['section'][$section->id][$score->exercise_id]['progress'] = $score->percent;
//
//                                                $status = $status + $score->st_point;
//                                                $total = $total + $score->t_point;
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                            $avg = $status * 100 / $total;
//                            $data[] = $avg;
//                        } else {
//                            $info[$class->id]['user'][$us_cl->id]['section'][0][0]['section_name'] = 'فعلا هیچی';
//                            $info[$class->id]['user'][$us_cl->id]['section'][0][0]['status'] = 0;
//                            $info[$class->id]['user'][$us_cl->id]['section'][0][0]['total'] = 0;
//                            $info[$class->id]['user'][$us_cl->id]['section'][0][0]['progress'] = 0;
//
//                            $data[] = [];
//                        }
//
//                        $info[$class->id]['labels'] = $labels;
//                        $info[$class->id]['data'] = $data;
//                    }
//                    $labels = [];
//                    $data = [];
//                }else {
//                    $info[$class->id]['user'][0]['stud_name'] = [];
//                    $info[$class->id]['labels'] = [];
//                    $info[$class->id]['data'] = [];
//                }
//            }
//        }else{
//            $info[0]['class_name'] = [];
//            $info[0]['user'][0]['stud_name'] = [];
//            $info[0]['labels'] = [];
//            $info[0]['data'] = [];
//        }
//
////        dd($info);
//        return json_encode($info);
//    }

    public function myAjax($id){
        $section = Section::where('course_id',$id)->get();
        $user = User::where('email',Session::get('Email'))->first();

        foreach($section as $s){
            $sections[$s->id]['name'] = $s->name;
            $sections[$s->id]['easy'] = 0;
            $sections[$s->id]['medium'] = 0;
            $sections[$s->id]['hard'] = 0;

            $questions = Question::where('course_id',$id)->where('section_id',$s->id)->where('writer',$user->name)->get();
            if(count($questions) > 0) {
                foreach ($questions as $question) {
                    if ($question->level == 0) {
                        $sections[$s->id]['easy'] = $sections[$s->id]['easy']+1;
                    }
                    if ($question->level == 1) {
                        $sections[$s->id]['medium'] =  $sections[$s->id]['medium']+1;
                    }
                    if ($question->level == 2) {
                        $sections[$s->id]['hard'] =  $sections[$s->id]['hard']+1;
                    }
                }
            }else{
                $sections[$s->id]['easy'] = 0;
                $sections[$s->id]['medium'] = 0;
                $sections[$s->id]['hard'] = 0;
            }
        }
//        dd($sections);
        return json_encode($sections);
    }

    public function sectionAjax($id){
        $section = Section::where('course_id',$id)->get();

        foreach($section as $s){
            $sections[$s->id]['name'] = $s->name;
            $sections[$s->id]['easy'] = 0;
            $sections[$s->id]['medium'] = 0;
            $sections[$s->id]['hard'] = 0;

            $questions = Question::where('course_id',$id)->where('section_id',$s->id)->get();
            if(count($questions) > 0) {
                foreach ($questions as $question) {
                    if ($question->level == 0) {
                        $sections[$s->id]['easy'] = $sections[$s->id]['easy']+1;
                    }
                    if ($question->level == 1) {
                        $sections[$s->id]['medium'] =  $sections[$s->id]['medium']+1;
                    }
                    if ($question->level == 2) {
                        $sections[$s->id]['hard'] =  $sections[$s->id]['hard']+1;
                    }
                }
            }else{
                $sections[$s->id]['easy'] = 0;
                $sections[$s->id]['medium'] = 0;
                $sections[$s->id]['hard'] = 0;
            }
        }
//        dd($sections);
        return json_encode($sections);
    }

    public function studentAjax($id){
        $class = Classes::find($id);
        $student = $class->users()->where('status', 2)->get();

        foreach($student as $s){
            $students[$s->id]['name'] = $s->name;
            $students[$s->id]['email'] = $s->email;
            $user = User::where('email',$s->email)->first();
            $exercises = Exercise::all();
            $scores = Score::where('user_id',$user->id)->get();
            $labels = array();
            $data = array();
            if(count($scores) > 0) {
                foreach ($scores as $score) {
                    foreach ($exercises as $exercise) {
                        if ($score->exercise_id == $exercise->id && $exercise->code > 0)  {
                            $students[$s->id]['score'][$score->exercise_id]['exercise_name'] = $exercise->name;
                            $students[$s->id]['score'][$score->exercise_id]['exercise_st_point'] = $score->st_point;
                            $students[$s->id]['score'][$score->exercise_id]['exercise_t_point'] = $score->t_point;
                            $students[$s->id]['score'][$score->exercise_id]['exercise_percent'] = $score->percent;
                            $labels[] = $exercise->name;
                            $data[] =$score->percent;
                        }
                    }
                }
            }else{
                $students[$s->id]['score'][0]['exercise_name']  = 'فعلا هیچی';
                $students[$s->id]['score'][0]['exercise_st_point'] = 0;
                $students[$s->id]['score'][0]['exercise_t_point'] = 0;
                $students[$s->id]['score'][0]['exercise_percent'] = 0;
            }

            $students[$s->id]['labels'] = $labels;
            $students[$s->id]['data'] = $data;
        }
//        dd($students);
        return json_encode($students);
    }

    public function questionAjax($id){
        $course = Course::find($id);
        $sections = Section::where('course_id',$id)->get();
        foreach($sections as $section){
            $sec[$section->id] = $section->name;
        }
        //dd($sec);
        return json_encode($sec);
    }

    public function coAjax($id){
        $class = Classes::find($id);
        $course = Course::find($class->course_id);
        $grade = Grade::find($course->grade_id);

        $info[$course->id]['id'] = $course->id;
        $info[$course->id]['name'] = $course->name;
        $info[$course->id]['grade'] = $grade->name;

//        dd($info);
        return json_encode($info);
    }

    public function quAjax($id){
        $question = Question::find($id);
        $course = Course::where('id',$question->course_id)->first();
        $section = Section::where('id',$question->section_id)->first();

        $q_info['course'] = $course->name;
        $q_info['course_id'] = $course->id;
        $q_info['section'] = $section->name;
        $q_info['section_id'] = $section->id;
        $q_info['level'] = $question->level;
        $q_info['content'] = $question->content;

        $someArray = json_decode($question->options, true);

        for($i = 1 ;$i <= 4;$i++){
            $q_info['gozine'.$i] = $someArray[$i];
        }
        $q_info['gozine_correct'] = $question->answer;
        $q_info['solution'] = $question->solution;

        $courses = Course::all();
        foreach($courses as $course){
            $q_info['courses'][$course->id] = $course->name;
        }

        $sections = Section::all();
        foreach($sections as $section){
            $q_info['sections'][$section->id] = $section->name;
        }
//        dd($q_info);
        return json_encode($q_info);
    }

    public function clsAjax($id){
        $email = Session::get('Email');
        $cl = Classes::find($id);
        $course = Course::find($cl->course_id);
        $user = User::where('email',$email)->first();
        $sections = Section::where('course_id',$cl->course_id)->get();
        $scores = Score::where('user_id',$user->id)->where('course_id',$cl->course_id)->get();
        $exercises = Exercise::all();

        $info['course_grade'] = $course->name.' '.$course->grade;
        $info['teacher'] = $course->teacher_name;


        if(count($scores) > 0) {
            foreach ($scores as $score) {
                foreach ($exercises as $exercise) {
                    if ($score->exercise_id == $exercise->id && $exercise->writer != 0) {
                        $info['score'][$score->exercise_id]['name'] = $exercise->name;
                        $info['score'][$score->exercise_id]['st_point'] = $score->st_point;
                        $info['score'][$score->exercise_id]['t_point'] = $score->t_point;
                        $info['score'][$score->exercise_id]['percent'] = $score->percent;
                        $labels[] = $exercise->name;
                        $data[] =$score->percent;
                    }
                }
            }
        }else{
            $info['score'][0]['name']  = 'فعلا هیچی';
            $info['score'][0]['st_point'] = 0;
            $info['score'][0]['t_point'] = 0;
            $info['score'][0]['percent'] = 0;
            $labels[] = 'فعلا هیچی';
            $data[] = 0;
        }


        $info['labels'] = $labels;
        $info['data'] = $data;
//        dd($info);
        return json_encode($info);
    }

    public function courseAjax($id){
        $email = Session::get('Email');
        $course = Course::find($id);
        $user = User::where('email',$email)->first();
        $sections = Section::where('course_id',$id)->get();
        $scores = Score::where('user_id',$user->id)->where('course_id',$id)->get();
        $exercises = Exercise::all();

        $info['course_grade'] = $course->name.' '.$course->grade;
        $info['teacher'] = $course->teacher_name;


            if(count($scores) > 0) {
                foreach ($scores as $score) {
                    foreach ($exercises as $exercise) {
                        if ($score->exercise_id == $exercise->id && $exercise->writer == 0) {
                            $info['score'][$score->exercise_id]['name'] = $exercise->name;
                            $info['score'][$score->exercise_id]['st_point'] = $score->st_point;
                            $info['score'][$score->exercise_id]['t_point'] = $score->t_point;
                            $info['score'][$score->exercise_id]['percent'] = $score->percent;
                            $labels[] = $exercise->name;
                            $data[] =$score->percent;
                        }
                    }
                }
            }else{
                $info['score'][0]['name']  = 'فعلا هیچی';
                $info['score'][0]['st_point'] = 0;
                $info['score'][0]['t_point'] = 0;
                $info['score'][0]['percent'] = 0;
                $labels[] = 'فعلا هیچی';
                $data[] = 0;
            }


        $info['labels'] = $labels;
        $info['data'] = $data;
        //dd($info);
        return json_encode($info);
    }

    public function exerciseAjax($id){
        $exercise = Exercise::find($id);
        $exercise_cl = ClassExercise::where('name',$exercise->name)->where('code',$exercise->code)->first();
        $course = Course::where('id',$exercise->course_id)->first();
        $section = Section::where('id',$exercise->section_id)->first();

        if($exercise_cl) {
            $class = Classes::find($exercise_cl->class_id);
            $users = $class->users;
        }else{
            $users = [];
        }

        $exercise_info['name'] = $exercise->name;
        $exercise_info['code'] = $exercise->code;
        $exercise_info['course_name'] = $course->name;
        $exercise_info['section_name'] = $section->name;
        $exercise_info['start'] = $exercise->start_date;
        $exercise_info['end'] = $exercise->end_date;
        $exercise_info['easy'] = $exercise->easy_no;
        $exercise_info['medium'] = $exercise->medium_no;
        $exercise_info['hard'] = $exercise->hard_no;

        if(count($users) > 0) {
            foreach ($users as $user) {
                $exercise_info['user'][$user->id] = $user->name;
            }
        }
//        dd($exercise_info);
        return json_encode($exercise_info);
    }

    //solved exercise info
    public function exerciseInfoAjax($id){
        $exercise = Exercise::find($id);
        $section = Section::where('id',$exercise->section_id)->first();
        $info[$exercise->id]['section_name'] = $section->name;
        $good = 0;
        $normal = 0;
        $bad = 0;
        $udata = [];
        $labels = [];

        $classuser = ClassExercise::where('name',$exercise->name)->where('code',$exercise->code)->first();
        $cl = Classes::find($classuser->class_id);

        $stu = $cl->users;

        if(count($stu) > 0) {
            foreach ($stu as $s) {
                $scores[] = Score::where('exercise_id', $exercise->id)->where('user_id', $s->id)->get();
            }
        }else{
            $scores = [];
        }

        if(count($scores) > 0) {
            foreach($scores as $sc) {
                foreach ($sc as $score) {

                    if ($score->percent < 33.0) {
                        $bad++;
                    } elseif ($score->percent < 66.0) {
                        $normal++;
                    } elseif ($score->percent >= 66.0) {
                        $good++;
                    }
                }
            }
            $data[] = $good;
            $data[] = $normal;
            $data[] = $bad;
            $info[$exercise->id]['data'] = $data;
        }else{
            $data[] = 0;
            $data[] = 0;
            $data[] = 0;
            $info[$exercise->id]['data'] = $data;
        }

        $class_user = ClassExercise::where('name',$exercise->name)->get();

        foreach($class_user as $cl_us){
            $cl = Classes::find($cl_us->class_id);
            $student = $cl->users;

            foreach($student as $s){
                $info[$exercise->id]['exercise'][$s->id]['name'] = $s->name;
                $scores = Score::where('user_id',$s->id)->where('exercise_id',$id)->first();

                $labels[] = $s->name;
                if(count($scores) > 0) {
                        if ($scores->exercise_id == $id) {
                            $info[$exercise->id]['exercise'][$s->id]['score'][$score->exercise_id]['exercise_st_point'] = $scores->st_point;
                            $info[$exercise->id]['exercise'][$s->id]['score'][$score->exercise_id]['exercise_t_point'] = $scores->t_point;
                            $info[$exercise->id]['exercise'][$s->id]['score'][$score->exercise_id]['exercise_percent'] = $scores->percent;

                            $udata[] = $scores->percent;
                        }
                }else{
                    $info[$exercise->id]['exercise'][$s->id]['score'][0]['exercise_st_point'] = 0;
                    $info[$exercise->id]['exercise'][$s->id]['score'][0]['exercise_t_point'] = 0;
                    $info[$exercise->id]['exercise'][$s->id]['score'][0]['exercise_percent'] = 0;

                    $udata[] = 0;
                }
            }
            $info[$exercise->id]['labels'] = $labels;
            $info[$exercise->id]['udata'] = $udata;
        }
//        dd($info);
        return json_encode($info);
    }
}
