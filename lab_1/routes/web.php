<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home'])->name('index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::delete('posts/{id}', [PostController::class, 'delete'])->name('posts.delete');

