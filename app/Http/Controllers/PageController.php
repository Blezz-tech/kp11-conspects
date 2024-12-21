<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Home page.
     */
    public function index()
    {
        return view("home");
    }

    /**
     * User account page.
     */
    public function account()
    {
        $tickets = User::find(auth()->id())->tickets;

        return view('pages.user.account', [
            'tickets' => $tickets,
        ]);
    }
}
