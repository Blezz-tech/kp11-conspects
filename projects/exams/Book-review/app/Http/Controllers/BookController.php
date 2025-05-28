<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $search = $request->search??'';
        switch ($request->option) {
            case NULL:
            case 'latest':
                $books =  Book::where('title', 'like', "%$search%")
                ->withCount('comments')
                ->withAvg('comments', 'rating')
                ->orderBy('created_at', 'desc')
                ->get();
            break;

            case 'popular_1':
                $books =  Book::where('title', 'like', "%$search%")
                ->where('created_at', '>', now()->subMonths(1))
                ->withCount('comments')
                ->withAvg('comments', 'rating')
                ->orderBy('comments_count', 'desc')
                ->get();
            break;

            case 'popular_6':
                $books =  Book::where('title', 'like', "%$search%")
                ->where('created_at', '>', now()->subMonths(6))
                ->withCount('comments')
                ->withAvg('comments', 'rating')
                ->orderBy('comments_count', 'desc')
                ->get();
            break;

            case 'high_rating_1':
                $books =  Book::where('title', 'like', "%$search%")
                ->where('created_at', '>', now()->subMonths(1))
                // ->withCount(['comments' => function (Builder $query){
                //     $query->where('status', 1);
                // }])
                // ->withAvg(['comments' => function (Builder $query){
                //     $query->where('status', 1);
                // }])
                ->withCount('comments')
                ->withAvg('comments', 'rating')
                ->orderBy('comments_avg_rating', 'desc')
                ->get();
            break;

            case 'high_rating_6':
                $books =  Book::where('title', 'like', "%$search%")
                ->where('created_at', '>', now()->subMonths(6))
                ->withCount('comments')
                ->withAvg('comments', 'rating')
                ->orderBy('comments_avg_rating', 'desc')
                ->get();

            break;
        }
        return view('main', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $comments = $book->comments()
                    ->where('status', '=', 1)
                    ->orderBy('rating', 'desc')
                    // ->withCount('comments')
                    // ->withAvg('comments', 'rating')
                    ->get();
        $avg_rating = $comments->avg('rating') ?? 0;
        $count = $comments->count();
        return view('bookshow', ['book' =>$book, 'comments'=>$comments, 'avg_rating' =>$avg_rating, 'count'=>$count]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
