<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Grade;
use App\Score;
use App\Section;
use App\User;
use App\School;
use App\Classes;
use App\Course;
use App\Question;
use App\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Session;
use App\tempanswer;

class CourseController extends Controller
{
    //create class
    public function index() {
        //set rules for validation
        $rules = array(
            'classname' => 'required|max:64',
            'course' => 'required'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
//            'unique' => 'این کد قبلا استفاده شده است',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator,'create_class');
        }
        $classname = Input::get('classname');
        $school_id = Input::get('school');
        $co = Input::get('course');


        $teacher = User::where('email',Session::get('Email'))->first();
        $class = Classes::where('name',$classname)->where('school_id',$school_id)->where('course_id',$co)->first();

        if($class){
            return redirect()->back()->with('error','قبلا از این اسم برای کلاس استفاده شده است');
        }
        else{
            $class = new classes();
            $class->name = $classname;
            $class->school_id = $school_id;
            $class->Rstring = strtoupper(str_random(8));
            $class->teacher_name = $teacher->id;
            $class->course_id = $co;
            $class->save();

            $ticket = new Ticket([
                'title'     => $classname,
                'user_id'   => $teacher->id,
                'ticket_id' => strtoupper(str_random(10)),
                'category_id'  => 5,
                'priority'  => 'کم',
                'message'   => 'کد عضویت در کلاس :'.$class->Rstring,
                'status'    => "Open",
            ]);

            $ticket->save();
        }

        return redirect()->back()->with('message' ,'رمز کلاس ایجاد شده :' .$class->Rstring);
    }

