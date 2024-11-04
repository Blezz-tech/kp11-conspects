<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'avatar' =>  'nullable|image'
        ]);

        // dd($request);

        if ($request->hasFile('avatar')) {
            $avatar_path = $request->file('avatar')->store('images');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatar_path ?? NULL,
            'password' => Hash::make($request->password) // bcrypt
        ]);

        Auth::login($user);
        return redirect()->route('books.index')->with(['info' =>'Вы зарегистрировались в системе']);
    }

     public function login(){
        return view('users.login');
    }

    public function login_store(Request $request){
        $valid = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin')->with(['info' => 'Вы вошли в систему как администратор!']);
            }
            return redirect()->route('books.index')->with(['info' => 'Вы успешно вошли в систему']);
        }
        return back()->withErrors([
            'name' => 'Логин или пароль введены некорректно'
        ])->onlyInput('name');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('books.index')->with(['info' => 'Вы успешно вышли из системы']);
    }

}
