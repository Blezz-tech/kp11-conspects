<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'login' => 'required',
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
            'login' => 'required|unique:users,login|regex:/^[a-zA-Z]+$/u',
            'name' => 'required|regex:/^[а-яА-ЯёЁ\- ]+$/u',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'password_confirmation' => 'required|same:password',
        ]);
        User::create([
            'login' => $request->login,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        $request->session()->regenerate();

        return redirect()->route('home')->with('info', 'Регистрация выполнена!');
    }

    /**
     * Logout
     */
    public function logout()
    {
        auth()->logout();

        return redirect()
            ->route('home')
            ->with('info', 'Выпонен выход!');
    }

}