    //add course to database
    public function addcourse(Request $request) {
        //set rules for validation
        $rules = array(
            'coursename' => 'required|max:64',
            'grade' => 'required',
            'section' => 'required',
            'image' => 'required'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
//            'unique' => 'این کد قبلا استفاده شده است',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator,'create_course');
        }

        $coursename = Input::get('coursename');
        $grade = Input::get('grade');
        $email = Session::get('Email');
        $teacher = User::where('email','=',$email)->first();
        $upload = $request->file('image');

        if($upload) {
            $rand = rand(11, 99);
            $upload->move(public_path() . '/uploads', $rand . $upload->getClientOriginalName());
            $mim = $upload->getClientMimeType();
            $type_name = explode('/',$mim);
            $type_name = end($type_name);
            if ($type_name == 'jpg' || $type_name == 'jpeg' || $type_name == 'png') {
                $image_path = $rand . $upload->getClientOriginalName();
            }else{
                return redirect()->back()->with('error','فایل وارد شده مورد تایید نیست.');
            }
        }
        //check course exist
        $check = Course::where('name',$coursename)
            ->where('grade_id',$grade)
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
                $course->grade_id = $grade;
                $course->teacher_name = $teacher->name;
                $course->image = $image_path;
                $course->save();

                $course_id = Course::where('name', '=', $coursename)->where('grade_id',$grade)->first();
                $section = new Section();
                $section->course_id = $course_id->id;
                $section->name = Input::get('section');
                $section->save();
            }
        }
        return redirect('/TDashboard')->with('message','درس با موفقیت ثبت شد.');
    }


    public function get($id){
        $check=0;
        if(Session::get('Login')=="True")
        {
            $email= Session::get('Email');
            $user = User::where('email','=',$email)->first();

            $course = Course::find($id);
            $users = $course->users;

            if(count($users) > 0) {
                foreach ($users as $u) {
                    if ($u->id == $user->id)
                        $check = 1;
                }
            }
        }else{
            $user = [];
        }
        $courses = Course::all();
        $course = Course::where('id','=',$id)->first();
        $count_solved = 0;
        $exercises = Exercise::where('course_id',$id)->get();
        foreach($exercises as $exercise){
            if($exercise->status == 2){
                $count_solved ++;
            }
        }
        $sections = Section::where('course_id',$id)->get();
        $grades = Grade::all();

        return view('amar10')->with(['Check'=>$check,'courses'=>$courses,'user'=>$user,'course'=>$course,'exercises'=>$exercises,
        'count_solved'=>$count_solved,'sections'=>$sections,'grades'=>$grades]);
    }

    //add course to users_courses table
    public function add($id){
        if(Session::get('Login')!="True")
        {
            return redirect('/UserArea');
        }

        $email = Session::get('Email');

        $user = User::where('email',$email)->first();
        $user->courses()->attach($id);

        return redirect('/Dashboard');
    }

    //save user answer to temp_answers
    public function save($id){
        //$exercise = Exercise::find($id);
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $answers = tempanswer::where('user_id',$user->id)->where('exercise_id',$id)->get();

            if(count($answers) > 0)
            {
                foreach($answers as $answer) {
                    $count = Input::get('number');
                    for ($i = 0; $i < $count; $i++) {
                        $answerid = Input::get('n' . $i);
                        $temp = tempanswer::where('question_id', $answerid)->where('user_id', $user->id)->first();

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
                    $temp->question_id = (int)$answerid;
                    $temp->user_id = $user->id;

//                    $question = Question::where('id', $answerid)->get();

//                    foreach($question->exercises as $q){
//                        if($q->id == $id){
//                            $temp->exercise_id = $q->id;
//                        }
//                    }
                    $temp->exercise_id = $id;

                    if (Input::has('q' . $i)) {
                        $answercheck = Input::get('q' . $i);
                    } else {
                        $answercheck = 0;
                    }
                    $temp->answer = $answercheck;

                    $temp->save();
                }

            }
        $status = 1;
        foreach($user->exercises as $exe){
            if($exe->id == $id){
                $user->exercises()->updateExistingPivot($id,compact('status'));
            }
        }

        return redirect('/Dashboard');
    }

    public function see($id) {
        $courses = Course::all();
        $exercise = Exercise::where('id','=',$id)->first();
        $email = Session::get('Email');
        $user = User::where('email','=',$email)->first();
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();

        $questions = $exercise->questions;

        $course = Course::where('id','=',$exercise->course_id)->first();
        $section = Section::where('id','=',$exercise->section_id)->first();

        foreach($questions as $question){
            $answers[$question->id] = json_decode($question->options);
        }

        return view('Samar10' ,compact('user','courses','questions','exercise','course','section','answers','teachers','schools'));
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

            $thisquest = Question::where('id',$question_array[$i]['id'])->get();
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

                $question_array[$i]['solution'] = $quest->solution;
            }
        }

        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $score = Score::where('user_id',$user->id)->where('exercise_id',$id)->first();

        if($score){
            $score->c_count=$correct;
            $score->st_point=$status_point;
            $score->percent=($status_point / $total_point) * 100;
        }else {
            $score = new Score();
            $exercise = Exercise::where('id', $id)->first();
            $score->course_id = $exercise->course_id;
            $score->user_id = $user->id;
            $score->exercise_id = $id;
            $score->section_id = $exercise->section_id;
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

        //use to set status
        $status = 2;
        $user->exercises()->updateExistingPivot($id,compact('status'));

        $temp = tempanswer::where('user_id',$user->id)->where('exercise_id',$id)->get();
        foreach($temp as $t){
            $t->delete();
        }

        return view ('CorrectionAmar10',compact('score'))->with('questions',$question_array);
    }

    public function warning(){
        return view('errors\503');
    }

    public function delete($id){
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $user->courses()->detach($id);

        return redirect()->back();
    }
    //delete class
    public function deleteclass($id){
        $class = Classes::find($id);
        //delete class's user
        $class->users()->detach();
        //delete class
        $class->delete($id);

        return redirect()->back();
    }
    //delete student request
    public function studeleteclass($id){
//        $ticket = Ticket::where('ticket_id',$id)->first();
//        if($ticket){
//            $ticket->delete();
//        }

        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $class = Classes::find($id);
        //delete class's user
        $user->classes()->detach($class->id);

        return redirect('/Dashboard')->with('message','حذف شد');
    }

    public function checkrepetetive(Request $request)
    {
        $code=$request->get('code');
        $class=Classes::where('Rstring',$code)->first();
        if($class){
            return 0;
        }
        else{
            return 1;
        }
    }
    //check num of easy question
    public function checkeasynum(Request $request)
    {
        $course = $request->get( 'course' );
        $section = $request->get( 'section' );
        $easy = $request->get('num');

        $q_easy = Question::where('course_id',$course)->where('section_id',$section)->where('level',0)->get();

        if($easy > count($q_easy)){
            return 0;
        }else{
            return 1;
        }
    }
    //check num of medium question
    public function checkmednum(Request $request)
    {
        $course = $request->get( 'course' );
        $section = $request->get( 'section' );
        $med = $request->get('num');

        $q_med = Question::where('course_id',$course)->where('section_id',$section)->where('level',1)->get();

        if($med > count($q_med)){
            return 0;
        }else{
            return 1;
        }
    }
    //check num of hard Question
    public function checkhardnum(Request $request)
    {
        $course = $request->get( 'course' );
        $section = $request->get( 'section' );
        $hard = $request->get('num');

        $q_hard = Question::where('course_id',$course)->where('section_id',$section)->where('level',2)->get();

        if($hard > count($q_hard)){
            return 0;
        }else{
            return 1;
        }
    }
    //user see problem in question
    public function problem(){

        $name = Input::get('exercise_name');
        $user = User::where('email',Session::get('Email'))->first();
        $message = Input::get('problem');
        $question = Input::get('question');
        $q = Question::find($question);

        //user problem's ticket
        $ticket = new Ticket([
            'title'     => $name,
            'user_id'   => $user->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => 1,
            'priority'  => 'کم',
            'message'   => $message.'::'.$q->content,
            'status'    => "Open",
        ]);
        $ticket->save();

        $teacher = User::where('name',$q->writer)->where('type','teacher')->first();
        //teacher problem's ticket
        $ticket = new Ticket([
            'title'     => $name,
            'user_id'   => $teacher->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => 1,
            'priority'  => 'کم',
            'message'   => $message.'::'.$q->content,
            'status'    => "Open",
        ]);
        $ticket->save();

        return redirect()->back();
    }
}
