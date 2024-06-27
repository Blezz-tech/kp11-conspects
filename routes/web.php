<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    // Route::get('/mytickets', [TicketController::class, 'mytickets'])->name('mytickets');
    // Route::get('/createticket', [TicketController::class, 'ShowTicketForm'])->name('createticket');
    // Route::post('/createticket', [TicketController::class, 'store'])->name('storeticket');
    // Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function () {
    // Route::get('/admin', [AdminController::class, 'showPanel'])->name('showpanel');
    // Route::post('/changestatus', [TicketController::class, 'changestatus'])->name('changestatus');
});
