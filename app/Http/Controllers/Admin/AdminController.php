<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        $state_id = $request->query('state_id');

        $tickets = null;
        if ($state_id != null) {
            $tickets = Ticket::where('state_id', $state_id)->get();
        } else {
            $tickets = Ticket::all();
        }
        $tickets = $tickets->sortByDesc("created_at");

        return view('admin.home', [
            'states' => State::all(),
            'tickets' => $tickets,
        ]);
    }
}
