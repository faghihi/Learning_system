<?php

namespace App\Http\Controllers;

use App\Course;
use App\School;
use Illuminate\Http\Request;
use Session;
use Requests;
use Illuminate\Support\Facades\Input;
use DB;
use App\User;

class ProfileController extends Controller
{
    //show profile
   public function get(){
       if(Session::get('Login')=="True") {
           $email = Session::get('Email');
           $sampuser = User::where('email', $email)->get();
           //check if user exist,get user info
           if (!$sampuser->isEmpty()) {
               foreach ($sampuser as $thisuser) {
                   $userinfo['phone'] = $thisuser->phone;
                   $userinfo['email'] = $thisuser->email;
                   $userinfo['phone'] = $thisuser->phone;
                   $userinfo['name'] = $thisuser->name;
                   $userinfo['type'] = $thisuser->type;
               }
           }
           $user = User::where('email', $email)->first();
           $schools = School::all();
           $courses = Course::all();
           $teachers = User::all();
           return view('profile')->with(['info'=>$userinfo,'courses'=>$courses,'user'=>$user,'schools'=>$schools,'teachers'=>$teachers]);
       }
       else{
           return redirect('/UserArea');
       }
   }

    //change user info
    public function change(){
        //set rules for validation
        $rules = array(
            'name' => 'required|max:64', // make sure the email is an actual email
            'phone' => 'required|max:11|min:11'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
            'max' => 'شماره ی تلفن نامعتبر است',
            'min' => 'شماره ی تلفن نامعتبر است'
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return \Redirect::to('Profile')->withErrors($validator); // send back all errors to the login form
        }
        $email=Session::get('Email');
        $request=Input::all();

        $user= User::where('email',$email)->first();
        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->save();

        return redirect()->back()->with('message', 'تغییرات با موفقیت ثبت شد');
    }

    //change password
    public function changepass(){
        //set rules for validation
        $rules = array(
            'oldpass' => 'required', // make sure the email is an actual email
            'password' => 'required|min:6'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید',
            'min' => 'رمز شما بسیار ضعیف است'
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return \Redirect::to('Profile')->withErrors($validator); // send back all errors to the login form
        }
        $email=Session::get('Email');
        $request=Input::all();

        $user = User::where('email',$email)->first();
        if($user->password == $request['oldpass']){
            $user->password = $request['password'];
        }
        $user->update();

        return redirect()->back()->with('message', 'رمز شما با موفقیت ثبت شد');
    }

}
