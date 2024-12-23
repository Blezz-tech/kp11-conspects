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
        return view("user.login");
    }

    /**
     * Register Page.
     */
    public function registerfrom()
    {
        return view("user.register");
    }

    /**
     *
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin) {
                return redirect()
                    ->route('admin.home')
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
            'name' => 'required|regex:/^[а-яА-ЯёЁ\- ]+$/u',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
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
