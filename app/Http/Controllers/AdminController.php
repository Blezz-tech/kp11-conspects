<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Panel.
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('pages.admin.panel', [
            'tickets' => $tickets]
        );
    }

    public function acceptTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if (!$ticket) {
            return redirect()
                ->route('admin.panel')
                ->with(['Тикета не существует']);
        }

        return view('admin.ticket.accept');
    }

    public function acceptTicket(Request $request, $ticketId)
    {

    }

    public function rejectTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if (!$ticket) {
            return redirect()
                ->route('admin.panel')
                ->with(['Тикета не существует']);
        }

        return view('admin.ticket.reject');
    }

    public function rejectTicket(Request $request, $ticketId)
    {

    }
}
