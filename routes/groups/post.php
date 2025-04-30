<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin_panel')->middleware('auth')->controller(PostController::class)->group(function(){
    
    Route::get('/posts', 'index')
        ->can('is_admin')
        ->name('posts.index');

    Route::post('/posts', 'store')
        ->can('is_admin')
        ->name('posts.store');

    Route::get('/posts/{post}/edit', 'edit')
        ->can('workWithPost', 'post')
        ->name('posts.edit');

    Route::patch('/posts/{post}', 'update')
        ->can('workWithPost', 'post')
        ->name('posts.update');

    Route::delete('/posts/{post}', 'destroy')
        ->can('workWithPost', 'post')
        ->name('posts.destroy');
});