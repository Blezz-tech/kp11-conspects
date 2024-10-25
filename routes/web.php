<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('auth.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.store');

    Route::get('/login', [RegisterController::class, 'loginform'])->name('auth.loginform');
    Route::post('/login', [RegisterController::class, 'login'])->name('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [RegisterController::class, 'logout'])->name('auth.logout');
});


