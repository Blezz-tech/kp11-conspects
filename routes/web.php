<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductContoller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('all.home');
})->name("home");

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('regform');
    Route::post('/register', [UserController::class, 'store'])->name('register');
    Route::get('/login', [UserController::class, 'loginform'])->name('loginform');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/orders/index', [OrderController::class, 'index'])->name('user.orders.index');
    Route::get('/user/orders/create', [OrderController::class, 'create'])->name('user.orders.create');
    Route::post('/user/orders/store', [OrderController::class, 'store'])->name('user.orders.store');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/products/index', [ProductContoller::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductContoller::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [ProductContoller::class, 'store'])->name('admin.products.store');
    Route::get('/admin/orders/all', [OrderController::class, 'all'])->name('admin.orders.all');
    Route::post('/admin/orders/changestatus', [OrderController::class, 'changestatus'])->name('admin.orders.changestatus');
});
