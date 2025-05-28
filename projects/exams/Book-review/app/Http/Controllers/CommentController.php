<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Book $book)
    {
        // $book = Book::find($book_id);
        // return view('comment-from', ['book' => $book]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Book $book)
    {

        return view('comment-from', ['book' => $book]);
    }






    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        // dd($book);
        $validated = $request->validate([
            'review' => 'required',
            'rating' => 'required',

        ]);

        $comment = Comment::create([
            'review' => $request->review,
            'user_id' => auth()->user()->id, // тот кто создаёт сейчас комментарий
            'rating' => $request->rating,
            'book_id' => $book->id,
            'status' => 0
        ]);
        // $rew->save();
        return redirect()->route('books.show', ['book' => $book->id])->with(['info' => 'Вы успешно прокомментировали']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
