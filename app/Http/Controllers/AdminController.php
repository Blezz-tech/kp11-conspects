<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function acceptTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.tickets.index')
                ->withErrors(['Тикета не существует']);
        }

        return view('admin.tickets.accept', [
            'ticket' => $ticket
        ]);
    }

    public function acceptTicket(Request $request, $ticketId)
    {
        // TODO
    }

    public function rejectTicketPage(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.tickets.index')
                ->withErrors(['Тикета не существует']);
        }

        return view('admin.tickets.reject', [
            'ticket' => $ticket
        ]);
    }

    public function rejectTicket(Request $request, $ticketId)
    {
        $credentials = $request->validate([
            'comment' => 'required|string|min:5',
        ]);

        $ticket = Ticket::find($ticketId);

        $ticket->state_id = 3;
        $ticket->comment = $credentials['comment'];
        $ticket->save();

        return redirect()
            ->route('admin.tickets.index')
            ->with(['Тикет успешно отклонён']);
    }
}
