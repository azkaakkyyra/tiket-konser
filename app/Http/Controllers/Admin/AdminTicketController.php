<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminTicketController extends Controller
{
    public function index(Request $request)
    {
        $query = Ticket::with('user');

        // filter
        if ($request->status && in_array($request->status, ['waiting', 'checked_in'])) {
            $query->where('status', $request->status);
        }

        // search kode tiket
        if ($request->search) {
            $query->where('ticket_code', 'like', '%'.$request->search.'%');
        }

        $tickets = $query->get();

        return view('admin.admin', compact('tickets'));
    }

    public function checkIn(Ticket $ticket)
    {
        if ($ticket->status === 'waiting') {
            $ticket->status = 'checked_in';
            $ticket->save();
        }

        return redirect()->route('admin.dashboard');
    }
}
