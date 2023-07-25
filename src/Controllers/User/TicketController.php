<?php

namespace Hamiddj\SmartTicket\Controllers\User;

use App\Http\Controllers\Controller;
use Gate;
use Hamiddj\SmartTicket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id',auth()->user()->id)->get();
        return view('smartTicket::user.tickets.index',compact('tickets'));
    }

    public function create()
    {
        return view('smartTicket::user.tickets.create');
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'importance' => $request->importance,
        ]);

        $ticket->messages()->create([
            'text' => $request->message,
        ]);
        return redirect()->to('user/tickets');
    }

    public function show($id)
    {
        $ticket = Ticket::with('messages')->find($id);
        if($ticket->user_id != auth()->user()->id)
          abort(403);
        return view('smartTicket::user.tickets.show',compact('ticket'));
    }

    public function update($id,Request $request)
    {
        $ticket = Ticket::with('messages')->find($id);
        if($ticket->user_id != auth()->user()->id)
          abort(403);
        
        $ticket->messages()->create([
            'text' => $request->message
        ]);
        $ticket->status = 'NOT_ANSWERED';
        $ticket->save();
        return redirect()->to('user/tickets');
    }
}