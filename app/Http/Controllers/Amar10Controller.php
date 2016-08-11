<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class Amar10Controller extends Controller
{
    //
    public function get(){
        return view('amar10');
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
}
