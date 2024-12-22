<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Rules\UserHasTicket;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function createTicketPage()
    {
        return view('users.tickets.create');
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
        $ticket = Ticket::where('id', $ticketId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('users.tickets.delete', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function deleteTicket(Request $request, $ticketId)
    {
        $ticket = Ticket::where('id', $ticketId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $ticket->delete();

        redirect()->route('user.account')->withInfo([
            'Заявка успешно удалена'
        ]);
    }
}
