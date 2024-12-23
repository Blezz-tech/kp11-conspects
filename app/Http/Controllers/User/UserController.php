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
            'category' => Category::all(),
        ]);
    }

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
