<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('as' => 'home_route', 'uses' => 'HomeController@get'));
Route::get('/Dashboard','DashboardController@get');
Route::get('/TDashboard','DashboardController@index');
Route::get('/Dashboard/SetGoal','DashboardController@SetGoal');
Route::get('/Contact','ContactController@get');
Route::get('/Courses/{id}','Amar10Controller@get');
Route::get('/Q/Courses/{name}','Amar10Controller@quest');
Route::get('/AddCourse/{id}','Amar10Controller@add');
Route::post('/DeleteCourse/{id}' , 'Amar10Controller@delete');
Route::post('/Check/{id}','Amar10Controller@check');
Route::post('/Save/{id}','Amar10Controller@save');
//Route::get('/Q/WarningSave','Amar10Controller@warning');
//Route::get('/Q/Delete','Amar10Controller@delete');
Route::get('/Q/Continue','Amar10Controller@continuethis');
Route::get('/Dashboard/{id}', 'DashboardController@correct');
//Route::get('/tashih',function (){
//   return view('CorrectionAmar10');
//});
Route::get('/Profile','ProfileController@get');
Route::get('/Profile/Check','ProfileController@check');
Route::post('/Profile','ProfileController@change');
Route::post('/ChangePass','ProfileController@changepass');
Route::get('/UserArea','LoginController@get');
Route::post('/SignUp','LoginController@Signup');
Route::post('/Login','LoginController@Login');
Route::get('/SignUp/Check','LoginController@checkuser');
Route::get('/Logout','LoginController@Logout');
Route::post('/Contact','ContactController@post');

Route::get('/Forgetpass' , function(){
    return view ('forget');
});
Route::post('/Forgetpass' , 'LoginController@forget');

Route::get('/Reset' , function(){
    return view('reset');
});
Route::post('/Reset' , 'LoginController@reset');

Route::post('/CreateClass' , 'Amar10Controller@index');

Route::post('/CreateCourse' , 'Amar10Controller@addcourse');

Route::post('/CreateEx' , 'ExerciseController@create');

Route::post('/CreateQuestion' , 'ExerciseController@createquestion');

Route::post('/giveEx', 'ExerciseController@give');

Route::get('/exercise/{id}' , 'ExerciseController@show');

Route::get('/delete/{id}' , 'ExerciseController@delete');

Route::post('/DeleteClass/{id}' , 'Amar10Controller@deleteclass');

Route::get('/Video' , function(){
   return view('video');
});

Route::get('/guide' , 'HomeController@guide');

Route::get('school/ajax/{id}','HomeController@schoolAjax');

Route::get('section/ajax/{id}','HomeController@sectionAjax');

Route::get('student/ajax/{id}','HomeController@studentAjax');

Route::get('st/ajax/{username}','HomeController@stAjax');