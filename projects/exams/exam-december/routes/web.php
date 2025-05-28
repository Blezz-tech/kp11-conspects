<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\User\UserTicketController;

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

    Route::prefix('user')->group(function () {
        Route::resource('tickets', UserTicketController::class, ['as' => 'user']);

        Route::get('/tickets/delete/{id}', [UserTicketController::class, 'deleteTicketPage'])->name('user.ticket.destroyPage');
    });
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::resources([
        'tickets' => AdminTicketController::class,
        'categories' => AdminCategoryController::class,
    ], ['as' => 'admin']);

    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    Route::get('/tickets/accept/{id}', [AdminController::class, 'acceptTicketPage'])->name('admin.tickets.acceptPage');
    Route::post('/tickets/accept/{id}', [AdminController::class, 'acceptTicket'])->name('admin.tickets.accept');

    Route::get('/tickets/reject/{id}', [AdminController::class, 'rejectTicketPage'])->name('admin.tickets.rejectPage');
    Route::post('/tickets/reject/{id}', [AdminController::class, 'rejectTicket'])->name('admin.tickets.reject');
});


