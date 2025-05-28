<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Home page.
     */
    public function index()
    {
        $tickets = Ticket::where('state_id', 2)
            ->latest()
            ->take(4)
            ->get();
        $totalAcceptedTickets = Ticket::where('state_id', 2)
            ->count();
        return view("home", [
            'tickets' => $tickets,
            'totalAcceptedTickets' => $totalAcceptedTickets,
        ]);
    }
}
