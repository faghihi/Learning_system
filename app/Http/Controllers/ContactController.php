<?php

namespace App\Http\Controllers;

use App\contact;
use Illuminate\Http\Request;
use Requests;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    //
    public function get(){
        return view('contact');
    }

    public function post(){
        $input=Input::all();
        $contact=new contact();
        $contact::create($input);
        //echo $input['name'];
        return view('contact')->with('submit','OK');
    }
}
