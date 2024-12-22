<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function createTicketPage()
    {
        return view('user.ticket.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTicket(Request $request)
    {
        $credentials = $request->validate([
            // TODO: Сделать валидацижю тикета
        ]);

        // TODO: Сделать сохранение тикета
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deleteTicketPage(Request $request, $ticketId)
    {

        $ticket = Ticket::where('id', $ticketId)->firstOrFail();

        if ($ticket->user->id != auth()->id()) {
            return back()
                ->withErrors([ 'ticket' => 'Заявка не принадлежит вам']);
        }

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя удалить']);
        }

        return view('user.ticket.delete', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deleteTicket(Request $request, $ticketId)
    {
        $ticket = Ticket::where('id', $ticketId)->firstOrFail();

        if ($ticket->user->id != auth()->id()) {
            return redirect()
                ->route('user.account')
                ->withErrors([ 'ticket' => 'Заявка не принадлежит вам']);
        }

        if ($ticket->state->id != 1) {
            return redirect()
                ->route('user.account')
                ->withErrors([ 'ticket' => 'Заявку нельзя удалить']);
        }

        $ticket->delete();

        return redirect()->route('user.account')->withInfo([
            'Заявка успешно удалена'
        ]);
    }
}
