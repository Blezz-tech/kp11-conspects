<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login Page.
     */
    public function loginfrom()
    {
        return view("pages.auth.login");
    }

    /**
     * Register Page.
     */
    public function registerfrom()
    {
        return view("pages.auth.register");
    }

    /**
     *
     */
    public function login(Request $request)
    {
        // TODO: Сделать проверку на вхож
    }

    /**
     * Create New User.
     */
    public function regsiter(Request $request)
    {
        // TODO: Сделать прокерку на регстирацию и саму регистрацию
    }

    /**
     * Logout
     */
    public function logout()
    {
        // TODO: Сделать выход
    }

}
