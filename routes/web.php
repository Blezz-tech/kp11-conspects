<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Admin\AdminCategoryController;

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

    Route::get('/user/tickets/create', [UserController::class, 'createTicketPage'])->name('user.ticket.createPage');
    Route::post('/user/tickets/create', [UserController::class, 'createTicket'])->name('user.ticket.create');

    Route::get('/user/tickets/delete/{id}', [UserController::class, 'deleteTicketPage'])->name('user.ticket.deletePage');
    Route::post('/user/tickets/delete/{id}', [UserController::class, 'deleteTicket'])->name('user.ticket.delete');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::resources([
        'tickets' => AdminTicketController::class,
        'categories' => AdminCategoryController::class,
    ], ['as' => 'admin']);

    Route::get('/tickets/accept/{id}', [AdminController::class, 'acceptTicketPage'])->name('admin.tickets.acceptPage');
    Route::post('/tickets/accept/{id}', [AdminController::class, 'acceptTicket'])->name('admin.tickets.accept');

    Route::get('/tickets/reject/{id}', [AdminController::class, 'rejectTicketPage'])->name('admin.tickets.rejectPage');
    Route::post('/tickets/reject/{id}', [AdminController::class, 'rejectTicket'])->name('admin.tickets.reject');
});


