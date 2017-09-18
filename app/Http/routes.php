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
Route::get('/DeleteCourse/{id}', 'DashboardController@deletecourse');
Route::post('/Check/{id}','Amar10Controller@check');
Route::post('/Save/{id}','Amar10Controller@save');
Route::get('/Q/Continue','Amar10Controller@continuethis');
Route::get('/Dashboard/{id}', 'DashboardController@correct');

Route::get('/Profile','ProfileController@get');
Route::get('/Profile/Check','ProfileController@check');
Route::post('/Profile','ProfileController@change');
Route::post('/ChangePass','ProfileController@changepass');
Route::get('/UserArea','LoginController@get');
Route::post('/SignUp','LoginController@Signup');
Route::post('/Login','LoginController@Login');
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

Route::post('/checkcode' , 'Amar10Controller@checkrepetetive');

Route::get('/checkeasynum' , 'Amar10Controller@checkeasynum');
Route::get('/checkmednum' , 'Amar10Controller@checkmednum');
Route::get('/checkhardnum' , 'Amar10Controller@checkhardnum');

Route::get('/problem' , 'Amar10Controller@problem');

Route::post('/CreateEx' , 'ExerciseController@create');

Route::post('/CreateStuEx' , 'ExerciseController@createStuEx');

Route::post('/CreateQuestion' , 'ExerciseController@createquestion');

Route::get('/EditQuestion/{id}' , 'ExerciseController@editquestion');

Route::get('/EditEx/{id}' , 'ExerciseController@editexercise');

Route::post('/giveEx', 'ExerciseController@give');

Route::post('/giveCl', 'ExerciseController@giveClass');

Route::get('/exercise/{id}' , 'ExerciseController@show');

Route::get('/delete/{id}' , 'ExerciseController@delete');

Route::get('/del/{id}' , 'ExerciseController@del');

Route::get('/DeleteClass/{id}' , 'Amar10Controller@deleteclass');

Route::get('/StuDeleteClass/{id}' , 'Amar10Controller@studeleteclass');

Route::get('/DeleteTicket/{id}' , 'TicketsController@deleteticket');

Route::get('/Video' , 'VideoController@index');

Route::get('/guide' , 'HomeController@guide');

Route::get('school/ajax/{id}','HomeController@schoolAjax');
Route::get('cl/ajax/{id}','HomeController@clAjax');
Route::get('section/ajax/{id}','HomeController@sectionAjax');
Route::get('student/ajax/{id}','HomeController@studentAjax');
Route::get('course/ajax/{id}','HomeController@courseAjax');
Route::get('question/ajax/{id}','HomeController@questionAjax');
Route::get('Q/ajax/{id}','HomeController@quAjax');
Route::get('createClass/ajax/{id}' , 'HomeController@classAjax');
Route::get('exercise/ajax/{id}','HomeController@exerciseAjax');
Route::get('exercise_info/ajax/{id}', 'HomeController@exerciseInfoAjax');


Route::get('/calendar', function () {
    $data = [
        'page_title' => 'Home',
    ];
    return view('event/index', $data);
});
Route::resource('events', 'EventController');
Route::get('/api', function () {
    $events = DB::table('events')->select('id', 'name', 'title', 'start_time as start', 'end_time as end')->get();
    foreach($events as $event)
    {
        $event->title = $event->title . ' - ' .$event->name;
        $event->url = url('events/' . $event->id);
    }
    return $events;
});


//Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');
Route::get('tickets/{ticket_id}', 'TicketsController@show');
Route::get('my_tickets', 'TicketsController@userTickets');

Route::get('tickets', 'TicketsController@index');
Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
Route::post('accept_ticket/{ticket_id}', 'TicketsController@accept');

Route::post('comment', 'CommentsController@postComment');
