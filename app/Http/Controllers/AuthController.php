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
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'login' => 'Неверные данные',
        ])->onlyInput('login');

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
        auth()->logout();
    }

}
