<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PagesController::class, 'about'])->name('about');
Route::get('/contacts', [PagesController::class, 'contacts'])->name('contacts');
Route::get('/catalog', [PagesController::class, 'catalog'])->name('catalog');
Route::post('/catalog/filter', [PagesController::class, 'catalogFilter'])->name('catalog.filter');

Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
