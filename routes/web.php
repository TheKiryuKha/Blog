<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return to_route('home');
});

// comment
require __DIR__.'/groups/comment.php';

// category
require __DIR__.'/groups/category.php';

// post
require __DIR__.'/groups/post.php';

Route::get('/home', HomeController::class)->name('home');
Route::get('/blog', BlogController::class)->name('blog');