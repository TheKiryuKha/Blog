<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin_panel')->controller(PostController::class)->group(function(){
    
    Route::get('/posts', 'index')
        ->name('posts.index');

    Route::post('/posts', 'store')
        ->name('posts.store');

    Route::get('/posts/{post}/edit', 'edit')
        
        ->name('posts.edit');

    Route::patch('/posts/{post}', 'update')
        
        ->name('posts.update');

    Route::delete('/posts/{post}', 'destroy')
        
        ->name('posts.destroy');
});