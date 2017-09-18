<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Course;
use App\School;
use App\User;
use App\Ticket;
use App\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class TicketsController extends Controller
{

//    public function index()
//    {
//    	$tickets = Ticket::paginate(10);
//        $categories = Category::all();
//
//        return view('tickets.index', compact('tickets', 'categories'));
//    }

//    public function userTickets()
//    {
//
//        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
//        $categories = Category::all();
//
//        return view('tickets.user_tickets', compact('tickets', 'categories'));
//    }

//    public function create()
//    {
//    	$categories = Category::all();
//
//        return view('tickets.create', compact('categories'));
//    }

    //store a ticket in database
    public function store()
    {
        //set rules for validation
        $rules = array(
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        );

        $messages = [
            'required' => 'لطفا همه فیلد ها را پر کنید'
        ];

        $validator = \Validator::make(Input::all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $user = User::where('email',Session::get('Email'))->first();
        $request = Input::all();

        $ticket = new Ticket([
            'title'     => $request['title'],
            'user_id'   => $user->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request['category'],
            'priority'  => $request['priority'],
            'message'   => $request['message'],
            'status'    => "Open",
        ]);

        $ticket->save();

        //$mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "پیام شما ثبت شد.");
    }

    /**
     * Display a specified ticket.
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $comments = $ticket->comments;
        $category = $ticket->category;

        $user = User::where('email',Session::get('Email'))->first();
        $teachers = User::where('type','teacher')->get();
        $schools = School::all();
        $courses = Course::all();

        return view('tickets.show', compact('ticket', 'category', 'comments','user','teachers','schools','courses'));
    }

    /**
     * Close the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = 'Closed';
        $ticket->save();

        $ticketOwner = $ticket->user;

        //$mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    public function accept($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = 'Open';
        $ticket->save();

        $arr = json_decode($ticket_id);

        $class = Classes::find($arr->class);
        $user = User::find($arr->user);

        $tick = Ticket::find($arr->ticket);
        $tick->status = 'Open';
        $tick->save();

        $user->classes()->updateExistingPivot($class->id,['status'=>2]);

        return redirect()->back()->with("status", "The ticket has been open.");
    }

    public function deleteticket($id){
        $ticket = Ticket::find($id);
        $ticket->delete();

        return redirect()->back()->with("status", "The ticket has been delete.");
    }
}
