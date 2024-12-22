<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserTicketController extends Controller
{
    // RESOURCE CONTROLLER

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = User::find(id: auth()->id())->tickets;

        return view('user.tickets.index', [
            'tickets' => $tickets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.tickets.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'photo_before' => 'required|image|mimes:jpg,jpeg,png,bmp|max:10240', // 10MB
        ]);

        $img_path = $request->file('photo_before')->store('storage');

        $userId = auth()->id();
        // Создание новой заявки
        Ticket::create(attributes: [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'photo_before' => $img_path,
            'state_id' => 1,
            'user_id' => $userId
        ]);

        return redirect()
            ->route('user.tickets.index')
            ->with('info', 'Заявка успешно добавлена.');
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
                ->route('user.tickets.index')
                ->withErrors([ 'ticket' => 'Заявка не принадлежит вам']);
        }

        if ($ticket->state->id != 1) {
            return redirect()
                ->route('user.tickets.index')
                ->withErrors([ 'ticket' => 'Заявку нельзя удалить']);
        }

        $ticket->delete();

        return redirect()->route('user.tickets.index')->withInfo([
            'Заявка успешно удалена'
        ]);
    }

    // RESOURCE CONTROLLER

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
