<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () { // потом заменить на палочку, когда представление будет готово
    return view('about', ['products' =>  Product::orderBy('created_at', 'desc')->limit(5)->get()]);
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/catalog', function () {
    $products = Product::where('qty', '>', '0')->get();
    return view('catalog', ['products' =>$products, 'categories' => Category::all()]);
})->name('catalog');

Route::post('/catalog/filter', function (Request $request) {
    if ($request->filter == 0) {
        $products = Product::where('qty', '>', '0')
                            ->orderBy($request->sort)
                            ->get();
    }

    else {
        $products = Category::find($request->filter)
            ->products()
            ->orderBy($request->sort)
            ->get();
    }

    return view('catalog', ['products' => $products, 'categories' => Category::all()]);
})->name('catalog.filter');

Route::get('product/{id}', function ($id) {
    return view('product', ['product' => Product::find($id)]);
})->name('contacts');
