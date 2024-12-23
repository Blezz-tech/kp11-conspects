<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTicketsController;

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

Route::get('/', [PageController::class,'index'])->name('home');

Route::get('/login', [AuthController::class, 'loginfrom'])->name('loginform');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'registerfrom'])->name('registerform');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/user/home', [UserController::class, 'home'])->name('user.home');

    Route::post('/tickets/create', [UserController::class, 'store'])->name('user.tickets.store');
    Route::delete('/tickets/{id}/delete', [UserController::class, 'destroy'])->name('user.tickets.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');

    Route::post('/admin/tickets/accept/{id}', [AdminTicketsController::class, 'accept'])->name('admin.tickets.accept');
    Route::post('/admin/tickets/reject/{id}', [AdminTicketsController::class, 'reject'])->name('admin.tickets.reject');
});
