<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::prefix('admin_panel')->middleware('auth')->group(function(){
    
    Route::controller(CategoryController::class)->group(function(){ 
        Route::get('/categories', 'index')
            ->can('index', Category::class)
            ->name('categories.index');

        Route::get('/categories/create', 'create')
            ->can('create', Category::class)   
            ->name('categories.create');

        Route::post('/categories', 'store')
            ->can('create', Category::class)    
            ->name('categories.store');

        Route::get('/categories/{category}/edit', 'edit')
            ->can('update', 'category')    
            ->name('categories.edit');

        Route::patch('/categories/{category}', 'update')
            ->can('update', 'category')    
            ->name('categories.update');

        Route::delete('/categories/{category}', 'destroy')
            ->can('delete', 'category')    
            ->name('categories.destroy');
    });
});

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->middleware('auth')
    ->name('categories.show');