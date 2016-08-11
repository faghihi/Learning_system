<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;
use Requests;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //
    public function get(){
        if(Session::get('Login')=="True")
        {
            return redirect('/');
        }
        return view('login-register');
    }
    public function Login(){
        $username=Input::get('username');
        $password=Input::get('password');
        $sampuser=users::where('username', $username)->get();
        if(! $sampuser->isEmpty() ) {
            foreach ($sampuser as $thisuser) {
                $pass=$thisuser->password;
                $name=$thisuser->name;
            }
            if($pass==$password){
                Session::put('Login', 'True');
                Session::put('Name', "$name");
                Session::put('UserName',"$username");
                return redirect('/');
            }
            else {
                return view('login-register')->with('valid','none');
            }
        }
        return view('login-register')->with('valid','none');
    }

    public function Signup(){
        $input = Input::all();
        $name=Input::get('name');
        $username=Input::get('username');
        $user= new users();
        $user->name=$name;
        $user->username=$username;
        $user->email=Input::get('email');
        $user->password=Input::get('password');
        $user->phone=Input::get('phone');
        $user->save();
        Session::put('Login', 'True');
        Session::put('Name', "$name");
        Session::put('UserName',"$username");
        return redirect('/');
    }

    public function checkuser(){
        $input=Input::get('user');
        $input1=Input::get('mail');
        $userinfo=users::where('username',$input)->get();
        if(! $userinfo->isEmpty() ){
            echo 0;
        }
        else {
            $userinfo=users::where('email',$input1)->get();
            if(! $userinfo->isEmpty() ){
                echo 0;
            }
            else {
                echo 1;
            }
        }

    }
    public function Logout(){
        Session::flush();
        return redirect('/');
    }
}
