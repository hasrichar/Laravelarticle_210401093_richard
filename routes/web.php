<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;

use App\Http\Controllers\ArticleController;


Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Menampilkan formulir untuk menambah artikel baru
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

// Menyimpan artikel baru
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

// Menampilkan formulir untuk mengedit artikel
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');

// Mengupdate artikel
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Menghapus artikel
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');



Route::get('/', function () {
    return view('welcome');
});
