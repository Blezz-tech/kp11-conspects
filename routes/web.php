<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [AuthController::class, 'loginfrom'])->name('auth.loginform');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'registerfrom'])->name('auth.registerform');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

Route::middleware(['auth'])->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/user/account', [PageController::class, 'account'])->name('user.account');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.panel');
});
