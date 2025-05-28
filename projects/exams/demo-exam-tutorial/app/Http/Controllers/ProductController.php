<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('title')->get();
        return view('admin.products.index', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }



    public function filter(Request $request)
    {
        if ($request->filter == 0) {
            $products = Product::orderBy($request->sort)
                ->get();
        } else {
            $products = Category::find($request->filter)
                ->products()
                ->orderBy($request->sort)
                ->get();
        }

        return view('admin.products.index', ['products' => $products, 'categories' => Category::all()]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $img_path = null; // Инициализация переменной

        if ($request->hasFile('img')) {
            $img_path = $request->file('img')->store('img');
        }
        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'model' => $request->model,
            'country' => $request->country,
            'year' => $request->year,
            'price' => $request->price,
            'qty' => $request->qty,
            'img_path' => $img_path,
        ]);
        return redirect('admin/products')->with('info', 'Товар добавлен  ;З');
    }




    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     return view('product', ['product' => Product::find($id)]);
    // }

    public function show($id)
    {

        return view('admin.products.show', ['product' => Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product, 'categories' => Category::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->model = $request->model;
        $product->price = $request->price;
        $product->country = $request->country;
        $product->qty = $request->qty;
        if ($request->hasFile('img')) {
            $product->img_path = $request->file('img')->store('img');
        }
        $product->save();
        return redirect()->route('products.index', ['product' => $product])->with('info', 'Данные изменены');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('products.index')->with('info','Товар удалён');
    }
}
