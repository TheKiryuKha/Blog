<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminRole;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin_panel')->controller(CategoryController::class)->middleware(AdminRole::class)->group(function(){
            
    Route::get('/categories', 'index')
        ->name('categories.index');

    Route::get('/categories/create', 'create')
        ->name('categories.create');

    Route::post('/categories', 'store')
        ->name('categories.store');

    Route::get('/categories/{category}/edit', 'edit')
        ->name('categories.edit');

    Route::patch('/categories/{category}', 'update')
        ->name('categories.update');

    Route::delete('/categories/{category}', 'destroy')
        ->name('categories.destroy');
});

