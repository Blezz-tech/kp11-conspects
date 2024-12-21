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
            'login' => 'required|unique:users,login', # TODO: Сделать валидацю (только латиница), озможно как-то можно будет использовать slug
            'name' => 'required', # TODO: Сделать валидацию (только кириллические буквы, дефис и пробелы) |regex://i
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
            'is_accept' => 'required',
        ]);

        $credetials['is_accept'] = true;

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
