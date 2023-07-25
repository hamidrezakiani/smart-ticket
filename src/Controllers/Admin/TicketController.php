<?php

namespace Hamiddj\SmartTicket\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Hamiddj\SmartTicket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('smartTicket::admin.tickets.index',compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::with('messages')->find($id);
        return view('smartTicket::admin.tickets.show',compact('ticket'));
    }

    public function update($id,Request $request)
    {
        $ticket = Ticket::with('messages')->find($id);
        $ticket->messages()->create([
            'text' => $request->message,
            'sender' => 'ADMIN'
        ]);
        $ticket->status = 'ANSWERED';
        $ticket->save();
        return redirect()->to('admin/tickets');
    }
}