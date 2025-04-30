<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::controller(CommentController::class)->middleware('auth')->group(function () {
    Route::get('/admin_panel/comments',  'index')
        ->can('is_admin')
        ->name('comments.index');

    Route::post('/comments', 'store')
        ->name('comments.store');

    Route::get('/comments/{comment}/edit',  'edit')
        ->can('workWithComment', 'comment')
        ->name('comments.edit');

    Route::patch('/comments/{comment}',  'update')
        ->can('workWithComment', 'comment')    
        ->name('comments.update');

    Route::delete('/comments/{comment}',  'destroy')
        ->can('delete-comment', 'comment')
        ->name('comments.destroy');
});