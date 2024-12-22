<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCategoryController extends Controller
{
    // RESOURCE CONTROLLER

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Category::all();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($credentials);

        return redirect()
            ->route('admin.categories.index')
            ->with('info', 'Категория успешно добавлена.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()
            ->route('admin.categories.index')
            ->with('info', 'Категория успешно удалена');
    }

    // RESOURCE CONTROLLER


}
