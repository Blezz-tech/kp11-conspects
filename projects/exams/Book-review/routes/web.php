<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

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
    return redirect('books');
})->name('home'); ///

// Route::get('/regform', [UserController::class, 'create'])->name('user.create');
// Route::post('/register', [UserController::class, 'store'])->name('user.store');

// Route::get('/login', [UserController::class, 'login'])->name('user.login');
// Route::post('/login', [UserController::class, 'login_store'])->name('user.login_store');

// Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


// Route::get('/comment/{book}', [CommentController::class, 'create'])->name('comment');
// Route::post('/comment/{book}', [CommentController::class, 'store'])->name('create-comments');


Route::resource('books', BookController::class)->only('index', 'show');

Route::middleware(['guest'])->group(function () { // созадём группы в зависимости от прав пользователя
    Route::get('/regform', [UserController::class, 'create'])->name('user.create');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');

    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::post('/login', [UserController::class, 'login_store'])->name('user.login_store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/comment/{book}', [CommentController::class, 'create'])->name('comment');
    Route::post('/comment/{book}', [CommentController::class, 'store'])->name('create-comments');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::post('/admin', [AdminController::class, 'changedata'])->name('changedata');

    Route::get('/form-book', [AdminController::class, 'show_form'])->name('create-book');
    Route::post('/form-book', [AdminController::class, 'store'])->name('create-book-end');
});
