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
        return view("auth.login");
    }

    /**
     * Register Page.
     */
    public function registerfrom()
    {
        return view("auth.register");
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
            if (auth()->user()->is_admin) {
                return redirect()
                    ->route('admin.tickets.index')
                    ->with('info', 'Вы зашли как администратор');
            }
            return redirect()
                ->route('user.home')
                ->with('info', 'Вход выполнен!');
        }
        return back()->withErrors([ 'login' => 'Неверные данные',]);
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
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
            'is_accept' => 'accepted',
        ]);

        User::create($credetials);

        return redirect()->route('user.tickets.index')->with('info', 'Регистрация выполнена!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        auth()->logout();

        return redirect()
            ->route('user.home')
            ->with('info', 'Выпонен выход!');
    }

}
