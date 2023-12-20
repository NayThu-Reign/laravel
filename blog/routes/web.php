<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\Product\ProductController;

use App\Http\Controllers\CommentController;

Route::get('/', [ArticleController::class, 'index']);

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Route::get('/product', [ProductController::class, 'index']);

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles/add', [ArticleController::class, 'add']);

Route::post('/articles/add', [ArticleController::class, 'create']);

Route::get('/articles/delete/{id}', [
    ArticleController::class, 'delete'
]);

Route::post('/comments/add', [
    CommentController::class, 'create'
]);

Route::get('/comments/delete/{id}', [
    CommentCOntroller::class, 'delete'
]);
