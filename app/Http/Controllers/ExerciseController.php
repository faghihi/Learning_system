<?php

namespace App\Http\Controllers;

use App\ClassExercise;
use App\Course;
use App\Exercise;
use App\Question;
use App\Score;
use App\Section;
use App\tempanswer;
use App\User;
use App\School;
use App\Classes;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class ExerciseController extends Controller
{
    //create an exercise
    public function create(){
        //set rules for validation
        $rules = array(
            'nameEx' => 'required|max:64',
            'code' => 'digits:4',
            'easy' => 'required',
            'medium' => 'required',
            'hard'=>'required',
            'course' => 'required',
            'section' => 'required',
            'class' => 'required',
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
            'digits' => 'برای رمز فقط از عدد استفاده کنید،حداقل 4 عدد',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator,'CreateEx');
        }else {
            $email = Session::get('Email');
            $user = User::where('email', $email)->first();

            $check = Input::get('all');
            //give info from user
            $name = Input::get('nameEx');
            if($check){
                $code = 0;
            }else{
                $code = Input::get('code');
            }
            $easy = Input::get('easy');
            $medium = Input::get('medium');
            $hard = Input::get('hard');
            $class_id = Input::get('class');
            $course_id = Input::get('course');
            $section_id = Input::get('section');
            $start = Input::get('startdate');
            $end = Input::get('enddate');

            $q_easy = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',0)->get();
            $q_med = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',1)->get();
            $q_hard = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',2)->get();

            if($easy > count($q_easy) || $medium > count($q_med) || $hard > count($q_hard)){
                return redirect()->back()->with('error','تعداد سوالاتی که انتخاب کردید در سیستم موجود نمی باشد');
            }

            //if user set a class, exercise save to classes_exercises table too
            if ($class_id) {

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
                $exercise->writer = $user->id;
                $exercise->save();

                $cl_exercise = new ClassExercise();
                $cl_exercise->name = $name;
                $cl_exercise->code = $code;
                $cl_exercise->class_id = $class_id;
                $cl_exercise->course_id = $course_id;
                $cl_exercise->easy_no = $easy;
                $cl_exercise->medium_no = $medium;
                $cl_exercise->hard_no = $hard;
                $cl_exercise->section_id = $section_id;
                $cl_exercise->start_date = $start;
                $cl_exercise->end_date = $end;
                $cl_exercise->save();

                if($code > 0) {
                    $cl = Classes::find($class_id);
                    //user exercise ticket
                    foreach ($cl->users as $u) {
                        $ticket = new Ticket([
                            'title' => $name,
                            'user_id' => $u->id,
                            'ticket_id' => strtoupper(str_random(10)),
                            'category_id' => 3,
                            'priority' => 'کم',
                            'message' => 'نام تمرین : ' . $name . ' کد : ' . $code,
                            'status' => "Open",
                        ]);

                        $ticket->save();
                    }
                }else {
                    $cl = Classes::find($class_id);
                    //user exercise ticket
                    foreach ($cl->users as $u) {
                        $u->exercises()->attach($exercise->id, ['status' => 0]);
                    }
                }

                $easy = $exercise->easy_no;
                $medium = $exercise->medium_no;
                $hard = $exercise->hard_no;
                $total = $easy + $medium + $hard;

                $q_easy = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                    ->where('level', 0)->get();

                $q_medium = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                    ->where('level', 1)->get();

                $q_hard = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                    ->where('level', 2)->get();

                $i = 0;
                $j = 0;
                $k = 0;
                if ($easy > 0) {
                    for ($i = 0; $i < $easy; $i++) {
                        $quest[$i] = $q_easy[$i];
                    }
                }
                if ($medium > 0) {
                    for ($j = 0; $j < $medium; $j++) {
                        $quest[$i + $j] = $q_medium[$j];
                    }
                }
                if ($hard > 0) {
                    for ($k = 0; $k < $hard; $k++) {
                        $quest[$k + $i + $j] = $q_hard[$k];
                    }
                }

                for ($j = 0; $j < $total; $j++) {
                    $questions[$j] = $quest[$j];
                }

                $ex = Exercise::where('name',$name)->where('code',$code)->where('writer',$user->id)->first();
                //set exercise_id for questions
                foreach ($questions as $question) {
                    $question->exercises()->attach($ex->id);
                }

            }
        }
        return redirect('/TDashboard')->with('message','تمرین ثبت شد.');
    }

    //student create exercise
    public function createStuEx(){
        //set rules for validation
        $rules = array(
            'nameEx' => 'required|max:64',
            'easy' => 'required',
            'medium' => 'required',
            'hard'=>'required',
            'course' => 'required',
            'section' => 'required',
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
            //'max' => 'رمز شما باید حداقل 6 کاراکترداشته باشد',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator,'StuCreateQ');
        }else {
            //give info from user
            $name = Input::get('nameEx');
            $easy = Input::get('easy');
            $medium = Input::get('medium');
            $hard = Input::get('hard');
            $course_id = Input::get('course');
            $section_id = Input::get('section');

            $q_easy = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',0)->get();
            $q_med = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',1)->get();
            $q_hard = Question::where('course_id',$course_id)->where('section_id',$section_id)->where('level',2)->get();

            if($easy > count($q_easy) || $medium > count($q_med) || $hard > count($q_hard)){
                return redirect()->back()->with('error','تعداد سوالاتی که انتخاب کردید در سیستم موجود نمی باشد');
            }

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

            $q_easy = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                ->where('level', 0)->get();

            $q_medium = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                ->where('level', 1)->get();

            $q_hard = Question::inRandomOrder()->where('course_id', $exercise->course_id)->where('section_id', $exercise->section_id)
                ->where('level', 2)->get();
            $i = 0;
            $j = 0;
            $k = 0;
            if ($easy > 0) {
                for ($i = 0; $i < $easy; $i++) {
                    $quest[$i] = $q_easy[$i];
                }
            }

            if ($medium > 0) {
                for ($j = 0; $j < $medium; $j++) {
                    $quest[$i + $j] = $q_medium[$j];
                }
            }
            if ($hard > 0) {
                for ($k = 0; $k < $hard; $k++) {
                    $quest[$k + $i + $j] = $q_hard[$k];
                }
            }

            for ($j = 0; $j < $total; $j++) {
                $questions[$j] = $quest[$j];
            }

            //set exercise_id for questions
            try {
                foreach ($questions as $question) {
                    $question->exercises()->attach($exercise->id);
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            $email = Session::get('Email');
            $user = User::where('email', $email)->first();

            $user->exercises()->attach($exercise->id, ['status' => 0]);
        }
        return redirect('/Dashboard')->with('message','ایول به خودم');

    }
    public function createquestion(Request $request){

        //set rules for validation
        $rules = array(
            'answer' => 'required',
            'gozine4' => 'required',
            'gozine3' => 'required',
            'gozine2' => 'required',
            'gozine1' => 'required',
            'question'=>'required',
            'course' => 'required',
            'section' => 'required',
            'difficulty' => 'required',
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator,'CreateQ');
        }
        else {
            $id = Input::get('course');
            $course = Course::where('id', $id)->first();

            $section_id = Input::get('section');

            $exercise = Exercise::where('course_id', $course->id)->where('section_id', $section_id)->first();

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
            $user = User::where('email', '=', $email)->first();
            $upload = Input::file('Q_image');

            if ($upload) {
                $rand = rand(11, 99);
                $upload->move(public_path() . '/uploads', $rand . $upload->getClientOriginalName());
                $mim = $upload->getClientMimeType();
                $type_name = explode('/', $mim);
                $type_name = end($type_name);
                if ($type_name == 'jpg' || $type_name == 'jpeg' || $type_name == 'png') {
                    $image_path = $rand . $upload->getClientOriginalName();
                } else {
                    return redirect()->back()->with('error', 'فایل وارد شده مورد تایید نیست.');
                }
            } else {
                $image_path = null;
            }

            $question = new Question();
            $question->section_id = $section_id;
            $question->course_id = $course->id;
            if ($exercise) {
                $question->exercise_id = $exercise->id;
            } else {
                $question->exercise_id = 0;
            }
            $question->level = $level;
            $question->content = $content;
            $question->options = $options;
            $question->answer = $answer;
            $question->solution = $solution;
            $question->writer = $user->name;
            $question->image = $image_path;
//        dd($question);
            $question->save();
        }
        return redirect('/TDashboard')->with('message','سوال جدید ثبت شد.');
    }

    public function editexercise($id,Request $request){
        $exercise = Exercise::find($id);
//        $i = Input::get('course');
//        $course = Course::where('id',$i)->first();
//        $section_id = Input::get('section');
//
        $start = $request->input('start');
        $end = $request->input('end');
//        $users = $request->input('tag_id');
//        dd($users);
//        $easy = Input::get('ex_easy');
//        $medium = Input::get('ex_medium');
//        $hard = Input::get('ex_hard');

        $exercise->start_date = $start;
        $exercise->end_date = $end;

        $exercise->save();

        return redirect('/TDashboard')->with('message','با موفقیت ویرایش شد.');
    }

    public function editquestion($id){
        $i = Input::get('course');
        $course = Course::where('id',$i)->first();

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

        $question = Question::find($id);
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

        return redirect('/TDashboard')->with('message','با موفقیت ویرایش شد.');
    }

    //get class
    public function giveClass(){
        //set rules for validation
        $rules = array(
            'className' => 'required|max:64',
            'classPass' => 'required'
        );
        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید'
        ];
        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $name = Input::get('className');
        $code = Input::get('classPass');
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();

        $class = Classes::where('Rstring','=',$code)->where('name','=',$name)->first();
        if(count($class) > 0) {
            //add to user classes
            $user->classes()->attach($class->id,['status'=>1]);

            //user class req ticket
            $ticket = new Ticket([
                'title'     => $class->name,
                'user_id'   => $user->id,
                'ticket_id' => strtoupper(str_random(10)),
                'category_id'  => 4,
                'priority'  => 'کم',
                'message'   => 'تمایل به عضویت در کلاس',
                'status'    => "Pending",
            ]);
            $ticket->save();

            $tick = array('class' => $class->id, 'user' => $user->id, 'ticket' => $ticket->id);
            //teacher class req ticket
            $ticket = new Ticket([
                'title'     => $user->name,
                'user_id'   => $class->teacher_name,
                'ticket_id' => json_encode($tick),
                'category_id'  => 4,
                'priority'  => 'کم',
                'message'   => 'تمایل به عضویت در کلاس',
                'status'    => "Pending",
            ]);
            $ticket->save();
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
        $courses = Course::all();
        $exercise = Exercise::where('id','=',$id)->first();
        $email = Session::get('Email');
        $user = User::where('email','=',$email)->first();

//        $ex = $user->exercises;
//        //dd($ex);
//        foreach($ex as $e){
//            if($e->id == $exercise->id){
//
//            }else{
//                return redirect()->back();
//            }
//        }

        $questions = $exercise->questions;

        $course = Course::where('id','=',$exercise->course_id)->first();
        $section = Section::where('id','=',$exercise->section_id)->first();

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

        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        return view('Qamar10' ,compact('user','courses','questions','exercise','course','section','answers','saves','teachers','schools'));
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

    //teacher delete exercise
    public function del($id){
        $ex = Exercise::find($id);
        $email = Session::get('Email');
        $user = User::where('email',$email)->first();
        $class_ex = ClassExercise::where('name',$ex->name)->where('code',$ex->code)->first();

        if($class_ex){
            $class = Classes::find($class_ex->class_id);
            $users = $class->users;
            foreach($users as $user){
                $score = Score::where('exercise_id',$id)->where('user_id',$user->id)->first();
                if($score){
                    $score->delete();
                }

                $user->exercises()->detach($id);
            }

            $class_ex->delete();

        }else{
            $users = $ex->users;
            foreach($users as $user){
                $score = Score::where('exercise_id',$id)->where('user_id',$user->id)->first();
                if($score){
                    $score->delete();
                }

                $user->exercises()->detach($id);
            }
        }

        $tempanswers = tempanswer::where('exercise_id',$id)->get();
        if(count($tempanswers) > 0) {
            foreach ($tempanswers as $temp) {
                $temp->delete();
            }
        }


        $ex->delete($id);

        return redirect('/TDashboard')->with('message','تمرین مورد نظر حذف شد.');
    }
}
