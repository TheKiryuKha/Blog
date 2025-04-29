<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::controller(CommentController::class)->group(function () {
    Route::get('/admin_panel/comments',  'index')
    // хз как сделать здесь проверку
        ->name('comments.index');

    Route::post('/comments', 'store')
        ->middleware('auth')
        ->name('comments.store');

    Route::get('/comments/{comment}/edit',  'edit')
        ->can('edit', 'comment')
        ->name('comments.edit');

    Route::patch('/comments/{comment}',  'update')
        ->can('edit', 'comment')
        ->name('comments.update');

    Route::delete('/comments/{comment}',  'destroy')
        ->can('delete', 'comment')
        ->name('comments.destroy');
});