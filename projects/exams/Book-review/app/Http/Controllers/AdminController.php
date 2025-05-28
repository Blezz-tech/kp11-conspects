<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){

        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('admin', ['comments' => $comments]);
    }

    public function changedata(Request $request){
        $valid = $request->validate([  // делаем валидацию данных
            'status' => ['required'],
        ]);

        $comment = Comment::find($request->id);
        $comment->status = $request->status;  // изменяем статус заявки
        $comment->save();
        return back()->with(['info' => 'Вы успешно изменили статус']);
    }

    public function show_form(){

        return view('create-book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'avatar' => 'required',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('images');
            $book->avatar = $path;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Книга добавлена!');
    }
}
