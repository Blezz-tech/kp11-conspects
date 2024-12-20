<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin Panel.
     */
    public function index()
    {
        return view('pages.admin-panel');
    }
}
