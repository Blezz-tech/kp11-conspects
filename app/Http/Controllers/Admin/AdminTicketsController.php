<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTicketsController extends Controller
{

    public function accept(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.home')
                ->withErrors(['Заявка не существует']);
        }

        $ticket->state_id = 2;
        $ticket->save();

        return redirect()
            ->route('admin.home')
            ->with('info', 'Заявка успешно решёна');
    }

    public function rejectTicket(Request $request, $ticketId)
    {
        $ticket = Ticket::find($ticketId);

        if ($ticket->state->id != 1) {
            return back()
                ->withErrors([ 'ticket' => 'Заявку нельзя изменить']);
        }

        if (!$ticket) {
            return redirect()
                ->route('admin.home')
                ->withErrors(['Заявка не существует']);
        }

        $ticket->state_id = 3;
        $ticket->save();

        return redirect()
            ->route('admin.home')
            ->with('info', 'Заявка успешно отклонёна');
    }
}
