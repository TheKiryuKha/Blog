<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::prefix('admin_panel')->middleware('auth')->controller(PostController::class)->group(function(){
    
    Route::get('/posts', 'index')
        ->can('index', Post::class)
        ->name('posts.index');

    Route::post('/posts', 'store')
        ->can('create', Post::class)
        ->name('posts.store');

    Route::get('/posts/create', 'create')
        ->can('create', Post::class)
        ->name('posts.create');

    Route::get('/posts/{post}/edit', 'edit')
        ->can('update', 'post')
        ->name('posts.edit');

    Route::patch('/posts/{post}', 'update')
        ->can('update', 'post')
        ->name('posts.update');

    Route::delete('/posts/{post}', 'destroy')
        ->can('delete', 'post')
        ->name('posts.destroy');
});

Route::get('/posts/{post}', [PostController::class, 'show'])
    ->middleware('auth')
    ->name('posts.show');

Route::get('/posts/{post}/like', [PostController::class, 'like'])
    ->middleware('auth')
    ->name('posts.like');