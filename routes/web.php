<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
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

    Route::get('/login', [RegisterController::class, 'loginform'])->name('login');
    Route::post('/login', [RegisterController::class, 'login'])->name('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [RegisterController::class, 'logout'])->name('auth.logout');
    Route::get('cart/add/{id}', [CartController::class,'add'])->name('cart.add');

    Route::get('cart/show', [CartController::class, 'show'])->name('cart.show');

    Route::post('cart/change/{id}', [CartController::class, 'change'])->name('cart.change');
    Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    Route::post('orders/send', [OrderController::class, 'send'])->name('orders.send');
    Route::get('orders/list', [OrderController::class, 'list'])->name('orders.list');
    Route::get('orders/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

});

Route::middleware(['admin'])->group(function () {
    Route::view('/admin', 'admin.layout')->name('adminhome');
    Route::resource('/admin/categories', CategoryController::class);
    Route::resource('/admin/products', ProductController::class);
    Route::post('/admin/filter',[ ProductController::class, 'filter'])->name('admin.products.filter');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/{order}/confirm/', [OrderController::class, 'confirm'])->name('admin.orders.confirm');
    Route::post('/admin/{order}/cancel/', [OrderController::class, 'cancel'])->name('admin.orders.cancel');

});
