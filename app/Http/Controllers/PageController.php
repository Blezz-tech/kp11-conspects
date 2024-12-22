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
        return view("home", [
            'tickets' => $tickets,
        ]);
    }
}
