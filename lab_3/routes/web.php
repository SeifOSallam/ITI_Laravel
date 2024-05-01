<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home'])->name('index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('posts/restore', [PostController::class, 'restore'])->name('posts.restore');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::patch('posts/{id}/update', [PostController::class, 'update'])->name('posts.update');

Route::get('posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');

Route::delete('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');



// Comments
Route::get('comments', [CommentController::class, 'index'])->name('comments.index');

Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store');