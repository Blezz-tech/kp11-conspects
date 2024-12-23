<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\State;
use App\Models\Ticket;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $state_id = $request->query('state_id');

        $tickets = auth()->user()->tickets;
        if ($state_id != null) {
            $tickets = $tickets->where('state_id', $state_id);
        }
        $tickets = $tickets->sortByDesc("created_at");

        return view('user.home', [
            'tickets' => $tickets,
            'states' => State::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'comment' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'date_get' => 'required|date',
            'time_get' => 'required|',
        ]);

        Ticket::create(attributes: [
            'comment' => $request->comment,
            'category_id' => $request->category_id,
            'date_get' => date($request->date_get.' '.$request->time_get),
            'is_nalik' => $request->is_nalik =! null ? 1 : 0,
            'state_id' => 1,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('user.home')
            ->with('info', 'Заявка успешно добавлена.');
    }

    public function destroy(string $id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();

        if ($ticket->user->id != auth()->id()) {
            return redirect()
                ->route('user.home')
                ->withErrors([ 'ticket' => 'Заявка не принадлежит вам']);
        }

        if ($ticket->state->id != 1) {
            return redirect()
                ->route('user.home')
                ->withErrors([ 'ticket' => 'Заявку нельзя удалить']);
        }

        $ticket->delete();

        return redirect()
            ->route('user.home')
            ->with('info', 'Заявка успешно удалена');
    }
}
