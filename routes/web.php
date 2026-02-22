<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\BookController;

Route::get('/', function () {
    return view('welcome');
});

// メッセージ投稿関連
Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::delete('messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');
Route::delete('messages', [MessageController::class, 'destroyAll'])->name('messages.destroyAll');

// 管理画面：書籍管理
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::get('books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('books', [BookController::class, 'store'])->name('books.store');
    Route::put('books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});
