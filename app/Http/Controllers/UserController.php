<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'login' => ['required', 'unique:users,login'],
            'password' => ['required', 'min:4'],
            'name' => ['required', 'regex:/[А-Яа-яёЁ ]{1,}/'],
            'phone' => ['required', 'regex:/\+7\([0-9]{3}\)-[0-9]{3}-[0-9]{2}-[0-9]{2}/'],
            'email' => ['required', 'unique:users,email'],
        ]);
        $user = User::create([
            'login' => $request->login,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('home')->with(['info' => 'Успешная регистрация']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function regform()
    {
        return view("guest.regform");
    }
}
