<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('about', ['products' =>  Product::orderBy('created_at', 'desc')->limit(5)->get()]);
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function catalog()
    {
        $products = Product::where('qty', '>', '0')->get();
        return view('catalog', ['products' => $products, 'categories' => Category::all()]);
    }

    public function catalogFilter(Request $request)
    {
        if ($request->filter == 0) {
            $products = Product::where('qty', '>', '0')
                                ->orderBy($request->sort)
                                ->get();
        } else {
            $products = Category::find($request->filter)
                ->products()
                ->orderBy($request->sort)
                ->get();
        }
        return view('catalog', ['products' => $products, 'categories' => Category::all()]);
    }
}
