<?php

namespace App\Http\Controllers;

use App\courses;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Input;
use Session;
use App\tempanswer;

class Amar10Controller extends Controller
{
    //
    public function get($name){
        $check=0;
        if(Session::get('Login')=="True")
        {
            $courses=DB::select('select * from courses Where username ="'.Session::get('UserName').'" AND course = "'.$name.'"');
            foreach ($courses as $course)
            {
                if($course != null)
                    $check=1;
            }
        }
//        echo $check;
       return view($name)->with('Check',$check);
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

    public function add($name){
        if(Session::get('Login')!="True")
        {
            return redirect('/UserArea');
        }
        $courses=DB::select('select * from courses Where username ="'.Session::get('UserName').'" AND course = "'.$name.'"');
        foreach ($courses as $course)
        {
            if($course != null)
                return redirect('/Dashboard');
        }
        $Course=new courses();
        $Course->username=Session::get('UserName');
        $Course->course=$name;
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
        echo "check progress";
        print_r(Input::all());
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
            $question_array[$i]['content']=Input::get('content');
            $thisquest = DB::select('select * from questions Where id="' . $question_array[$i]['id'] . '"');
            foreach ($thisquest as $quest) {
                $answers=explode(';',$quest->answers);
                //print_r($answers);
//                echo $question_array[$i]['answer'];
                for($j=0;$j<=3;$j++){
                    $question_array[$i]['answers'][$j]=$answers[$j];
                }
                if($question_array[$i]['answerthis']==0)
                {
                    $question_array[$i]['correct']='N';
                    $question_array[$i]['answerthis']="شما به این سوال پاسخ نداده اید";
                }
                elseif($question_array[$i]['answerthis']==$question_array[$i]['answer']){
                    $question_array[$i]['correct']='C';
                    $question_array[$i]['answerthis']=$question_array[$i]['answers'][$question_array[$i]['answerthis']-1];
                }
                else {
                    $question_array[$i]['correct']='N';
                    $question_array[$i]['answerthis']=$question_array[$i]['answers'][$question_array[$i]['answerthis']-1];
                }
                $question_array[$i]['answer']=$question_array[$i]['answers'][$question_array[$i]['answer']-1];
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
