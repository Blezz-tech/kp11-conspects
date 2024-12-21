<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Panel.
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('pages.admin.panel', [
            'tickets' => $tickets]
        );
    }
}
