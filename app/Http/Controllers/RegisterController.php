<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['regex:/^[А-Яа-я\- ]{1,}$/u', 'required'],
            'surname' => ['regex:/^[А-Яа-я\- ]{1,}$/u', 'required'],
            'patronymic' => ['regex:/^[А-Яа-я\- ]{0,}$/u', 'nullable'],
            'login' => ['regex:/^[0-9A-Za-z\-]+$/', 'unique:users', 'required'],
            'email' => ['email', 'unique:users', 'required'],
            'password' => ['confirmed', 'min:6', 'required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'patronymic' => $request->patronymic,
            'login' => $request->login,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('info', 'Вы успешно зарегистрировались!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('info', 'Выход выполнен!');
    }

    public function loginform()
    {
        return view('auth.loginform');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin) {
                return redirect('/admin')->with('info', 'Вы зашли как администратор');
            } else {
                return redirect('/')->with('info', 'Вход выполнен!');
            }
        }

        return back()->withErrors(['Данные не соответствуют!']);
    }
}
