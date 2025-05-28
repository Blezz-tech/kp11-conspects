<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * User account page.
     */
    public function home()
    {
        $tickets = User::find(auth()->id())->tickets;

        return view('user.home');
    }
}
