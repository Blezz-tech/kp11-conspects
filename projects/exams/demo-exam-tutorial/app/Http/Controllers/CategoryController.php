<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.categories.index", ['categories' => Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Category::create(['title' => $request->title]);
        return redirect('admin/categories')->with('info', 'Категория добавлена');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Реализация метода show, если необходимо
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $category->title = $request->title;
        $category->save();
        return redirect('admin/categories')->with('info', 'Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        foreach ($category->products as $product) {
            $product->delete();
        }

        $category->delete();

        return redirect('admin/categories')->with('info', 'Категория удалена');
    }
}
