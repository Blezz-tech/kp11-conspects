<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

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

Route::get('/', function () {
    return view('layouts.layout');
})->name('main');

Route::middleware(['guest'])->group(function () {
    Route::get('/registration', [RegistrationController::class, 'registration_form'])->name('registration_form');
    Route::post('/registration', [RegistrationController::class, 'registration_store'])->name('registration_store');

    Route::get('/login', [RegistrationController::class, 'login_form'])->name('login_form');
    Route::post('/login', [RegistrationController::class, 'login_store'])->name('login_store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::post('/order', [OrderController::class, 'order_store'])->name('order_store');
    Route::get('/logout', [RegistrationController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

});
