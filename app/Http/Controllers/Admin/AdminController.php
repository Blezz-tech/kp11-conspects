<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

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

        $credentials = $request->validate([
            'photo_after' => 'required|image|mimes:jpg,jpeg,png,bmp|max:10240',
        ]);

        $img_path = $request->file('photo_after')->store('storage');

        $ticket->state_id = 2;
        $ticket->photo_after = $img_path;
        $ticket->save();

        return redirect()
            ->route('admin.tickets.index')
            ->with('info', 'Тикет успешно решён');
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
            ->with('info', 'Тикет успешно отклонён');
    }
}
