<?php

namespace App\Http\Controllers;

use App\Course;
use App\Grade;
use App\Mail\ForgetPass;
use App\School;
use App\User;
use Session;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //
    public function get(){
        if(Session::get('Login')=="True")
        {
            return redirect('/');
        }
        $schools = School::all();
        $courses = Course::all();
        $grades=Grade::all();
        return view('login-register')->with(['schools'=>$schools,'courses'=>$courses,'grades'=>$grades]);
    }

    //login
    public function Login(){
        //set rules for validation
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید'
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return \Redirect::to('UserArea')->withErrors($validator); // send back all errors to the login form
        }
        else {
            $email = Input::get('email');
            $password = Input::get('password');

            //which user login
            $sampuser = User::where('email', $email)->first();
            if (isset($sampuser)) {
                $pass = $sampuser->password;
                $name = $sampuser->name;

                //check password is correct
                if ($pass == $password) {
                    Session::put('Login', 'True');
                    Session::put('Name', $name);
                    Session::put('Email', $email);

                    return redirect('/');
                } else {
                    return \Redirect::to('UserArea')->withErrors(['رمز شما نادرست است']);
                }
            }
            return \Redirect::to('UserArea')->withErrors(['چنین فردی در سیستم وجود ندارد']);
        }
    }

    //user register
    public function Signup(){
        //when user fill register form , form's value assign to variable
        $name=Input::get('name');
        $email = Input::get('email');
        $password = Input::get('password');
        $repass = Input::get('repassword');
        $phone = Input::get('phone');
        $grade = Input::get('grade');

        //set rules for validation
        $rules = array(
            'name' => 'required|max:64', // make sure the name , max length 64 character and all character is alpha
            'email' => 'required|email|unique:users', // make sure the email is actual email
            'password' => 'required|min:6', // password has at least 6 character
            'phone'=>'required|regex:/(09)[0-9]{9}/',
            'grade' => 'required'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
            'min' => 'رمز شما باید حداقل 6 کاراکترداشته باشد',
            'unique' => 'قبلا یک نفر از این ایمیل استفاده کرده است',
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return \Redirect::to('UserArea')->withInput()->withErrors($validator,'register'); // send back all errors to the login form
        }
        else {

            $teacher = Input::get('teacher');
            //check user, is a teacher or student?
            if ($teacher) {
                $type = 'teacher';
                $school = Input::get('school');
            } else {
                $type = 'student';
                $school = Input::get('school');
            }

            //add to user table
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->phone = $phone;
            $user->type = $type;
            $user->grade_id = $grade;
            $user->school_id = $school;
            $user->save();

            //if user teach another school too
            if($user->type == 'teacher'){
                if($user->school_id > 0) {
                    $s = School::find($user->school_id);
                    $s->users()->attach($user->id);
                }
            }

            Session::put('Login', 'True');
            Session::put('Name', $name);
            Session::put('Email',$email);

            return redirect('/');
        }
    }

    //when user forget password
    public function forget(){
        $email=Input::get('email');
        $name=Input::get('name');

        $msg = new ForgetPass($email);

        \Mail::to($email)->send($msg);

        Session::put('Email',$email);

        return redirect('https://mailtrap.io/inboxes/235913/messages');
    }

    //reset password
    public function reset(){
        $pass = Input::get('password');
        $email = Session::get('Email');

        $update=User::where('email',$email)->first();
        $update->password = $pass;
        $update->update();

        return redirect('/');
    }

    public function Logout(){
        Session::flush();
        return redirect('/');
    }
}
