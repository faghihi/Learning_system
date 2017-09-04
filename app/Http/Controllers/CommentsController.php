<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function postComment(Request $request)
    {
    	$this->validate($request, [
            'comment'   => 'required'
        ]);

        $user = User::where('email',\Session::get('Email'))->first();

        $comment = Comment::create([
        	'ticket_id' => $request->input('ticket_id'),
        	'user_id'	=> $user->id,
        	'comment'	=> $request->input('comment'),
        ]);

        // send mail if the user commenting is not the ticket owner
//        if ($comment->ticket->user->id !== Auth::user()->id) {
//        	$mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
//        }
        
        return redirect()->back()->with("status", "نظر شما ارسال شد.");
    }
}
