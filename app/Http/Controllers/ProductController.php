<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use app\Models\Category;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('product', ['product' => Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
