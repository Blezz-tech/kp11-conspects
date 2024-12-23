<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function home()
    {
        $tickets = Ticket::all();

        return view('admin.home', [
            'states' => State::all(),
            'tickets' => $tickets,
        ]);
    }
}
