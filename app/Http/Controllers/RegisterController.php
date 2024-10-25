<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }
}
