<?php

use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

Route::controller(CommentController::class)->middleware('auth')->group(function () {
    Route::get('/admin_panel/comments',  'index')
        ->can('index', Comment::class)
        ->name('comments.index');

    Route::post('/comments', 'store')
        ->can('create', Comment::class)
        ->name('comments.store');

    Route::get('/comments/{comment}/edit',  'edit')
        ->can('update', 'comment')
        ->name('comments.edit');

    Route::patch('/comments/{comment}',  'update')
        ->can('update', 'comment')    
        ->name('comments.update');

    Route::delete('/comments/{comment}',  'destroy')
        ->can('delete', 'comment')
        ->name('comments.destroy');
});