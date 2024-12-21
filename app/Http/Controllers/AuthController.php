<?php

namespace App\Http\Controllers;

use App\Models\User;
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

            return redirect()->route('home');
        }

        return back()->withErrors([
            'login' => 'Неверные данные',
        ])->onlyInput('login');

    }

    /**
     * Create New User.
     */
    public function register(Request $request)
    {
        $credetials = $request->validate([
            'login' => 'required|unique:users,login|regex:/^[a-zA-Z]+$/u',
            'name' => 'required|regex:/^[а-яА-ЯёЁ\- ]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'is_accept' => 'accepted',
        ]);

        User::create($credetials);

        return redirect()->route('home');
    }

    /**
     * Logout
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }

}
