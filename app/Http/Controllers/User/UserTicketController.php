<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            // TODO: Сделать валидацижю тикета
        ]);

        // TODO: Сделать сохранение тикета
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

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

        return view('user.tickets.destroy', [
            'ticket' => $ticket,
        ]);
    }

}
