<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use App\School;
use App\Course;
use Requests;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    //
    public function get(){
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        $courses = Course::all();
        $user = User::where('email',\Session::get('Email'))->first();
        return view('contact',compact('teachers','schools','courses','user'));
    }

    public function post(){

        $name=Input::get('name');
        $email = Input::get('email');
        $subject = Input::get('subject');
        $content = Input::get('content');
        $phone = Input::get('phone');

        //set rules for validation
        $rules = array(
            'name' => 'required|max:64', // make sure the name , max length 64 character and all character is alpha
            'email' => 'required|email', // make sure the email is actual email
            'phone'=>'required|regex:/(09)[0-9]{9}/',
            'subject'=>'required',
            'content' => 'required'
        );

        $messages = [
            'required' => 'برای تسریع در فرایند پاسخگویی تمامی فیلد های زیر را پر کنید.',
            'regex' => 'مطابق با الگو شماره تلفن خود را وارد کنید'
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator); // send back all errors to the login form
        }else{
            $dummy = new Contact();
            $dummy->name = $name;
            $dummy->email = $email;
            $dummy->phone = $phone;
            $dummy->subject = $subject;
            $dummy->content = $content;

            $dummy->save();

            return redirect()->back()->with('message','نظر شما انتقال داده شده است ، و حتما پیگیری های لازم انجام و به اطالاع شما خواهد رسید.');
        }
    }
}
