<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function registration_form()
    {
        return view('autentihication.registration');
    }

    public function registration_store(Request $request)
    {
        $request->validate([
            'name' => ['regex:/^[А-Яа-я\- ]{1,}$/u', 'required'],
            'login' => ['regex:/^[0-9A-Za-z\-]+$/', 'unique:users', 'required'],
            'phone' => ['regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/', 'required'],
            // 'phone' => ['regex:/^\+7 \d{3}-\d{3}-\d{2}-\d{2}$/', 'required']
            'email' => ['email', 'unique:users', 'required'],
            'password' => ['confirmed', 'min:6', 'required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'phone' => $request->phone,
            'email' => $request->email,
            // 'address' => null,
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

    public function login_form()
    {
        return view('autentihication.login');
    }

    public function login_store(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin) {  // првоерка при звходе админ илди нет, сморти файл keranl и adminMiddleware
                return redirect('/admin')->with('info', 'Вы зашли как администратор');
            } else {
                return redirect('/')->with('info', 'Вход выполнен!');
            }
        }



        return back()->withErrors(['Данные не соответствуют!']);
    }

}

