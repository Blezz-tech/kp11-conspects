<?php

namespace App\Http\Controllers;

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
        return view('pages.user.account');
    }
}
