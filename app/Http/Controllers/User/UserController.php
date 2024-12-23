<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\State;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $state_id = $request->query('state_id');
        $tickets = $tickets = User::find(id: auth()->id())->tickets;
        if ($state_id != null) {
            $tickets = Ticket::where('state_id', $state_id)->get();
        } else {
            $tickets = Ticket::all();
        }
        $tickets = $tickets->sortByDesc("created_at");

        $states = State::all();

        return view('user.home', [
            'tickets' => $tickets,
            'states' => $states,
        ]);
    }

    public function create()
    {
        return view('user.tickets.create', ['categories' => Category::all()]);
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
            ->route('user.tickets.index')
            ->with('info', 'Заявка успешно добавлена.');
    }
}
