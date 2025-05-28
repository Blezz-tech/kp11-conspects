<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTicketController extends Controller
{
    // RESOURCE CONTROLLER

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $state_id = $request->query('state_id');
        $tickets = null;
        if ($state_id != null) {
            $tickets = Ticket::where('state_id', $state_id)->get();
        } else {
            $tickets = Ticket::all();
        }
        $tickets = $tickets->sortByDesc("created_at");

        $states = State::all();

        return view('admin.tickets.index', [
            'tickets' => $tickets,
            'states' => $states,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    // RESOURCE CONTROLLER

}
